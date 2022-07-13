<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Создание контрагента') }}</h1>
	<form @submit="create_counterparty">
		<div class="form_content">
			<div style="width: 300px; margin-inline: auto;" class="form_item ">
				<label for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<button style="margin-inline:auto;" class="btn btn-success mt-10" type="submit">{{ $t('Сохранить') }}</button>
		</div>
		
	</form>
	
</template>

<script>
export default{
	data(){
		return{
			formData: {},
		} 
	},
	mounted(){
		document.title = this.$t('Создание контрагента');
		
	},
	created () {
        
    },
    methods:{
    	create_counterparty: function(e){
    		e.preventDefault()
    		this.emitter.emit("isLoading", true);
    		this.axios.post('/api/counterparties', this.formData ).then((response) => {
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    		}).catch(err => {
    			this.$notify({
    				text: this.$t('Ошибка!'),
    				type: 'error',
    			});
    		}).finally(() => {
    			this.emitter.emit("isLoading", false);
    		})
    		
    	},
    },
}
</script>