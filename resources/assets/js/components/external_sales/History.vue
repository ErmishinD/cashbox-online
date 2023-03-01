<template>
    <div>
        <GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="500">
            <div class="getting-started-example-styled">
              <div class="getting-started-example-styled__content">
                <div class="getting-started-example-styled__title">
                  {{ $t('Внимание') }}!
                </div>
  
                <p>{{ $t('Вы уверены, что хотите вернуть предпродажу') }}?</p>
              </div>
  
              <div class="getting-started-example-styled__actions">
                <button @click="restoreExternalSale" class="btn btn-success">
                  {{ $t('Вернуть') }}
                </button>
              </div>
            </div>
          </GDialog>

          <h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Просмотр истории предпродаж') }}</h1>
        
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
        :line-numbers="true">
        <template #table-row="props">
            <span v-if="props.column.field == 'status'"
                    v-bind:style="[props.row.confirmed_at ? {color: 'green'} : {color: 'red'}]">{{ props.row.confirmed_at ? 'Подтверждено' : 'Удалено' }}</span>

            <span v-if="props.column.field == 'confirmed_deleted_at'">{{ props.row.confirmed_at ?? props.row.deleted_at }}</span>

            <span v-if="props.column.field == 'sell_product.name'">
                <router-link class="redirect_from_table" v-if="$can('SellProduct_show') && props.row.sell_product"
                            :to="{name: 'products_for_sale_show', params: {id: props.row.sell_product.id}}">{{ props.row.sell_product.name }}
                </router-link>
                <span
                    v-else>{{ props.row.sell_product.name }}</span>
            </span>

            <span class="table_actions" v-if="props.column.field == 'actions'">
                <a v-if="props.row.deleted_at" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-arrow-up"></i></a>
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
        external_sales: null,
        modal_show: false,
        current_name: null,
        current_id: null,
        totalRecords: 0,
        categories: [],
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
            label: this.$t('Статус'),
            field: 'status',
          },
          {
            label: this.$t('Сумма'),
            field: 'amount',
          },
          {
            label: this.$t('Дата создания'),
            field: 'created_at',
          },
          {
            label: this.$t('Дата подтверждения/удаления'),
            field: 'confirmed_deleted_at',
          },
          {
            label: this.$t('Товар'),
            field: 'sell_product.name',
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
    //   this.axios.get('/api/categories').then((response) => {
    //     response.data['data'].forEach(item => {
    //       this.categories.push(item.name)
    //     })
    //     this.columns[2].filterOptions.filterDropdownItems = this.categories
    //    })
        this.render_list_items()
        document.title = this.$t('История предпродаж');
    },
    methods:{
        onOpen(params){
            this.modal_show = true
            this.current_name = params.name
            this.current_id = params.id
            console.log(params)
        },
        restoreExternalSale(){
            axios.post(`/api/external_sales/${this.current_id}/restore`, {
              
            }).then((response) => {
                this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
                this.render_list_items()
                this.modal_show = false
            });
  
        },
      updateParams(newProps) {
            this.serverParams = Object.assign({}, this.serverParams, newProps);
        },
  
        onPageChange(params) {
            this.updateParams({page: params.currentPage});
            this.render_list_items();
        },
  
        onPerPageChange(params) {
            this.updateParams({perPage: params.currentPerPage, page: 1});
            this.render_list_items();
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
            this.render_list_items();
        },
  
        onColumnFilter(params) {
            this.updateParams(params);
            this.render_list_items();
        },
        render_list_items: function(){
            this.emitter.emit("isLoading", true);
            
            this.axios.post('/api/external_sales/get_paginated/history', this.serverParams).then((response) => {
                   this.external_sales = response.data['pagination']['data']
                   this.rows = this.external_sales
               this.totalRecords = response.data['pagination']['total'];
                   this.emitter.emit("isLoading", false);
  
                 })
        },
    },
  };
  </script>