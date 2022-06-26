<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Редактирование типа товара') }}</h1>
	<form class="tac form" @submit="UpdateProduct">
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
			<div class="form_item" v-if="formData.main_measure_type">
				<label class="tal" for="main_measure_type_id">{{ $t('Основная ед. изм.') }}*:</label>
				<select @change="MeasureTypesForSetMeasureTypes" style="padding: 0;" class="form-control" name="main_measure_type_id" v-model="formData.main_measure_type.id">
					<option  v-for="measure_type in measure_types" :value="measure_type.id">{{measure_type.name}}</option>
				</select>
			</div>
			<div class="form_item">
				<label class="tal" for="main_measure_type_id">{{ $t('Порог предупреждения') }}*:</label>
				<input type="number" step="any" required class="form-control" name="name" v-model="warning_threshold">
			</div>
			<div class="form_item">
				<VueMultiselect 
					v-model="selected_measure_types" 
					:options="measure_types_by_main_select"
					label="name"
                    track-by="name"
					:multiple="true"
					:placeholder="$t('Установите доступные ед. изм.')"
					selectLabel=""
					:disabled="isDisabled"
					>
				</VueMultiselect>
			</div>				
			<file-pond
			    name="photo"
			    ref="pond"
			    v-bind:file="updateData.photo"
			    v-on:init="handleFilePondInit"
			    :multiple="false"
			    maxFiles='1'
			    labelIdle="Фото товара: перетащите файлы вручную или <span class='filepond--label-action'> Навигация </span>"
			    accept="image/png, image/jpeg, image/gif"
			    :required="false"
			/>	
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
    data(){
        return{
            product: [],
            formData: {},
            measure_types: [],
            measure_types_by_main_select: [],
            selected_measure_types: [],
            updateData: {},
            value: null,
            warning_threshold: 0,
            main_measure_type: [],
        }
    },
    mounted(){
        this.emitter.emit("isLoading", true);
        this.axios.get('/api/product_types/'+this.id).then((response) => {
            // this.product = response.data['data']
            Promise.resolve(this.formData = response.data['data']).then(result => {
            	this.warning_threshold = this.formData.warning_threshold / this.formData.main_measure_type?.quantity
            	this.main_measure_type = this.formData.main_measure_type
            	this.axios.post('/api/measure_types/get_by_base_measure_type', {base_measure_type_id: this.formData.base_measure_type_id}).then((response) => {
            		Promise.resolve(this.measure_types = response.data.data).then(result => {
            			this.MeasureTypesForSetMeasureTypes()
            		})
            		
            	})
            })

            this.formData.measure_types.forEach(item => {
                console.log(item.id, this.formData.main_measure_type.id)
                if(item.id != this.formData.main_measure_type.id){
                    this.selected_measure_types.push(item)
                }
            })
            console.log(this.selected_measure_types)
            
            document.title = this.formData['name'];
            
            this.emitter.emit("isLoading", false);
        })
        
    },
    created () {
    	
    },
    methods:{
        MeasureTypesForSetMeasureTypes(e) {
        		let measure_types = Object.assign([], this.measure_types)
    			this.measure_types_by_main_select = measure_types
    			this.main_measure_type = this.measure_types_by_main_select.find(item => item.id == this.formData.main_measure_type.id)
    			this.measure_types_by_main_select.splice(this.measure_types_by_main_select.indexOf(this.measure_types_by_main_select.find(item => item.id == this.formData.main_measure_type.id)), 1)
    			console.log(this.measure_types_by_main_select)
    	},

    	UpdateProduct(e) {
    		e.preventDefault()
    		this.emitter.emit("isLoading", true);

    		this.formData.warning_threshold = this.main_measure_type.quantity * this.warning_threshold

    		this.updateData = Object.assign({}, this.formData)
    		let photo = document.querySelector("input[type='file']").getAttribute('value')
    		if(photo){
    			this.updateData.photo = photo
    		} 		
    		this.updateData.measure_types = []
    		this.selected_measure_types.forEach(item => {
    			this.updateData.measure_types.push(item.id)
    		})
    		this.updateData.main_measure_type_id = this.updateData.main_measure_type.id
    		console.log(this.updateData)
    		this.axios.put('/api/product_types/' + this.id, this.updateData).then((response) => {
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			this.emitter.emit("isLoading", false);
    		}).catch(err => {
                if(err.response.data.errors.name){
                    this.$notify({
                        text: this.$t('Данное название уже существует!'),
                        type: 'error',
                    });
                }
            })
    	},
    },
    components: {
        FilePond,
        VueMultiselect,
    },
}
</script>

<style scoped>
	.form{
		width: 450px;
	}
	.form_item {
	    justify-content: space-between;
	}
	.form_item input, .form_item select {
	    width: 60%;
	}
</style>