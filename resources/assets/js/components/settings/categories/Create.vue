<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Создание категории') }}</h1>
	<form class="tac form" @submit="create_category">
		<div class="form_content">
			<div class="form_item">
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
		document.title = this.$t('Создание категории');
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		loader.hide()
	},
	created () {

    },
    methods:{
    	create_category: function(e){
    		e.preventDefault()
    		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
    		console.log(this.formData)
    		this.axios.post('/api/categories', this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			Promise.resolve(this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			})).then(result => {
    				this.$router.push({ name: 'settings_categories_index' })
    			})
    			// window.location.href = `/settings/companies/${response.data.data.id}`
    		}).catch(err => {
    			console.log()
    			if(err.response.data.errors.name){
    				this.$notify({
    				text: this.$t('Данное название категории уже существует!'),
    				type: 'error',
    			});
    			}
    		}).finally(result => {
    			loader.hide()
    		})
    	}
    },
}
</script>