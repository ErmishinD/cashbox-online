<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Создание компании') }}</h1>
	<form class="tac" @submit="create_company">
		<div class="">
			<label for="name">{{ $t('Название') }}:</label>
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
			formData: {},
		} 
	},
	mounted(){
		document.title = this.$t('Создание компании');
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
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			window.location.href = `/settings/companies/show/${response.data.data.id}`
    		}).catch(err => {
    			console.log()
    			if(err.response.data.errors.name){
    				this.$notify({
    				text: this.$t('Данное название компании уже существует!'),
    				type: 'error',
    			});
    			}
    		})
    	}
    },
}
</script>