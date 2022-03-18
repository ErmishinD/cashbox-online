<template>
	<notifications position="bottom right" />
	<div class="tac content_title">
		{{storage.name}}
		<small><router-link :to="{name: 'storages_edit', params: {ids: storage.id}}">{{ $t('Редактировать') }}</router-link></small>
	</div>
		<div class="cards">
			<div v-for="product in storage.product_purchases" class="card">
				<div class="card_img"  :style="{'background-image': `url(${product.product_type.photo})`}">
					<div class="card_img_href" :id="'card_img_href_'+product.product_type.id">
						<router-link :to="{name: 'products_type_show', params: {id: product.product_type.id}}"><i class="fas fa-eye"></i></router-link>
						<router-link :to="{name: 'purchases_index', params: {product_type_id: product.product_type.id, storage_id: this.id, product_name: product.product_type.name}}"><i class="fas fa-cart-plus"></i></router-link>
					</div>
				</div>

				<div class="card_content">
					<div class="card_title tac">{{product.product_type.name}}</div>
					<div class="card_items">
						<div class="card_item">
							<span>
								{{ $t('Кол-во на складе') }}:
							</span>

							<span style="word-break: break-all; text-align: end;">
								{{product.current_quantity_in_main_measure_type}}{{product.measure_type.name}}
							</span>
						</div>
					</div>
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
			storage: [],
		}
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/storages/'+this.id).then((response) => {
		       this.storage = response.data['data']
		       document.title = this.storage['name'];
		       loader.hide()
		       console.table(this.storage)
		     }).catch(function(error){
  		     	if(error.response.status == 403){
  		     		this.$router.push({ name: '403' })
  		     	}
  		     })

	},
	created () {

    },
    methods: {
    	// settingShow(id){
    	// 	document.querySelector(`#card_img_href_${id}`).style.opacity = 1
    	// },
    	// settingHide(id){
    	// 	document.querySelector(`#card_img_href_${id}`).style.opacity = 0
    	// },
    }
}
</script>
