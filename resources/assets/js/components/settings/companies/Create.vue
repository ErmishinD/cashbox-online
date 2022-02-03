<template>
	<notifications position="bottom right" />
	<h1 class="tac">Create company</h1>
	<form class="tac" @submit="create_company">
		<div class="">
			<label for="name">Name:</label>
			<input type="text" required class="form-control" name="name" v-model="formData.name">
			<button style="margin-inline:auto;" class="btn btn-success mt-10" type="submit">Submit</button>
		</div>
		
	</form>
	
</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			formData: {},
		} 
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		loader.hide()
	},
	created () {
        
    },
    methods:{
    	create_company: function(e){
    		e.preventDefault()
    		console.log(this.formData)
    		this.axios.post('/api/companies', this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: 'Complete!',
    				type: 'success',
    			});
    			window.location.href = `/settings/companies/show/${response.data.data.id}`
    		}).catch(err => {
    			console.log()
    			if(err.response.data.errors.name){
    				this.$notify({
    				text: 'Name is already taken!',
    				type: 'error',
    			});
    			}
    		})
    	}
    },
}
</script>