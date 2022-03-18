<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Создание склада') }}</h1>
	<form class="tac form" @submit="create_storage">
		<div class="form_content">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<div class="form_item">
				<label class="tal" for="shop">{{ $t('Магазин') }}:</label>
				<select required class="form-control" name="shop" v-model="formData.shop_id">
					<option v-for="shop in shop_list" v-bind:value="shop.id">{{shop.name}}</option>
				</select>
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
				'company_id' : this.$companyId,
			},
			shop_list: null,
		} 
	},
	mounted(){
		
		document.title = this.$t('Создание склада');
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.post('/api/shops/get_by_company', {'company_id': this.$companyId}).then((response) => {
			console.log(response.data)
		       this.shop_list = response.data['data']
		       loader.hide()
		     }).catch(function(error){
  		     	if(error.response.status == 403){
  		     		this.$router.push({ name: '403' })
  		     	}
  		     })
		
		
	},
	created () {
        
    },
    methods:{
    	create_storage: function(e){
    		e.preventDefault()
    		console.log(this.formData)
    		this.axios.post('/api/storages', this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			this.$router.push({ name: 'storages_show', params: {id: response.data.data.id} })
    			// window.location.href = `/storages/${response.data.data.id}`
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
			input, select{
				width: 70%;
			}
		}
	}
</style>