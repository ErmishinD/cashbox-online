<template>

  <div>
    <GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="500">
        <div class="getting-started-example-styled">
          <div class="getting-started-example-styled__content">
            <div class="getting-started-example-styled__title">
              {{ $t('Внимание') }}!
            </div>

            <p>{{ $t('Вы уверены, что хотите удалить') }} "{{current_name}}"?</p>
          </div>

          <div class="getting-started-example-styled__actions">
            <button @click="delPurchase" class="btn btn-danger">
              {{ $t('Удалить') }}
            </button>
          </div>
        </div>
      </GDialog>

    <div class="row-btw mb-10">
      <button @click="openBalance" class="btn btn-primary">
        {{ $t('Баланс складов') }}
      </button>
      <router-link :to="{name: 'purchases_create'}">
        <button v-if="$can('ProductPurchase_create')" class="btn btn-success" >{{ $t('Добавить закупку') }}</button>
      </router-link>
    </div>
  	  

      <GDialog style="z-index: 9999;" :persistent="false" v-model="balance_modal_show" max-width="500">
        <h1 class="tac">{{$t('Суммарный баланс')}}: {{balance.all_balance}}</h1>
        <vue-good-table style="position: static; padding: 10px 20px;"
          mode="remote"
          :columns="balance_columns"
          :rows="balance_rows"
          :line-numbers="true"
          >
        }
      <template #table-row="props">
        
      </template>
    </vue-good-table>
      </GDialog>

    <vue-good-table style="position: static;"
      mode="remote"
      v-on:page-change="onPageChange"
      v-on:sort-change="onSortChange"
      v-on:column-filter="onColumnFilter"
      v-on:per-page-change="onPerPageChange"
      :totalRows="totalRecords"
      :isLoading.sync="isLoading"
      :pagination-options="{
        enabled: true,
      }"
      :columns="columns"
      :rows="rows"
      :line-numbers="true"
      >
      <template #table-row="props">
        <span  v-if="props.column.field == 'product_type.name'">
          <router-link class="redirect_from_table" v-if="$can('ProductType_show')" :to="{name: 'products_type_show', params: {id: props.row.product_type.id}}">{{props.row.product_type.name}}</router-link>
          <span v-else>{{props.row.product_type.name}}</span>
        </span>

        <span  v-if="props.column.field == 'user.name'">
          <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: props.row.user.id}}">{{props.row.user.name}}</router-link>
          <span v-else>{{props.row.user.name}}</span>
        </span>

        <span  v-if="props.column.field == 'storage_id.name'">
          <router-link class="redirect_from_table" v-if="$can('Storage_show')" :to="{name: 'storages_show', params: {id: props.row.storage_id.id}}">{{props.row.storage_id.name}}</router-link>
          <span v-else>{{props.row.storage_id.name}}</span>
        </span>

        <span v-if="props.column.field == 'purchased'">{{props.row.quantity / props.row.product_type.main_measure_type.quantity}} {{props.row.product_type.main_measure_type.name}}</span>
        <span v-if="props.column.field == 'current_quantity'">{{props.row.current_quantity / props.row.product_type.main_measure_type.quantity}} {{props.row.product_type.main_measure_type.name}}</span>

        <span class="table_actions" v-if="props.column.field == 'actions' && (props.row.quantity == props.row.current_quantity)">
          <router-link v-if="$can('ProductPurchase_edit') " :to="{name: 'purchases_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a v-if="$can('ProductPurchase_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
        </span>
        </template>
    </vue-good-table>
  </div>
</template>



<script>
import { GDialog } from 'gitart-vue-dialog'
import "gitart-vue-dialog/dist/style.css";

export default {
	 components: {
    GDialog,
  },
  data(){
    return {
      purchases: null,
      modal_show: false,
      totalRecords: 0,
      balance_modal_show: false,
      balance:null,
      current_name: null,
      current_id: null,
      serverParams: {
        columnFilters: {
        },
        sort: {
            field: '',
            type: '',
        },
        page: 1,
        perPage: 10
      },
      columns: [
        {
          label: this.$t("Товар"),
          field: "product_type.name",
        },
        {
          label: this.$t("Оператор"),
          field: 'user.name'
        },
        {
          label: this.$t("Закуплено"),
          field: 'purchased'
        },
        {
          label: this.$t("Осталось"),
          field: 'current_quantity'
        },
        {
          label: this.$t("Стоимость"),
          field: 'cost'
        },
        {
          label: this.$t("Срок годности"),
          field: 'expiration_date'
        },
        {
          label: this.$t("Склад"),
          field: 'storage_id.name'
        },
        {
          label: this.$t("Дата закупки"),
          field: 'created_at'
        },
        {
          label: this.$t('Действия'),
          field: 'actions',
          sortable: false,
          width: '65px',
        },
      ],
      rows: [],
      balance_columns:[
        {
          label: this.$t("Склад"),
          field: "name",
        },
        {
          label: this.$t("Баланс"),
          field: 'balance'
        },
      ],
      balance_rows:[],
    };
  },
  mounted(){
  	this.render_list_items()

  	document.title = this.$t('Архив закупок');
  },
  methods:{
  	render_list_items: function(){
  		this.loadItems()
  	},
      updateParams(newProps) {
          this.serverParams = Object.assign({}, this.serverParams, newProps);
      },

      onPageChange(params) {
          this.updateParams({page: params.currentPage});
          this.loadItems();
      },

      onPerPageChange(params) {
          this.updateParams({perPage: params.currentPerPage, page: 1});
          this.loadItems();
      },

      onSortChange(params) {
  	    let data = Object.assign({}, params)[0]

          
          this.updateParams({
              sort: [{
                  type: data.type,
                  field: data.field,
              }],
              page: 1
          });
          this.loadItems();
      },

      onColumnFilter(params) {
        console.log(params.columnFilters.type)
          this.updateParams(params);
          this.loadItems();
      },

      onOpen(params){
        this.modal_show = true
        this.current_name = params.product_type.name
        this.current_id = params.id
      },

      // load items is what brings back the rows from server
      loadItems() {
          this.emitter.emit("isLoading", true);
          this.axios.post('/api/product_purchases/get_paginated', this.serverParams).then((response) => {
              this.purchases = response.data['pagination']['data']
              this.rows = this.purchases
              this.totalRecords = response.data['pagination']['total'];
              this.emitter.emit("isLoading", false);

          })

          this.axios.post('/api/storages/get_balance', {storage_ids:[]}).then((response) => {


          })
      },

      openBalance() {


        this.axios.post('/api/storages/get_balance', {storage_ids:[]}).then((response) => {
          this.balance = response.data.data
          this.balance_rows = response.data.data.storages
          this.balance_modal_show = true
        })


      },
      delPurchase(){
      axios.delete(`/api/product_purchases/${this.current_id}`, {

      }).then((response) => {
        this.render_list_items()
        this.$notify({
            text: this.$t('Успешно!'),
            type: 'success',
          });
      }).catch(error => {
        if(error.response.status == 409){
          this.$notify({
            text: this.$t('Ошибка при удалении!'),
            type: 'error',
          });
          
        }
      }).finally((result) => {
        this.modal_show = false
      })

    },
  },
};
</script>