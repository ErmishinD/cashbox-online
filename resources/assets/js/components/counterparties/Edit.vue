<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Редактирование контрагента') }}</h1>
	<form @submit="edit_counterparty">
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
	props: [
        'id'
    ],
	data(){
		return{
			formData: {},
		} 
	},
	mounted(){
		document.title = this.$t('Редактирование контрагента');
		this.emitter.emit("isLoading", true);
		this.axios.get(`/api/counterparties/${this.id}`).then((response) => {
			this.formData = response.data.data
			this.emitter.emit("isLoading", false);
		})
		
	},
	created () {
        
    },
    methods:{
    	edit_counterparty: function(e){
    		e.preventDefault()
    		this.emitter.emit("isLoading", true);
    		this.axios.put(`/api/counterparties/${this.id}`, this.formData ).then((response) => {
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