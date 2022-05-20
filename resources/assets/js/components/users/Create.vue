<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Создание пользователя') }}</h1>
	<form class="tac form" @submit="CreateUser">
		<div class="form_content">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('ФИО') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<div class="form_item">
				<label class="tal" for="username">{{ $t('Логин') }}*:</label>
				<input type="text" required class="form-control" name="username" v-model="formData.username">
			</div>
			<div class="form_item">
				<label class="tal" for="email">{{ $t('Почта') }}*:</label>
				<input type="email" required class="form-control" name="email" v-model="formData.email">
			</div>
			<div class="form_item">
				<label class="tal" for="password">{{ $t('Пароль') }}*:</label>
				<input type="password" readonly onfocus="this.removeAttribute('readonly')" required class="form-control" name="password" v-model="formData.password">
			</div>
			<div class="form_item">
				<VueMultiselect 
					v-model="selected_roles" 
					:options="roles"
					track-by="human_name"
					label="human_name"
					:multiple="true"
					:placeholder="$t('Установите роли')"
					selectLabel=""
					
					>
				</VueMultiselect>
			</div>				
			<button style="margin-inline:auto;"  class="btn btn-success mt-10" type="submit">{{ $t('Сохранить') }}</button>
		</div>
	</form>
	
</template>

<script>
import VueMultiselect from 'vue-multiselect'

import "vue-multiselect/dist/vue-multiselect.css"



export default{
	props: [
			'id'
		],
	components: {
        VueMultiselect,
    },
	data(){
		return{
			formData: {
				company_id: this.$userId,
			},
			selected_roles: [],
			roles: [],
		} 
	},
	mounted(){
		document.title = this.$t('Создание пользователя');
		this.emitter.emit("isLoading", true);
		this.axios.get('/api/roles').then((response) => {
			this.roles = response.data.data
			this.emitter.emit("isLoading", false);
		})
		
		

	},
	created () {
        
    },
    methods:{
    	CreateUser(e) {
    		e.preventDefault()

    		if(!this.selected_roles.length){
    			this.$notify({
	    				text: this.$t('Укажите роли!'),
	    				type: 'error',
	    			});
    			return
    		}
    		this.emitter.emit("isLoading", true);
    		
    		this.formData.roles = []
    		if(this.selected_roles.length){
    			this.selected_roles.forEach(item => {
    				this.formData.roles.push(item.id)
    			})	
    		}
    		
    		console.log(this.formData)
    		this.axios.post('/api/users', this.formData).then((response) => {
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			this.emitter.emit("isLoading", false);
    			this.$router.push({ name: 'users_show', params: {id: response.data.data.id}  })
    		}).catch(error => {
    			console.log(error.response.data.errors.username)
    			
    			if(error.response.data.errors.username){
    				this.$notify({
	    				text: this.$t('Данный логин уже существует!'),
	    				type: 'error',
    				});
    			}
    			if(error.response.data.errors.email){
	    			this.$notify({
	    				text: this.$t('Данная почта уже существует!'),
	    				type: 'error',
    				});
    			}
    			this.emitter.emit("isLoading", false);
    		})
    	},
    },
}
</script>