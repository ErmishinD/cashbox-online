<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Редактирование магазина') }}</h1>
	<form class="tac form" @submit="update_shop">
		<div style="width: 100%;">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<div class="form_item">
				<label class="tal" for="address">{{ $t('Адрес') }}:</label>
				<input type="text" class="form-control" name="address" v-model="formData.address">
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
		this.emitter.emit("isLoading", true);
		this.axios.get('/api/shops/'+this.id).then((response) => {
		       this.formData = response.data['data']
		       this.formData.company_id = this.$companyId
		       document.title = this.formData['name'];
		       this.emitter.emit("isLoading", false);
		     })

	},
	created () {

    },
    methods:{
    	update_shop: function(e){
    		e.preventDefault()
    		this.emitter.emit("isLoading", true);
    		console.log(this.formData)
    		this.axios.put('/api/shops/'+this.id, this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			this.emitter.emit("isLoading", false);
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
    			this.emitter.emit("isLoading", false);
    		})
    	}
    },
	}
</script>
