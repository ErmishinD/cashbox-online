<template>

  <div>
    <div class="pull-right mb-10">
      <router-link :to="{name: 'transfers_create'}">
        <button v-if="$can('Transfer_create')" class="btn btn-success" >{{ $t('Добавить трансфер') }}</button>
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

        <span  v-if="props.column.field == 'transferred_by.name'">
          <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: props.row.transferred_by.id}}">{{props.row.transferred_by.name}}</router-link>
          <span v-else>{{props.row.transferred_by.name}}</span>
        </span>

        <span  v-if="props.column.field == 'from_storage.name'">
          <router-link class="redirect_from_table" v-if="$can('Storage_show')" :to="{name: 'storages_show', params: {id: props.row.from_storage.id}}">{{props.row.from_storage.name}}</router-link>
          <span v-else>{{props.row.from_storage.name}}</span>
        </span>

        <span  v-if="props.column.field == 'to_storage.name'">
          <router-link class="redirect_from_table" v-if="$can('Storage_show')" :to="{name: 'storages_show', params: {id: props.row.to_storage.id}}">{{props.row.to_storage.name}}</router-link>
          <span v-else>{{props.row.to_storage.name}}</span>
        </span>

        <span v-if="props.column.field == 'quantity'">{{props.row.product_type.quantity / props.row.product_type.main_measure_type.quantity}} {{props.row.product_type.main_measure_type.name}}</span>
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
      transfers: null,
      totalRecords: 0,
      balance_modal_show: false,
      balance:null,
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
          field: 'transferred_by.name'
        },
        {
          label: this.$t("Передано"),
          field: 'quantity'
        },
        {
          label: this.$t("Склад-отправитель"),
          field: 'from_storage.name'
        },
        {
          label: this.$t("Склад-получатель"),
          field: 'to_storage.name'
        },
        {
          label: this.$t("Дата трансфера"),
          field: 'created_at'
        },
      ],
      rows: [],
    };
  },
  mounted(){
    this.render_list_items()

    document.title = this.$t('Архив трансферов');
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
          this.axios.post('/api/transfers/get_paginated', this.serverParams).then((response) => {
              this.transfers = response.data['pagination']['data']
              this.rows = this.transfers
              this.totalRecords = response.data['pagination']['total'];
              this.emitter.emit("isLoading", false);

          })
      },
  },
};
</script>