<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Создание единицы измерения') }}</h1>
	<form class="tac form" @submit="create_measure">
		<div class="form_content">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<div class="form_item">
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
				'company_id' : this.$companyId,
			},
			base_measure_types_list: null,
		} 
	},
	mounted(){
		
		document.title = this.$t('Создание единицы измерения');
		this.emitter.emit("isLoading", true);
		this.axios.get('/api/base_measure_types').then((response) => {
			console.log(response.data)
		       this.base_measure_types_list = response.data['data']
		       this.emitter.emit("isLoading", false);
		     })
		
		
	},
	created () {
        
    },
    methods:{
    	create_measure: function(e){
    		e.preventDefault()
    		this.emitter.emit("isLoading", true);
    		console.log(this.formData)
    		this.axios.post('/api/measure_types', this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			Promise.resolve(this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			})).then(result => {
    				this.emitter.emit("isLoading", false);
    				this.$router.push({ name: 'settings_measures_index' })
    			})
    			
    		}).catch(err => {
    			console.log()

    					this.$notify({
    					text: this.$t('Произошла ошибка!'),
    					type: 'error',
    				});

    					this.emitter.emit("isLoading", false);
    			
    		})
    	}
    },
}
</script>

<style scoped lang="scss">
	.form{
		width: 420px;
		display: flex;
		margin-inline: auto;
		&_item{
			display: flex;
			margin-bottom: 10px;
			label{
				width: 50%;

			}
			input, select{
				width: 63%;
			}
		}
	}
</style>