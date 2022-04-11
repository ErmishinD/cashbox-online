<template>
	<div class="tac content_title">
		<button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>
		{{formData.name}}
		<small><router-link v-if="$can('SellProduct_edit')" :to="{name: 'products_type_edit', params: {ids: formData.id}}">{{ $t('Редактировать') }}</router-link></small>
	</div>
	<form class="tac form">
		<div class="form_content">
			<div class=" tac">
				<img :src="formData.photo" alt="" style="width: 240px;
			height: 150px;
			object-fit: cover;">
			</div>
			<div class="form_item">
				<label class="tal" for="price">{{ $t('Цена') }}:</label>
				<span >{{formData.price}}</span>
			</div>
			<span class="tac">{{$t('Состав')}}:</span>
			<div class="form_item" v-for="contain in selected_contains">
				<span style="margin-right: 10px;">{{contain.name}}</span>
				<span >{{contain.quantity_in_main_measure_type}} {{contain.main_measure_type.name}}</span>
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
			contains_for_multiselect: [],
			default_selected_contains: [],
			selected_contains: [],
			contains: null,
		} 
	},
	mounted(){
		

	},
	created () {
        
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get(`/api/sell_products/${this.id}`).then((response) => {
			this.formData = response.data.data
			document.title = this.formData.name
			this.formData.product_types.forEach(item => {
				item.quantity = item.main_measure_type.quantity
				this.selected_contains.push(item)
				this.default_selected_contains.push(item)
				loader.hide()
			}).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })
			console.log(this.selected_contains)
		})
		
		
		
    },
    methods:{

    },
}
</script>

<style scoped lang="scss">
	.form_item{
		justify-content: space-between;
	}
	.form_content{
		background-color: #fff;
		border-radius: 5px;
		padding-inline: 5px;
	}
</style>