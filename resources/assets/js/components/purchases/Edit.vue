<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Редактирование') }} {{formData.product_type.name}}</h1>
	<form class="tac form" @submit="UpdatePurchase">
		<div class="form_content">
			<div class="form_item">
                <label class="tal" for="cost">{{ $t('Цена') }}*:</label>
                <input type="number" required class="form-control" name="cost" v-model="formData.cost">
            </div>
            <div class="form_item">
                <label class="tal" for="quantity">{{ $t('Кол-во') }}*:</label>
                <input style="width: 125px;" type="number" required class="form-control" name="quantity" v-model="formData.base_measure_quantity">
                <select required style="width: 125px;" class="form-control" v-model="formData.measure_type_quantity" name="" id="">
                    <option v-for="measure in formData.product_type.measure_types" :value="measure.quantity">{{measure.name}}</option>
                </select>
            </div>
            <div class="form_item">
                <label class="tal" for="storage">{{ $t('Склад') }}*:</label>
                <select class="form-control" name="" required id="" v-model="formData.storage_id">
                    <option v-for="storage in storage_list" :value="storage.id">{{storage.name}}</option>
                </select>
            </div>
            <div class="form_item" v-if="formData.expiration_date">
                <label class="tal" for="date">{{ $t('Срок годности') }}*:</label>
                <input type="date" class="form-control" name="date" v-model="formData.expiration_date">
            </div>
			<button style="margin-inline:auto;"  class="btn btn-success mt-10" type="submit">{{ $t('Сохранить') }}</button>
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
            product: [],
            formData: {
                product_type:{main_measure_type:{}},
            },
            storage_list: [],
            measure_types: [],
            measure_types_by_main_select: [],
            updateData: {},
            value: null,
        }
    },
    mounted(){
        this.emitter.emit("isLoading", true);
        this.axios.get('/api/product_purchases/'+this.id+'/get_for_edit').then((response) => {
            // this.product = response.data['data']
            this.formData = response.data['data']

            this.formData.base_measure_quantity = this.formData.quantity / this.formData.product_type.main_measure_type.quantity
            this.formData.measure_type_quantity = this.formData.product_type.main_measure_type.quantity
            this.storage_list = response.data.storages
            document.title = this.$t('Редактирование закупки');
            
            this.emitter.emit("isLoading", false);
        })
        
    },
    created () {
    	
    },
    methods:{
        MeasureTypesForSetMeasureTypes(e) {
        		let measure_types = Object.assign([], this.measure_types)
    			this.measure_types_by_main_select = measure_types

    			this.measure_types_by_main_select.splice(this.measure_types_by_main_select.indexOf(this.measure_types_by_main_select.find(item => item.id == this.formData.main_measure_type.id)), 1)
    			console.log(this.measure_types_by_main_select)
    	},

    	UpdatePurchase(e) {
    		e.preventDefault()
    		this.emitter.emit("isLoading", true);
    		this.updateData = Object.assign({}, this.formData)
            this.updateData.quantity = this.updateData.base_measure_quantity * this.updateData.measure_type_quantity
    		console.log(this.updateData)
    		this.axios.put('/api/product_purchases/' + this.id, this.updateData).then((response) => {
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
    },
}
</script>