<template>
	<div class="tac content_title">
		<button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>
		{{shop.name}}
		<small><router-link v-if="this.$can('Shop_edit')" :to="{name: 'shops_edit', params: {ids: shop.id}}">{{ $t('Редактировать') }}</router-link></small>
	</div>
	<div class=" col-12">
		<div class="col-12 detail">
			<div class="detail__title">
				<span>{{ $t('Склады') }}</span>
			</div>
			<vue-good-table style="position: static;"
		      :columns="shop_columns"
		      :rows="shop_rows"
		      :line-numbers="true">
		      <template #table-row="props">
		          <span class="table_actions" v-if="props.column.field == 'actions'">
		            <router-link v-if="this.$can('Storage_show')" :to="{name: 'storages_show', params: {id: props.row.shop_id}}"><i class="fas fa-eye"></i></router-link>
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
			shop: [],
			shop_columns: [
			  {
			    label: this.$t('Название'),
			    field: 'name',
			  },
			  {
			    label: this.$t('Действия'),
			    field: 'actions',
			    sortable: false,
			    width: '65px',
			  },
			],
			shop_rows: [],
		} 
	},
	mounted(){
		this.emitter.emit("isLoading", true);
		this.axios.get('/api/shops/'+this.id).then((response) => {
		       this.shop = response.data['data']
		       this.shop_rows = this.shop['storages']
		       document.title = this.shop['name'];
		       this.emitter.emit("isLoading", false);
		       console.table(this.shop)
		     })
		
	},
	created () {
        
    },
}
</script>