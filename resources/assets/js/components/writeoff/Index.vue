<template>

  <div>
    <GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="500">
      <div class="getting-started-example-styled">
        <div class="getting-started-example-styled__content">
          <div class="getting-started-example-styled__title">
            {{ $t('Внимание') }}!
          </div>

          <p>{{ $t('Вы уверены, что хотите удалить') }} {{$t('списание')}}?</p>
        </div>

        <div class="getting-started-example-styled__actions">
          <button @click="delWriteOff" class="btn btn-danger">
            {{ $t('Удалить') }}
          </button>
        </div>
      </div>
    </GDialog>
    <div class="pull-right mb-10">
      <router-link :to="{name: 'write_off_create'}">
        <button v-if="$can('WriteOff_create')" class="btn btn-success" >{{ $t('Добавить списание') }}</button>
      </router-link>
    </div>

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

        <span  v-if="props.column.field == 'storage.name'">
          <router-link class="redirect_from_table" v-if="$can('Storage_show')" :to="{name: 'storages_show', params: {id: props.row.storage.id}}">{{props.row.storage.name}}</router-link>
          <span v-else>{{props.row.storage_id.name}}</span>
        </span>

        <span v-if="props.column.field == 'quantity'">{{props.row.quantity / props.row.product_type.main_measure_type.quantity}} {{props.row.product_type.main_measure_type.name}}</span>

        <span class="table_actions" v-if="props.column.field == 'actions'">
          <a v-if="$can('WriteOff_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
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
      write_offs: null,
      totalRecords: 0,
      balance_modal_show: false,
      balance:null,
      modal_show: false,
      current_id: '',
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
          label: this.$t("Списано"),
          field: 'quantity'
        },
        {
          label: this.$t("Склад"),
          field: 'storage.name'
        },
        {
          label: this.$t("Дата списания"),
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
    };
  },
  mounted(){
  	this.render_list_items()

  	document.title = this.$t('Архив списаний');
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

      // load items is what brings back the rows from server
      loadItems() {
          this.emitter.emit("isLoading", true);
          this.axios.post('/api/write_offs/get_paginated', this.serverParams).then((response) => {
              this.write_offs = response.data['pagination']['data']
              this.rows = this.write_offs
              this.totalRecords = response.data['pagination']['total'];
              this.emitter.emit("isLoading", false);

          })
      },
      onOpen(params){
        this.modal_show = true
        this.current_id = params.id
        console.log(params)
      },
      delWriteOff(){
        axios.delete(`/api/write_offs/${this.current_id}`, {

        }).then((response) => {
          this.$notify({
              text: this.$t('Успешно!'),
              type: 'success',
            });
          this.render_list_items()
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