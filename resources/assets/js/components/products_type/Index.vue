<template>
	<div v-for="product in products" class="" >
		{{product['id']}} - {{product['name']}} - {{product['barcode']}}
		<div class="" @click="delete_item(product['id'])">delete</div>
		<router-link :to="{name: 'products_type_edit', params: {id: product.id}}" class="">EDIT(a kyda?)</router-link>
		<router-link :to="{name: 'products_type_show', params: {id: product.id}}" class="">GOGOGO</router-link>
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
			this.render_list_items()
			// console.log(this.product)
		},
		created () {
            document.title = "Product types";
        },
        methods:{
        	delete_item: function(id){
        		axios.delete(`/api/product_types/${id}`, {
        		  
        		}).then((response) => {
        			this.render_list_items()
        		});

        	},
        	render_list_items: function(){
        		var loader = this.$loading.show({
        		        canCancel: false,
        		        loader: 'dots',});
        		this.axios.get('/api/product_types').then((response) => {
        		       this.products = response.data['data']
        		       loader.hide()
        		     })
        	},
        }
	}
</script>