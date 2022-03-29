<template>
	<div class="tac content_title">
		{{product.name}}
		<small><router-link :to="{name: 'products_type_edit', params: {ids: product.id}}">{{ $t('Редактировать') }}</router-link></small>
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
					{{$t('Тип')}}: {{product.type == '_imperishable' ? $t('Портящийся') : $t('Непортящийся')}}
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
</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			product: []
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
		       document.title = this.product['name'];
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