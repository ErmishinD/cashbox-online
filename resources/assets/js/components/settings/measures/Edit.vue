<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Редактирование едидницы измерения') }}</h1>
	<form class="tac form" @submit="update_measure">
		<div style="width: 100%;">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<div class="form_item" v-if="formData.can_edit_base_measure_type">
				<label class="tal" for="base_measure_type">{{ $t('Базовая единица измерения') }}*:</label>
				<select required class="form-control" name="base_measure_type" v-model="formData.base_measure_type_id">
					<option v-for="item in base_measure_types_list" v-bind:value="item.id">{{item.name}}</option>
				</select>
			</div>
			<div class="form_item">
				<label class="tal" for="quantity">{{ $t('Кол-во в базовой ед. изм.') }}*:</label>
				<input type="number" min="1" required class="form-control" name="quantity" v-model="formData.quantity">
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
			base_measure_types_list:[],
		} 
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/measure_types/'+this.id).then((response) => {
		       this.formData = response.data['data']
		       this.formData.company_id = this.$companyId
		       if(this.formData.can_edit_base_measure_type){
		       		this.axios.get('/api/base_measure_types').then((response) => {
		       			console.log(response.data)
		       		       this.base_measure_types_list = response.data['data']
		       		       loader.hide()
		       		     })
		       }
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
    	update_measure: function(e){
    		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
    		e.preventDefault()
    		console.log(this.formData)
    		this.axios.put('/api/measure_types/'+this.id, this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			loader.hide()
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    		}).catch(err => {
    			console.log()
    			loader.hide()
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

<style lang="scss">
	.form-control{
		width: 50% !important;
	}
	.form_item label{
		width: 50% !important;
	}
</style>