<template >
	<notifications position="bottom right" />
	<GDialog style="z-index: 9999;" :persistent="false" v-model="remove_modal_show" max-width="500">
	    <div class="getting-started-example-styled">
	      <div class="getting-started-example-styled__content">
	        <div class="getting-started-example-styled__title">
	          {{ $t('Внимание') }}!
	        </div>

	        <p>{{ $t('Вы уверены, что хотите удалить') }} "{{current_card.sell_product.name}}"?</p>
	      </div>

	      <div class="getting-started-example-styled__actions">
	        <button @click="removeCard" class="btn btn-danger">
	          {{ $t('Удалить') }}
	        </button>
	      </div>
	    </div>
	  </GDialog>

	<div class="tac content_title">
		{{$t('Предпродажи')}}
		<small><router-link :to="{name: 'external_sales_history'}">{{ $t('История') }}</router-link></small>
	</div>

	<div v-for="card in cards" class="basket_card">
		<div  class="basket_card_content" style="padding: 5px 10px;">
			<div class="basket_card__photo_name">
				<img :src="card.sell_product.photo" class="basket_card__photo">
				<div class="basket_card__name" style="text-transform: none; font-variation-settings: 'wght' 500; word-break: normal;">
					<div>{{$t('Комплект')}}:{{card.sell_product.name}}</div>
					<div>{{$t('Описание')}}:{{card.description}} ({{ card.payment_type == '_card' ? 'Карта' : 'Наличные' }})</div>
				</div>
			</div>
			<div class="basket_card__price">
				<label for="price">{{ $t('Стоимость') }}:</label>
				<input type="number" min="1" name="price" v-model="card.amount">
			</div>
			<div class="basket_card__actions">
				<button class="btn btn-success" @click="redirectToDashboard(card)">{{$t('Подтвердить')}}</button>
				<button class="btn btn-danger" @click="openRemoveCardModal(card)"><i class="fas fa-trash"></i></button>
			</div>
		</div>
	</div>
</template>

<script>

	import { GDialog } from 'gitart-vue-dialog'
	import "gitart-vue-dialog/dist/style.css";

    export default {
    	components: {
		    GDialog,
		  },
    	data(){
    		return{
    			cards: [],
                categories: [],
                selected_category: '',
    			cards_for_sailing: [],
    			selected_dropdown: [],
    			selected_cards: [],
    			selected_dropdown_in_basket: [],
    			product_types_in_basket: [],
    			products_for_sale_in_basket: [],
    			product_types_in_storages: [],
    			overlimited_product_types: [],
    			in_progress_loading_data: false,
    			remove_modal_show: false,
    			serverParams: {
    			  page: 1,
    			  perPage: 10
    			},
    			all_data_is_loaded: false,
    			unmounted: false,
    			current_card: '',
    		}
    	},
        created () {
            document.title = this.$t('Предпродажи');
        },
        watch:{

        },
        mounted(){
           
    	 	document.addEventListener('scroll', this.scrolltoGetMoreData)
  		    this.render_list_items(true)

        },
        unmounted(){
        	this.unmounted = true
        },
        computed: {

            // countAllProductsPrice() {
            //   let sum = 0;
            //   this.cards_for_sailing.forEach(el => {
            //   	sum += parseFloat(el.current_price)
            //   })
            //   return parseFloat(sum.toFixed(10))
            // }
          },
        methods: {
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
        	render_list_items(is_not_paginate){
        		this.in_progress_loading_data = true
        		this.emitter.emit("isLoading", true);
        		if(is_not_paginate){
        			this.serverParams.page = 1
        		}
	        	this.axios.post('/api/external_sales/get_paginated', this.serverParams).then((response) => {
	        		let data = response.data
	        		if(is_not_paginate){
	        			Promise.resolve(this.cards = data.pagination.data).then(result => {
	        				this.in_progress_loading_data = false
	        			})
	        			
	        		}
			        else{
			        	Promise.resolve(Array.prototype.push.apply(this.cards, data.pagination.data)).then(result => {
			        		this.in_progress_loading_data = false
			        	})
			        }

			        this.cards.forEach(el => {
			        		
			        		el.sell_product.product_types.forEach(elem => {
			        			elem.current_quantity = elem.quantity_in_main_measure_type
			        		})
			        })

				       if(data.pagination.last_page != data.pagination.current_page){
				       	 this.serverParams.page = data.pagination.current_page+1
				       	 this.all_data_is_loaded = false
				       }
				       else{
				       	this.all_data_is_loaded = true
				       }


			       this.emitter.emit("isLoading", false);
			     })

	  		     
			 },

        	toggleClassForDropdownInBasket(card_id){
        		if(this.selected_dropdown_in_basket.indexOf(card_id) != -1){
        			this.selected_dropdown_in_basket.splice(this.selected_dropdown_in_basket.indexOf(card_id), 1)
        		}
        		else{
        			this.selected_dropdown_in_basket.push(card_id)
        		}
        	},

        	redirectToDashboard(card) {
				console.log(card)
				this.$router.push({ name: 'home', params: {external_sale_id_prop: card.id, external_sale_amount_prop: card.amount, product: JSON.stringify(card.sell_product)}})
        		// this.emitter.emit("isLoading", true);

        		// let sell_product = []
 
    			// card.sell_product.sell_product_id = card.sell_product.id
    			// card.sell_product.amount = card.amount
    			// card.sell_product.product_types.forEach(elem => {
    			// 	elem.quantity = elem.quantity_in_main_measure_type * elem.main_measure_type.quantity
    			// })

    			// sell_product.push(card.sell_product)


        		// let sale_data = {
        		// 	'shop_id': 1,
        		// 	'transaction_type' : '_in',
        		// 	'payment_type' : card.payment_type,
        		// 	'amount': card.amount,
        		// 	'operator_id' : 1,
        		// 	'sell_products' : sell_product
        		// }

        		// this.axios.post('/api/cashbox/mass_create', sale_data).then((response) => {

				// 	let cashbox_id = response.data.data[0].id
        			
        		// 	this.axios.post(`api/external_sales/${card.id}/confirm`, {cashbox_id: cashbox_id}).then((res) => {
	        	// 			this.$notify({
	        	// 			text: this.$t('Успешно!'),
	        	// 			type: 'success',
        		// 		});
	        	// 		this.render_list_items(true)
        		// 	}).catch(error => {
				//           this.$notify({
				//             text: this.$t('Ошибка при подтверждении!'),
				//             type: 'error',
				//           });
				//           this.emitter.emit("isLoading", false);
				//       })
        		// }).catch(error => {
			    //       this.$notify({
			    //         text: this.$t('Ошибка при добавлении записи в кассу!'),
			    //         type: 'error',
			    //       });
			    //       this.emitter.emit("isLoading", false);
			    //   })
        	},

        	resetData(){
        		this.cards_for_sailing = []
        		this.selected_dropdown = []
        		this.selected_cards = []
        		this.selected_dropdown_in_basket = []
        		this.product_types_in_basket = []
        		this.products_for_sale_in_basket = []
        		this.product_types_in_storages = []
        		this.overlimited_product_types = []
        		this.modal_show = false
        	},

        	openRemoveCardModal(card){
        		this.current_card = card
        		this.remove_modal_show = true
        	},

        	removeCard(card_data){
        		this.emitter.emit("isLoading", true);

        		this.axios.delete(`api/external_sales/${this.current_card.id}`).then((response) => {
        			this.$notify({
        			  text: this.$t('Успешно!'),
        			  type: 'success',
        			});
        			this.remove_modal_show = false
		  			this.render_list_items(true)
		  		}).catch(error => {
		          this.$notify({
		            text: this.$t('Ошибка при удалении!'),
		            type: 'error',
		          });
		      }).finally((result) => {
		        this.modal_show = false
		      })

        	},
        },
    }
</script>

<style scoped>
	.basket_card__name{
		margin-left: 15px;
	}

	.basket_card{
		background-color: #fff;
		border-radius: 5px;
		margin-bottom: 10px;
	}

	.basket_card_ingridients .card_item{
		margin-inline: 10px;
	}
</style>