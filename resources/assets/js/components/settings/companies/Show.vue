<template>
	<div class="">{{company}}</div>
</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			company: []
		} 
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/companies/'+this.id).then((response) => {
		       this.company = response.data['data']
		       document.title = this.company['name'];
		       loader.hide()
		       console.table(this.company)
		     })
		
	},
	created () {
        
    },
}
</script>