<template>
	<div class="tac content_title">
		<button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>
		{{product.name}}
		<small><router-link v-if="$can('ProductType_edit')" :to="{name: 'products_type_edit', params: {ids: product.id}}">{{ $t('Редактировать') }}</router-link></small>
	</div>
	<div class="product_card_CRUD">
		<div class="product_card_CRUD__photo">
			<img :src="product.photo" alt="">
		</div>
		<div class="product_card_CRUD__content">
			<div class="product_card_CRUD__content_row">
				<span class="product_card_CRUD__content_item">
					{{$t('Основная ед. изм.')}}: {{product.main_measure_type.name}}
				</span>
					
				<span class="product_card_CRUD__content_item">
					{{$t('Тип')}}: {{product.type == '_imperishable' ? $t('Непортящийся') : $t('Портящийся')}}
				</span>
			</div>
			<div class="product_card_CRUD__content_item" v-if="product.measure_types.length">
				{{$t('Доступные ед. изм.')}}: <span class="" v-for="measure_type in product.measure_types">{{measure_type.name}}  &nbsp; &nbsp;</span>
			</div>
			<div class="product_card_CRUD__content_item" v-if="product.sell_products.length">
				{{$t('Входит в товары')}}: <span class="" v-for="sell_product in product.sell_products"><router-link :to="{name: 'products_for_sale_show', params: {id: sell_product.id}}">{{sell_product.name}}  &nbsp; &nbsp;</router-link></span>
			</div>
		</div>
	</div>

	<vue-good-table style="position: static; margin-top: 15px;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
        <span  v-if="props.column.field == 'name'">
          <router-link class="redirect_from_table" v-if="$can('Storage_show')" :to="{name: 'storages_show', params: {id: props.row.id}}">{{props.row.name}}</router-link>
          <span v-else>{{props.row.name}}</span>
        </span>
        </template>
    </vue-good-table>
</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			product: [
				{main_measure_type: {}},
			],
			balance: [],
			columns: [
				{
				  label: this.$t('Склад'),
				  field: 'name',
				},
				{
				  label: this.$t('Текущий баланс в грн'),
				  field: 'current_cost',
				},
				{
				  label: this.$t('Текущий баланс в ед. изм.'),
				  field: 'current_quantity',
				},
			],
			rows: [],
		} 
	},
	mounted(){
		
		// console.log(this.product)
	},
	created () {
        var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/product_types/'+this.id).then((response) => {
		       this.product = response.data['data']
		       if(this.product.type == '_perishable'){
		       	this.columns.push(
		       	{
		       		label: this.$t('Баланс просрочки в грн'),
		       		field: 'expired_current_cost',
		       	},
		       	{
		       		label: this.$t('Баланс просрочки в ед. изм.'),
		       		field: 'expired_current_quantity',
		       	})
		       }
		       document.title = this.product['name'];
		       this.axios.get(`/api/product_types/${this.id}/get_storages_quantity`).then(res => {
		       		this.balance = res.data['data']
		       		this.rows = this.balance
		       })
		       loader.hide()
		     }).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })
    },
}
</script>