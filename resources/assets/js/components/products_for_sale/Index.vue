<template>
	<div v-for="product in products" class="" >
		{{product['id']}} - {{product['name']}} - {{product['price']}}
	</div>
</template>


<script>
	export default{
		data(){
			return{
				products: null
			} 
		},
		mounted(){
			var loader = this.$loading.show({
			        canCancel: false,
			        loader: 'dots',});
			
			this.axios.get('/api/sell_products').then((response) => {
			       this.products = response.data['data']
			       loader.hide()

			     })

		},
		created () {
            document.title = "Products for sale";
            

        },
	}
</script>
