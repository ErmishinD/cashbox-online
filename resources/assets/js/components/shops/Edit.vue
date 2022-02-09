<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Редактирование магазина') }}</h1>
	<form class="tac form" @submit="update_shop">
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
				
			},
		} 
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/shops/'+this.id).then((response) => {
		       this.formData = response.data['data']
		       this.formData.company_id = this.$companyId
		       document.title = this.formData['name'];
		       loader.hide()
		     })
		loader.hide()
		
	},
	created () {
        
    },
    methods:{
    	update_shop: function(e){
    		e.preventDefault()
    		console.log(this.formData)
    		this.axios.put('/api/shops/'+this.id, this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
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