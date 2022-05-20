<template>
	<div class="tac content_title">
		{{$t('Архив инкассаций')}}
	</div>
	<div class="details col-12">
		<div class="col-6 detail">
			<div class="detail__title">
				<span>{{ $t('Инкассации') }}</span>
			</div>
			<vue-good-table style="position: static;"
		      :columns="collections_columns"
		      :rows="collections_rows"
		      :search-options="{ enabled: true }"
		      :pagination-options="{
		                enabled: true,
		                mode: 'records',
		                perPage: 10,
		                position: 'top',
		                dropdownAllowAll: true,
		                setCurrentPage: 1,
		                nextLabel: $t('Вперед'),
		                prevLabel: $t('Назад'),
		                rowsPerPageLabel: $t('Записей на одной странице'),
		                ofLabel: $t('из'),
		                pageLabel: 'page', // for 'pages' mode
		                allLabel: 'All',
		              }">
		      <template #table-row="props">
		      	<span  v-if="props.column.field == 'collector.name'">
		      	  <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: props.row.collector.id}}">{{props.row.collector.name}}</router-link>
		      	  <span v-else>{{props.row.collector.name}}</span>
		      	</span>
			      <span class="table_actions" v-if="props.column.field == 'actions'">
		      	    <i @click="showCollectionDetail(props.row.collected_at)" class="fas fa-eye"></i>
		      	  </span>
	      	  </template>
		    </vue-good-table>
		</div>
		<div class="col-6 detail">
			<div class="detail__title">
				<span>{{ $t('Операции') }}</span>
			</div>
			<vue-good-table style="position: static;"
		      :columns="collection_item_columns"
		      :rows="collection_item_rows"
		      :line-numbers="true"
		      :search-options="{ enabled: true }"
		      :pagination-options="{
		                enabled: true,
		                mode: 'records',
		                perPage: 10,
		                position: 'top',
		                dropdownAllowAll: true,
		                setCurrentPage: 1,
		                nextLabel: $t('Вперед'),
		                prevLabel: $t('Назад'),
		                rowsPerPageLabel: $t('Записей на одной странице'),
		                ofLabel: $t('из'),
		                pageLabel: 'page', // for 'pages' mode
		                allLabel: 'All',
		              }">
		      <template #table-row="props">
		      	<span  v-if="props.column.field == 'operator.name'">
		      	  <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: props.row.operator.id}}">{{props.row.operator.name}}</router-link>
		      	  <span v-else>{{props.row.operator.name}}</span>
		      	</span>

		      	 <span v-if="props.column.field == 'transaction_type'" v-bind:style="[props.row.transaction_type == '_in' ? {color: 'green'} : {color: 'red'}]">{{props.row.transaction_type == '_in' ? this.$t('поступление') : this.$t('расход')}}
		      	 </span>
		        </template>
		    </vue-good-table>
		</div>
	</div>
</template>

<script>
export default{
	props: [
		'collected_at'
	],
	data(){
		return{
			collections_columns: [
			  {
			    label: '',
			    field: 'actions',
			    sortable: false,
			    width: '30px',
			  },
			  {
			    label: this.$t('Время'),
			    field: 'collected_at',
			  },
			  {
			    label: this.$t('Сумма'),
			    field: 'amount',
			  },
			  {
			    label: this.$t('Инкассатор'),
			    field: 'collector.name',
			  },
			],
			collections_rows: [],
			collection_item_columns: [
			  {
			    label: this.$t('Операция'),
			    field: 'transaction_type',
			  },
			  {
			    label: this.$t('Сумма'),
			    field: 'amount',
			  },
			  {
			    label: this.$t('Оператор'),
			    field: 'operator.name',
			  },
			  {
			    label: this.$t('Описание'),
			    field: 'data',
			  },
			  {
			    label: this.$t('Время'),
			    field: 'created_at',
			  },
			],
			collection_item_rows: [],
		} 
	},
	mounted(){
		this.emitter.emit("isLoading", true);
		document.title = this.$t('Архив инкассаций');
		this.axios.get('/api/cashbox/collection_history').then((response) => {
		       this.collections_rows = response.data.data
		       console.log(this.collections_rows)
		       // this.workers_rows = this.company['employees']
		       // document.title = this.company['name'];
		       this.emitter.emit("isLoading", false);
		       if(this.collected_at){
		       	this.showCollectionDetail(this.collected_at)
		       }
		       // console.table(this.company)
		     })
		
	},
	created () {
        
    },
    methods: {
    	showCollectionDetail(collected_at) {
    		this.emitter.emit("isLoading", true);
			this.axios.post('/api/cashbox/payments_from_history', {collected_at: collected_at}).then((response) => {
			       this.collection_item_rows = response.data.data
			       // this.workers_rows = this.company['employees']
			       // document.title = this.company['name'];
			       this.emitter.emit("isLoading", false);
			       // console.table(this.company)
			     })
	    	}
    }
}
</script>