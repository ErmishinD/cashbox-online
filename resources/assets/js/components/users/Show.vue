<template>
	{{user}}
</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			user: [],
		} 
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/users/'+this.id).then((response) => {
		       this.user = response.data['data']
		       document.title = this.user['name'];
		       loader.hide()
		       console.table(this.user)
		     }).catch(function(error){
  		     	if(error.response.status == 403){
  		     		this.$router.push({ name: '403' })
  		     	}
  		     })
		
	},
	created () {
        
    },
}
</script>