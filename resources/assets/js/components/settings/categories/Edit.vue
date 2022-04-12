<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Редактирование категории') }}</h1>
	<form class="tac form" @submit="update_category">
		<div style="width: 100%;">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
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
			formData: {
				
			},
		} 
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/categories/'+this.id).then((response) => {
		       this.formData = response.data['data']
		       document.title = this.formData['name'];
		       loader.hide()
		     }).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })
		
	},
	created () {
        
    },
    methods:{
    	update_category: function(e){
    		e.preventDefault()
    		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
    		console.log(this.formData)
    		this.axios.put('/api/categories/'+this.id, this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    		}).catch(err => {
    			console.log()
    			if(err.response.data.errors.name){
    				this.$notify({
    					text: this.$t('Данное название компании уже существует!'),
    					type: 'error',
    				});
    			}
    			else{
    					this.$notify({
    					text: this.$t('Произошла ошибка!'),
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