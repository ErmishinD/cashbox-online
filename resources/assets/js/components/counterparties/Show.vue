<template>
	<div class="tac content_title">
		<button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>
		{{counterparty.name}}
		<small><router-link v-if="this.$can('Counterparty_edit')" :to="{name: 'counterparties_edit', params: {ids: counterparty.id}}">{{ $t('Редактировать') }}</router-link></small>
	</div>

	<div class="details col-12">
		<div class="col-6 detail">
			<div class="detail__title">
				<span>{{ $t('Закупки') }}</span>
			</div>
			<vue-good-table style="position: static;"
		      :columns="counterparty_purchases_columns"
		      :rows="counterparty_purchases_rows"
		      mode="remote"
	            v-on:page-change="onPageChangePurchases"
	            v-on:sort-change="onSortChangePurchases"
	            v-on:column-filter="onColumnFilterPurchases"
	            v-on:per-page-change="onPerPageChangePurchases"
	            :totalRows="totalRecordsPurchases"
	            :isLoading.sync="isLoading"
	            :pagination-options="{
	              enabled: true,
	            }"
		      >
		      <template #table-row="props">

		      	<span  v-if="props.column.field == 'product_type.name'">
      	      	    <router-link class="redirect_from_table"
      	      	                 :to="{name: 'products_type_show', params: {id: props.row.product_type.id}}">{{ props.row.product_type.name }}
      	      	    </router-link>
      	      	  </span>

      		      <span  v-if="props.column.field == 'quantity'">
      	      	    {{props.row.quantity / props.row.product_type.main_measure_type.quantity}}{{props.row.product_type.main_measure_type.name}}
      	      	  </span>

      	      	  <span  v-if="props.column.field == 'current_quantity'">
      	      	    {{props.row.current_quantity / props.row.product_type.main_measure_type.quantity}}{{props.row.product_type.main_measure_type.name}}
      	      	  </span>
		      	
			      <span class="table_actions" v-if="props.column.field == 'actions'">
		      	    <i @click="clickToGetConsumption(props.row)" class="fas fa-eye"></i>
		      	  </span>

	      	  </template>
		    </vue-good-table>
		</div>
		<div class="col-6 detail">
			<div class="detail__title">
				<span>{{ $t('Детали закупки') }}</span>
			</div>
			<vue-good-table style="position: static;"
		      :columns="counterparty_consumptions_columns"
		      :rows="counterparty_consumptions_rows"
		      mode="remote"
	            v-on:page-change="onPageChangeConsumptions"
	            v-on:sort-change="onSortChangeConsumptions"
	            v-on:column-filter="onColumnFilterConsumptions"
	            v-on:per-page-change="onPerPageChangeConsumptions"
	            :totalRows="totalRecordsConsumptions"
	            :isLoading.sync="isLoading"
	            :pagination-options="{
	              enabled: true,
	            }"
		     >
		      <template #table-row="props">
		      	
		      	<span  v-if="props.column.field == 'quantity'">
      	      	    {{props.row.quantity / this.current_product_type.main_measure_type.quantity}}{{this.current_product_type.main_measure_type.name}}
      	      	  </span>

      	      	  <span  v-if="props.column.field == 'consumable_type'">
      	      	    <span v-if="props.row.consumable_type == 'sell'">{{$t('Продажа')}}</span>
      	      	    <span v-else-if="props.row.consumable_type == 'writeoff'">{{$t('Списание')}}</span>
      	      	  </span>

      	      	  <span  v-if="props.column.field == 'description'">
      	      	    <router-link class="redirect_from_table"
      	      	                 :to="{name: props.row.consumable.route, params: {id: props.row.consumable.id}}">{{ props.row.consumable.name }}
      	      	    </router-link>
      	      	  </span>

		      	 
		        </template>
		    </vue-good-table>
		</div>
	</div>
	
</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			counterparty: [],
			counterparty_purchases_columns: [
			  {
			    label: this.$t('Товар'),
			    field: 'product_type.name',
			  },
			  {
			    label: this.$t('Кол-во'),
			    field: 'quantity',
			  },
			  {
			    label: this.$t('Стоимость'),
			    field: 'cost',
			  },
			  {
			    label: this.$t('Осталось'),
			    field: 'current_quantity',
			  },
			  {
			    label: this.$t('Создано'),
			    field: 'created_at',
			  },

			  {
			    label: this.$t(''),
			    field: 'actions',
			    sortable: false,
			    width: '20px',
			  },
			],
			counterparty_purchases_rows: [],
			counterparty_consumptions_columns: [
			  {
			    label: this.$t('Тип'),
			    field: 'consumable_type',
			  },
			  {
			    label: this.$t('Кол-во'),
			    field: 'quantity',
			  },
			  {
			    label: this.$t('Прибыль'),
			    field: 'profit',
			  },
			  {
			    label: this.$t('Дата создания'),
			    field: 'created_at',
			  },
			  {
			    label: this.$t('Описание'),
			    field: 'description',
			  },
			],
			counterparty_consumptions_rows: [],
			totalRecordsPurchases: 0,
			totalRecordsConsumptions: 0,
			serverParamsPurchases: {
			  columnFilters: {
			  	counterparty_id: this.id
			  },
			  sort: {
			      field: '',
			      type: '',
			  },
			  page: 1,
			  perPage: 10
			},
			serverParamsConsumptions: {
			  columnFilters: {
			  },
			  sort: {
			      field: '',
			      type: '',
			  },
			  page: 1,
			  perPage: 10
			},
			current_product_type: '',
		} 
	},
	mounted(){
		this.emitter.emit("isLoading", true);
		this.axios.get('/api/counterparties/'+this.id).then((response) => {
	       this.counterparty = response.data['data']
	       document.title = this.counterparty['name'];
	       this.getPurchaseData()
	     })

		

		
		
	},
	created () {
        
    },
    methods: {
    	updateParamsPurchases(newProps) {
        console.log(newProps)
          this.serverParamsPurchases = Object.assign({}, this.serverParamsPurchases, newProps);
      },

      onPageChangePurchases(params) {
          this.updateParamsPurchases({page: params.currentPage});
          this.getPurchaseData();
      },

      onPerPageChangePurchases(params) {
          this.updateParamsPurchases({perPage: params.currentPerPage, page: 1});
          this.getPurchaseData();
      },

      onSortChangePurchases(params) {
  	    let data = Object.assign({}, params)[0]

          
          this.updateParamsPurchases({
              sort: [{
                  type: data.type,
                  field: data.field,
              }],
              page: 1
          });
          this.getPurchaseData();
      },

      onColumnFilterPurchases(params) {
        console.log(params.columnFilters.type)
          this.updateParamsPurchases(params);
          this.getPurchaseData();
      },
    

    updateParamsConsumptions(newProps) {
        console.log(newProps)
          this.serverParamsConsumptions = Object.assign({}, this.serverParamsConsumptions, newProps);
      },

      onPageChangeConsumptions(params) {
          this.updateParamsConsumptions({page: params.currentPage});
          this.getConsumptionData();
      },

      onPerPageChangeConsumptions(params) {
          this.updateParamsConsumptions({perPage: params.currentPerPage, page: 1});
          this.getConsumptionData();
      },

      onSortChangeConsumptions(params) {
  	    let data = Object.assign({}, params)[0]

          
          this.updateParamsConsumptions({
              sort: [{
                  type: data.type,
                  field: data.field,
              }],
              page: 1
          });
          this.getConsumptionData();
      },

      onColumnFilterConsumptions(params) {
        console.log(params.columnFilters.type)
          this.updateParamsConsumptions(params);
          this.getConsumptionData();
      },

      getPurchaseData(){
      	this.emitter.emit("isLoading", true);
      	this.axios.post('/api/product_purchases/get_paginated', this.serverParamsPurchases).then((response) => {
      		this.counterparty_purchases_rows = response.data.pagination.data
      		this.totalRecordsPurchases = response.data.pagination.total
      		this.emitter.emit("isLoading", false);
      	})
      },

      clickToGetConsumption(purchase){
      	this.serverParamsConsumptions.columnFilters.product_purchase_id = purchase.id
      	this.current_product_type = purchase.product_type
      	this.getConsumptionData()
      },

      getConsumptionData(){
      	this.emitter.emit("isLoading", true);
      	this.axios.post('/api/product_consumptions/get_paginated', this.serverParamsConsumptions).then((response) => {
      		this.counterparty_consumptions_rows = response.data.pagination.data
      		this.totalRecordsConsumptions = response.data.pagination.total
      		this.emitter.emit("isLoading", false);
      	})
      },

      },

}
</script>