<template>
	{{storage}}
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
		     })
		
	},
	created () {
        
    },
}
</script>