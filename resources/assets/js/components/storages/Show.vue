<template>
	<notifications position="bottom right" />
	<div class="tac content_title">
		<button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>
		{{storage_name}}
		<small><router-link v-if="this.$can('Storage_edit')" :to="{name: 'storages_edit', params: {ids: this.id}}">{{ $t('Редактировать') }}</router-link></small>
	</div>
	<div class="tac" style="font-size: 20px;">{{$t('Баланс')}}: {{balance.all_balance}}грн</div>
	<div class="dashboard_actions_row">
		<input @change="search" :placeholder="$t('Поиск товара')" type="text">
        <select @change="getByCategory" v-model="selected_category">
            <option value="">{{$t('Все категории')}}</option>
            <option v-for="category in categories" :value="category.id">{{category.name}}</option>
            <option value="without_category">{{$t('Без категорий')}}</option>
        </select>
	</div>	
	<div class="cards">
		<div v-for="product in storage" class="card">
			<div class="card_img"  :style="{'background-image': `url(${product.photo})`}">
				<div class="card_img_href" :id="'card_img_href_'+product.id">
					<router-link v-if="this.$can('ProductType_show')" :to="{name: 'products_type_show', params: {id: product.id}}"><i class="fas fa-eye"></i></router-link>
					<router-link v-if="this.$can('ProductPurchase_show')" :to="{name: 'purchases_create', params: {product_type_id: product.id, storage_id: this.id, product_name: product.name}}"><i class="fas fa-cart-plus"></i></router-link>
					<router-link v-if="this.$can('WriteOff_create')" :to="{name: 'write_off_create', params: {product_type_id: product.id, storage_id: this.id, product_name: product.name}}"><i class="fas fa-ban"></i></router-link>
				</div>
			</div>

			<div class="card_content">
				<div class="card_title tac">{{product.name}}</div>
				<div class="card_items">
					<div class="card_item">
						<span>
							{{ $t('Кол-во на складе') }}:
						</span>

						<span style="word-break: break-all; text-align: end;">
							{{product.current_quantity_in_main_measure_type}}{{product.main_measure_type.name}}
						</span>
					</div>

					<div v-if="product.expired_current_quantity_in_main_measure_type" class="card_item" style="border-top: 1px solid #000;">
						<span>
							{{ $t('Просрочено на складе') }}:
						</span>

						<span style="word-break: break-all; text-align: end;">
							{{product.expired_current_quantity_in_main_measure_type}}{{product.main_measure_type.name}}
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			storage: [],
			balance: [],
			selected_category: '',
			shop_id: this.$shopId,
			unmounted: false,
			all_data_is_loaded: false,
			in_progress_loading_data: false,
			storage_name: '',
			serverParams: {
			  columnFilters: {
			  },
			  sort: {
			      field: '',
			      type: '',
			  },
			  page: 1,
			  perPage: 20,
			  storage_ids: [this.id],
			  with_expired: true
			},
		}
	},
	mounted(){
		this.axios.get('/api/categories').then((response) => {
                this.categories = response.data['data']
             })
		this.emitter.on("change_shop", res => {
                  this.shop_id = res
                  this.render_list_items(true)
                });
		if(this.shop_id){
			this.render_list_items(true)
			
		}
		document.addEventListener('scroll', this.scrolltoGetMoreData)
		 this.axios.post('/api/storages/get_balance', {storage_ids: [this.id]}).then(response => {
		 	this.balance = response.data['data']
		 	this.storage_name = this.balance.storages[0]['name'];
		 	document.title = this.storage_name
		 })

	},
	unmounted(){
		this.unmounted = true
		this.emitter.all.clear()
	},
	created () {

    },
    methods: {
    	getByCategory(){    
                this.serverParams.columnFilters.category_id = this.selected_category
                this.render_list_items(true)
            },
        search(e){
        		this.serverParams.columnFilters.name = e.target.value
        		this.render_list_items(true)
        	},
    	render_list_items(is_not_paginate=true){
    		this.in_progress_loading_data = true
    		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
    		if(is_not_paginate){
    			this.serverParams.page = 1
    		}
    		this.axios.post('/api/product_types/get_current_quantity', this.serverParams).then((response) => {
    			if(is_not_paginate){
    				Promise.resolve(this.storage = response.data['pagination']['data']).then(result => {
    					this.in_progress_loading_data = false
    				})
    			}
    			else{
    				Promise.resolve(Array.prototype.push.apply(this.storage, response.data.pagination.data)).then(result => {
    					this.in_progress_loading_data = false
    				})
    			}

    			if(response.data.pagination.last_page != response.data.pagination.current_page){
    				 this.serverParams.page = response.data.pagination.current_page+1
    				 this.all_data_is_loaded = false
    			}
    			else{
    				this.all_data_is_loaded = true
    			}
		       
		       loader.hide()
		       
		       console.table(this.storage)
		     })
    	},
    	scrolltoGetMoreData(){

    		window.onscroll = () => {
    			if(!this.all_data_is_loaded && !this.unmounted) {
    				let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight >= (document.body.scrollHeight - 100) && !this.in_progress_loading_data
    				console.log(this.in_progress_loading_data)
    				if (bottomOfWindow) {
    				  this.render_list_items(false)
    				}
    			}
    		};
    	},
    }
}
</script>
