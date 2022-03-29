<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Создание типа товара') }}</h1>
	<form class="tac form" @submit="CreateProduct">
		<div class="form_content">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<div class="form_item">
				<label class="tal" for="type">{{ $t('Тип') }}*:</label>
				<select required class="form-control" name="type" v-model="formData.type">
					<option value="_perishable">{{$t('Портящийся')}}</option>
					<option value="_imperishable">{{$t('Непортящийся')}}</option>
				</select>
			</div>
			<div class="form_item">
				<label class="tal" for="main_measure_type_id">{{ $t('Основная ед. изм.') }}*:</label>
				<select @change="MeasureTypesForSetMeasureTypes" style="padding: 0;" class="form-control" name="main_measure_type_id" v-model="formData.main_measure_type_id">
					<optgroup v-for="(measure_types_groups, group_name) in measure_types" :label="group_name == '_volume' ? $t('Обьем') : (group_name == '_weight' ? $t('Вес') : $t('Количество'))">
						<option  v-for="measure_types_group in measure_types_groups" :value="measure_types_group.id">{{measure_types_group.name}}</option>
					</optgroup>
				</select>
			</div>
			<div class="form_item">
				<VueMultiselect 
					v-model="value" 
					:options="measure_types_by_main_select"
					track-by="name"
					label="name"
					:multiple="true"
					:placeholder="$t('Установите доступные ед. изм.')"
					selectLabel=""
					:disabled="isDisabled"
					@select="SetMeasureTypes"
					@remove="UnsetMeasureTypes"
					>
				</VueMultiselect>
			</div>				
			<file-pond
			    name="photo"
			    ref="pond"
			    v-bind:file="formData.photo"
			    v-on:init="handleFilePondInit"
			    :multiple="false"
			    maxFiles='1'
			    labelIdle="Фото товара: перетащите файлы вручную или <span class='filepond--label-action'> Навигация </span>"
			    accept="image/png, image/jpeg, image/gif"
			    :required="false"
			/>	
			<div class="" style="display: flex; justify-content: center; align-items: center;">
				<input type="checkbox" v-model="is_create_product_for_sale" name="is_create_product_for_sale">
				<label for="is_create_product_for_sale">{{$t('создать как товар для продажи')}}</label>
			</div>
			<div class="form_item" style="margin-top: 10px;" v-if="is_create_product_for_sale">
				<label class="tal" for="price">{{ $t('Цена') }}*:</label>
				<input min="1" type="number" step="any" max="999999.99" required class="form-control" name="price" v-model="formData.price">
			</div>
			<button style="margin-inline:auto;"  class="btn btn-success mt-10" type="submit">{{ $t('Сохранить') }}</button>
		</div>
	</form>
	
</template>

<script>
// Import FilePond
import vueFilePond, { setOptions } from 'vue-filepond';
import VueMultiselect from 'vue-multiselect'
// Import the plugin code
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Import the plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

// Import styles
import 'filepond/dist/filepond.min.css';
import "vue-multiselect/dist/vue-multiselect.css"

// Create FilePond component
const FilePond = vueFilePond(FilePondPluginImagePreview);
// FilePond.registerPlugin(FilePondPluginImagePreview);

setOptions({
    server: {
        url: '/api/file_upload',
        headers: {
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
        },
        process: {
            onload: function (response) {
                document.querySelector("input[type='file']").setAttribute('value', response)

                return response
            },
        }
    }
});




export default{
	props: [
			'id'
		],
	components: {
        FilePond,
        VueMultiselect,
    },
	data(){
		return{
			formData: {
				company_id: this.$userId,
			},
			measure_types: {},
			measure_types_by_main_select: [],
			measure_types_id_by_main_select: [],
			measure_types_name_by_main_select: [],
			selected_measure_types: [],
			options: ['list', 'of', 'options'],
			value: null,
			isDisabled: true,
			is_create_product_for_sale: false,
		} 
	},
	mounted(){
		document.title = this.$t('Создание типа товара');
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/measure_types/get_grouped_by_base').then((response) => {
			console.log(response.data.data)
			this.measure_types = response.data.data
			// document.getElementsByClassName('filepond--credits').style.opacity = 0
			console.log(this.measure_types)
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
    	MeasureTypesForSetMeasureTypes(e) {

    		let measure_types = Object.assign({}, this.measure_types)
    		let base_measure_type_id = null
    		Object.keys(measure_types).forEach(key => {
    			try{
    				base_measure_type_id = measure_types[key].find(item => item.id == this.formData.main_measure_type_id).base_measure_type_id
    				this.formData.base_measure_type_id = base_measure_type_id
    			}
    			catch{

    			}
    			
    		})
    		this.axios.post('/api/measure_types/get_by_base_measure_type', {base_measure_type_id : base_measure_type_id}).then((response) => {
    			console.log(response.data.data)
    			this.measure_types_by_main_select = response.data.data
    			this.measure_types_by_main_select.splice(this.measure_types_by_main_select.indexOf(this.measure_types_by_main_select.find(item => item.id == this.formData.main_measure_type_id)), 1)
    			this.isDisabled = false

    		})
    	},
    	SetMeasureTypes(measure_type) {
    		this.selected_measure_types.push(measure_type.id)
    	},
    	UnsetMeasureTypes(measure_type){
    		this.selected_measure_types.splice(this.selected_measure_types.indexOf(this.selected_measure_types.find(item => item.id == measure_type.id)), 1)
    	},
    	CreateProduct(e) {
    		e.preventDefault()
    		var loader = this.$loading.show({
    		        canCancel: false,
    		        loader: 'dots',});
    		this.formData.photo = document.querySelector("input[type='file']").getAttribute('value')
    		this.formData.measure_types = this.selected_measure_types
    		console.log(this.formData)
    		this.axios.post('/api/product_types', this.formData).then((response) => {
    			if(this.is_create_product_for_sale){
    				this.axios.post('/api/sell_products', this.formData)
    			}
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			loader.hide()
    			this.$router.push({ name: 'products_type_show', params: {id: response.data.data.id}  })
    		})
    	},
    },
}
</script>

