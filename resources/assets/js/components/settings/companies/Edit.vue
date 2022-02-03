<template>
	<notifications position="bottom right" />
	<h1 v-if="formData.name" class="tac">{{formData.name}}</h1>
	<h1 v-else class="tac">Name of company</h1>
	<form class="tac" @submit="update_company_info">
		<div class="edit_info">
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
			company: [],
			formData: {
				
			},
		} 
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/companies/'+this.id).then((response) => {
		       this.company = response.data['data']
		       document.title = this.company['name'];
		       this.formData = {id: this.company.id,
								name: this.company.name,
							}
		       loader.hide()

		     })
		// console.log(this.company)
	},
	created () {
        
    },
    methods:{
    	update_company_info: function(e){
    		e.preventDefault()
    		this.axios.put('/api/companies/'+this.id, this.formData).then((response) => {
    			console.log(response)
    			this.$notify({
    				text: 'Complete!',
    				type: 'success',
    			});
    		})
    	}
    },
}
</script>