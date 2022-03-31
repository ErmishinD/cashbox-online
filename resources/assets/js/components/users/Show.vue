<template>
	<div class="tac content_title">
		{{formData.name}}
		<small><router-link v-if="$can('User_edit')" :to="{name: 'users_edit', params: {ids: formData.id}}">{{ $t('Редактировать') }}</router-link></small>
	</div>
	<form class="tac form" >
		<div class="form_content">
			<div class="form_item">
				<label class="tal" for="username">{{ $t('Логин') }}:</label>
				<span >{{formData.username}}</span>
			</div>
			<div class="form_item">
				<label class="tal" for="email">{{ $t('Почта') }}:</label>
				<span >{{formData.email}}</span>
			</div>
			<div class="form_item">
				{{$t('Роли')}}: <span style="margin-left: 10px;" v-for="role in formData.roles">{{role.human_name}}</span>
			</div>				
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
		
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get(`/api/users/${this.id}`).then((result) => {
			this.formData = result.data.data
			document.title = this.formData.name;
			loader.hide()
		}).catch(function(error){
	            if(error.result.status == 403){
	            	loader.hide()
	                this.$router.push({ name: '403' })
	            }
	        })
	},
	created () {
        
    },
    methods:{
    },
}
</script>

<style scoped>
	.form_item{
		justify-content: space-between;
	}
</style>
