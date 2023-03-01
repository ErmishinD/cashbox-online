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
  	        <button @click="delProduct" class="btn btn-danger">
  	          {{ $t('Удалить') }}
  	        </button>
  	      </div>
  	    </div>
  	  </GDialog>
  	  <router-link :to="{name: 'products_for_sale_create'}">
  	  	<button v-if="$can('SellProduct_create')" class="btn btn-success pull-right mb-10" >{{ $t('Добавить товар') }}</button>
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
      :line-numbers="true">
      <template #table-row="props">
          <span  v-if="props.column.field == 'category_name'">
            <router-link class="redirect_from_table" v-if="$can('Category_edit') && props.row.category" :to="{name: 'settings_categories_edit', params: {id: props.row.category.id}}">{{props.row.category.name}}</router-link>
            <span v-else-if="props.row.category">{{props.row.category.name}}</span>
          </span>
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link v-if="$can('SellProduct_show')" :to="{name: 'products_for_sale_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link v-if="$can('SellProduct_edit')" :to="{name: 'products_for_sale_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a v-if="$can('SellProduct_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
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
      products: null,
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
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Цена'),
          field: 'price',
        },
        {
          label: this.$t('Категория'),
          field: 'category_name',
          filterOptions: {
              enabled: true,
              placeholder: this.$t('Фильтрация'),
              filterDropdownItems: [''],
          },
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
    this.axios.get('/api/categories').then((response) => {
      response.data['data'].forEach(item => {
        this.categories.push(item.name)
      })
      this.columns[2].filterOptions.filterDropdownItems = this.categories
     })
  	this.render_list_items()
  	document.title = this.$t('Товары на продажу');
  },
  methods:{
  	onOpen(params){
  		this.modal_show = true
  		this.current_name = params.name
  		this.current_id = params.id
  		console.log(params)
  	},
  	delProduct(){
  		axios.delete(`/api/sell_products/${this.current_id}`, {
  		  
  		}).then((response) => {
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
  		
  		this.axios.post('/api/sell_products/get_paginated', this.serverParams).then((response) => {
  		       this.products = response.data['pagination']['data']
  		       this.rows = this.products
             this.totalRecords = response.data['pagination']['total'];
  		       this.emitter.emit("isLoading", false);

  		     })
  	},
  },
};
</script>