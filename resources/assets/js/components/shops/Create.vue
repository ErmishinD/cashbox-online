<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Создание магазина') }}</h1>
	<form class="tac form" @submit="create_shop">
		<div class="form_content">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<div class="form_item">
				<label class="tal" for="address">{{ $t('Адрес') }}:</label>
				<input type="text" required class="form-control" name="address" v-model="formData.address">
			</div>
			<div class="form_item" id="for_copy_storage">
				<label class="tal" for="storage_name">{{ $t('Название склада') }}:</label>
				<input type="text" class="form-control storage_input_for_shop" name="storage_name">
			</div>
			<small @click="createStorageInput">+ {{$t('еще один склад')}}</small>
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
				storage_names: []
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
    		let storages = document.querySelectorAll('.storage_input_for_shop')
    		storages.forEach(storage => {
    			if(storage.value){
    				this.formData.storage_names.push(storage.value)
    			}
    		})
    		console.log(this.formData.storage_names)
    		this.axios.post('/api/shops', this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			this.$router.push({ name: 'shops_show', params: {id: response.data.data.id}  })
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
    	},
    	createStorageInput: function(e){
    		let clone = document.querySelector('#for_copy_storage').cloneNode(true)
    		clone.id = ''
    		e.target.insertAdjacentHTML('beforebegin', clone.outerHTML);
    	}
    },
}
</script>

