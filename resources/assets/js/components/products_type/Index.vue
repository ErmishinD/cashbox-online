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
  	        <button @click="delProductType" class="btn btn-danger">
  	          {{ $t('Удалить') }}
  	        </button>
  	      </div>
  	    </div>
  	  </GDialog>
  	  <router-link :to="{name: 'products_type_create'}">
  	  	<button v-if="$can('ProductType_create')" class="btn btn-success pull-right mb-10" >{{ $t('Добавить тип товара') }}</button>
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
        <span  v-if="props.column.field == 'category.name'">
          <router-link class="redirect_from_table" v-if="$can('Category_edit') && props.row.category" :to="{name: 'settings_categories_edit', params: {id: props.row.category.id}}">{{props.row.category.name}}</router-link>
          <span v-else-if="props.row.category">{{props.row.category.name}}</span>
        </span>
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link v-if="$can('ProductType_show')" :to="{name: 'products_type_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link v-if="$can('ProductType_edit')" :to="{name: 'products_type_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a v-if="$can('ProductType_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
          </span>

          <span v-if="props.column.field == 'type'">{{props.row.type == '_imperishable' ? $t('Непортящийся') : $t('Портящийся')}}</span>
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
      products_type: null,
      modal_show: false,
      current_name: null,
      current_id: null,
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
          label: this.$t('Название'),
          field: 'name',
          filterOptions: {
            enabled: true, // enable filter for this column
            placeholder: this.$t('Фильтрация'), // placeholder for filter input
            trigger: 'enter', //only trigger on enter not on keyup
          },
        },
        {
          label: this.$t('Тип'),
          field: 'type',
          filterOptions: {
              enabled: true,
              placeholder: this.$t('Фильтрация'),
              filterDropdownItems: [this.$t('Портящийся'), this.$t('Непортящийся')],
          },
        },
        {
          label: this.$t('Категория'),
          field: 'category.name',
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
  	document.title = this.$t('Типы товаров');
  },
  methods:{
  	onOpen(params){
  		this.modal_show = true
  		this.current_name = params.name
  		this.current_id = params.id
  		console.log(params)
  	},
  	delProductType(){
  		axios.delete(`/api/product_types/${this.current_id}`, {

  		}).then((response) => {
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
        if(params.columnFilters.type == this.$t('Портящийся')){
          params.columnFilters.type = '_perishable'
        }
        else if(params.columnFilters.type == this.$t('Непортящийся')){
          params.columnFilters.type = '_imperishable'
        }
          this.updateParams(params);
          this.loadItems();
      },

      // load items is what brings back the rows from server
      loadItems() {
          var loader = this.$loading.show({
              canCancel: false,
              loader: 'dots',});
          this.axios.post('/api/product_types/get_paginated', this.serverParams).then((response) => {
              this.products_type = response.data['pagination']['data']
              this.rows = this.products_type
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

