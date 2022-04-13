<template>

  <div>
  	  <router-link :to="{name: 'purchases_create'}">
  	  	<button v-if="$can('ProductPurchase_create')" class="btn btn-success pull-right mb-10" >{{ $t('Добавить закупку') }}</button>
  	  </router-link>

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

        <span v-if="props.column.field == 'purchased'">{{props.row.quantity}} {{props.row.product_type.main_measure_type.name}}</span>
        <span v-if="props.column.field == 'current_quantity'">{{props.row.current_quantity}} {{props.row.product_type.main_measure_type.name}}</span>
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
      totalRecords: 0,
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
      ],
      rows: [],
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

      // load items is what brings back the rows from server
      loadItems() {
          var loader = this.$loading.show({
              canCancel: false,
              loader: 'dots',});
          this.axios.post('/api/product_purchases/get_paginated', this.serverParams).then((response) => {
              this.purchases = response.data['pagination']['data']
              this.rows = this.purchases
              this.totalRecords = response.data['pagination']['total'];
              loader.hide()

          }).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })
      }
  },
};
</script>