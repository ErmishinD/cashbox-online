<template>
	<div class="">{{product.id}} - {{product.name}}</div>
	<img :src="product.photo" alt="">
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
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/product_types/'+this.id).then((response) => {
		       this.product = response.data['data']
		       document.title = this.product['name'];
		       loader.hide()
		     }).catch(function(error){
  		     	if(error.response.status == 403){
  		     		window.location.href = '/403';
  		     	}
  		     })
		// console.log(this.product)
	},
	created () {
        
    },
}
</script>