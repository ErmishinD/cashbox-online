<template>
	<notifications position="bottom right" />
	<h1 v-if="formData.name" class="tac">{{formData.name}}</h1>
	<h1 v-else class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Компания') }}</h1>
	<form class="tac" @submit="update_company_info">
		<div class="edit_info">
			<label for="name">{{ $t('Название') }}*:</label>
			<input type="text" required class="form-control" name="name" v-model="formData.name">
			<button style="margin-inline:auto;" class="btn btn-success mt-10" type="submit">{{ $t('Сохранить') }}</button>
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
		this.emitter.emit("isLoading", true);
		this.axios.get('/api/companies/'+this.id).then((response) => {
		       this.company = response.data['data']
		       document.title = this.company['name'];
		       this.formData = {id: this.company.id,
								name: this.company.name,
							}
		       this.emitter.emit("isLoading", false);

		     })
		// console.log(this.company)
	},
	created () {
        
    },
    methods:{
    	update_company_info: function(e){
    		this.emitter.emit("isLoading", true);
    		e.preventDefault()
    		this.axios.put('/api/companies/'+this.id, this.formData).then((response) => {
    			console.log(response)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			this.emitter.emit("isLoading", false);
    		}).catch(err => {
    			console.log()
    			if(err.response.data.errors.name){
    				this.$notify({
    				text: this.$t('Данное название компании уже существует!'),
    				type: 'error',
    			});
    			}
    			this.emitter.emit("isLoading", false);
    		})
    	}
    },
}
</script>