<template>
	<div class="">{{formData.id}} - {{formData.name}} - {{formData.barcode}}</div>
	<form @submit="update_product_info">
		<input type="text" name="id" v-model="formData.id">
		<input type="text" name="name" v-model="formData.name">
		<input type="text" name="barcode" v-model="formData.barcode">
		<button type="submit">Submit</button>
	</form>
	
</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			product: [],
			formData: {},
		} 
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/product_types/'+this.id).then((response) => {
		       this.product = response.data['data']
		       document.title = this.product['name'];
		       this.formData = {id: this.product.id,
								name: this.product.name,
								barcode: this.product.barcode,
							}
		       loader.hide()
		     })
		// console.log(this.product)
	},
	created () {
        
    },
    methods:{
    	update_product_info: function(e){
    		e.preventDefault()
    		this.axios.put('/api/product_types/'+this.id, this.formData).then((response) => {
    			console.log(response)
    		})
    	}
    },
}
</script>