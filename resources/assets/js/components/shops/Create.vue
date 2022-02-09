<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Создание магазина') }}</h1>
	<form class="tac form" @submit="create_shop">
		<div style="width: 100%;">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<div class="form_item">
				<label class="tal" for="address">{{ $t('Адрес') }}:</label>
				<input type="text" required class="form-control" name="address" v-model="formData.address">
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
			formData: {
				company_id: this.$userId,
			},
		} 
	},
	mounted(){
		document.title = this.$t('Создание магазина');
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		loader.hide()
		
	},
	created () {
        
    },
    methods:{
    	create_shop: function(e){
    		e.preventDefault()
    		console.log(this.formData)
    		this.axios.post('/api/shops', this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			window.location.href = `/shops/${response.data.data.id}`
    		}).catch(err => {
    			console.log()
    			if(err.response.data.errors.name){
    				
    			}
    			else{
    					this.$notify({
    					text: this.$t('Произошла ошибка!'),
    					type: 'error',
    				});
    			}
    		})
    	}
    },
}
</script>

<style scoped lang="scss">
	.form{
		width: 360px;
		display: flex;
		margin-inline: auto;
		&_item{
			display: flex;
			margin-bottom: 10px;
			label{
				width: 30%;

			}
			input{
				width: 70%;
			}
		}
	}
</style>