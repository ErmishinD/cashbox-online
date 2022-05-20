<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Создание компании') }}</h1>
	<form class="tac" @submit="create_company">
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
		document.title = this.$t('Создание компании');

	},
	created () {

    },
    methods:{
    	create_company: function(e){
    		e.preventDefault()
    		this.emitter.emit("isLoading", true);
    		console.log(this.formData)
    		this.axios.post('/admin/companies', this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			this.emitter.emit("isLoading", false);
    			this.$router.push({ name: 'settings_companies_show', params: {id: response.data.data.id} })
    			// window.location.href = `/settings/companies/${response.data.data.id}`
    		}).catch(err => {
    			console.log()
    			if(err.response.data.errors.name){
    				this.$notify({
    				text: this.$t('Данное название компании уже существует!'),
    				type: 'error',
    			});
    			}
    			this.emitter.emit("isLoading", false);
    		})
    	}
    },
}
</script>

<style scoped>
	.form_item{
		width: 360px;
		margin-inline: auto;
	}
</style>
