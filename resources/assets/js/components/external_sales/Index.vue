<template >
	<notifications position="bottom right" />
	<!-- <GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="700">
	    <div class="getting-started-example-styled">
	      <div class="getting-started-example-styled__content">
	        <div class="getting-started-example-styled__title">
	        	{{ $t('Подтверждение продажи') }}
	        </div>

	        
	      </div>
	      <div class="getting-started-example-styled__etc">
		      <div class="basket_sum">
		      {{$t('Итого')}}:	{{countAllProductsPrice}}грн

		      </div>
		      <div class="custom_notification custom_notification_error" v-show="overlimited_product_types.length">
		      		<span v-if="overlimited_product_types.length == 1">{{$t('На складе недостаточно товара')}}: </span>
		      		<span v-else>{{$t('На складе недостаточно товаров')}}: </span>
		      		<span class="overlimited_items" v-for="item in overlimited_product_types">| {{item.name}} - {{Math.abs(item.overlimited_quantity_in_main_measure_type)}}{{item.main_measure_type_name}} | </span>
		  		</div>
	  		</div>

	      <div class="getting-started-example-styled__actions">

	      	<button @click="FixSale('_card')" :disabled="overlimited_product_types.length" class="btn btn-warning">
	          {{ $t('Оплачено картой') }}
	        </button>
	        <button @click="FixSale('_cash')" :disabled="overlimited_product_types.length" class="btn btn-success">
	          {{ $t('Оплачено') }}
	        </button>
	      </div>
	    </div>
	  </GDialog>
	

	<div class="dashboard_actions_row">
		<input @change="search" :placeholder="$t('Поиск товара')" type="text">
        <select @change="getByCategory" v-model="selected_category">
            <option value="">{{$t('Все категории')}}</option>
            <option v-for="category in categories" :value="category.id">{{category.name}}</option>
            <option value="without_category">{{$t('Без категорий')}}</option>
        </select>
		<button  :disabled="!(this.cards_for_sailing.length)" @click="openBasket" class="btn btn-success">
			{{$t('Перейти к товарам')}}
			<span class="counter_basket_circle"><span class="counter_basket">{{this.cards_for_sailing.length}}</span></span>

		</button>
	</div>

	<div class="cards">
		<div v-for="card in cards" class="card">
			<div class="card_img"  :style="{'background-image': `url(${card.photo})`}">
				<div class="card_img_href" :id="'card_img_href_'+card.id">
					<i class="fas " :class="selected_cards.includes(card.id) ? 'fa-trash' : 'fa-plus'"  @click="toggleClassForIcon(card)"></i>
				</div>
			</div>

			<div class="card_content" :class="selected_cards.includes(card.id) ? 'bc-lightgreen' : ' '">
				<div class="card_title tac">{{card.name}}</div>
				<div class="card_items" >
					<div class="card_item">
						<span>
							{{ $t('Цена') }}:
						</span>

						<span style="word-break: break-all; text-align: end;">
							{{card.price}}грн
						</span>
					</div>
				</div>
			</div>

			<div class="card_counter" :class="selected_cards.includes(card.id) ? 'bc-lightgreen' : ' '" v-if="selected_cards.includes(card.id)">
				<i @click="clickCounter(card, 'minus')" class="fas fa-minus"></i>
				<input type="text" disabled step="any" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1'); if(this.value == '') this.value = 1; " v-model="card.counter">
				<i @click="clickCounter(card, 'plus')" class="fas fa-plus"></i>
			</div>

			<div class="card_dropdown">
				<div class="card_dropdown_button" @click="toggleClassForDropdown(card.id)">

					<i class="fas fa-chevron-down" :class="selected_dropdown.includes(card.id) ? 'fa-chevron-up' : 'fa-chevron-down'" ></i>
					<span>{{$t('Состав')}}</span>

					<div v-show="selected_dropdown.includes(card.id)" class="card_dropdown_content">
						<div class="card_item" v-for="card_ingridient in card.product_types">
							<span>
								{{card_ingridient.name}}:
							</span>

							<span style="word-break: break-all; text-align: end;">
								{{card_ingridient.quantity_in_main_measure_type}}{{card_ingridient.main_measure_type.name}}
							</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div> -->

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
	</div>

	<div v-for="card in cards" class="basket_card">
		<div  class="basket_card_content">
			<div class="basket_card__photo_name">
				<img :src="card.sell_product.photo" class="basket_card__photo">
				<div class="basket_card__name">
					<div>{{$t('Комплект')}}:{{card.sell_product.name}}</div>
					<div>{{$t('Описание')}}:{{card.description}}</div>
				</div>
			</div>
			<div class="basket_card__price">
				<label for="price">{{ $t('Стоимость') }}:</label>
				<input type="number" min="1" name="price" v-model="card.amount">
			</div>
			<div class="basket_card__actions">
				<button class="btn btn-success" @click="FixSale(card)">{{$t('Подтвердить')}}</button>
				<button class="btn btn-danger" @click="openRemoveCardModal(card)"><i class="fas fa-trash"></i></button>
			</div>
		</div>
		<div class="basket_card_ingridients" v-if="card.sell_product.product_types">

			<div class="card_dropdown_button" @click="toggleClassForDropdownInBasket(card.id)">

				<i class="fas fa-chevron-down" :class="selected_dropdown_in_basket.includes(card.id) ? 'fa-chevron-up' : 'fa-chevron-down'" ></i>
				<span>{{$t('Состав')}}</span>


			</div>

			<div v-show="selected_dropdown_in_basket.includes(card.id)" class="card_dropdown_content">
				<div class="card_item" v-for="card_ingridient in card.sell_product.product_types">
					<span>
						{{card_ingridient.name}}:
					</span>

					<span style="word-break: break-all; text-align: end;">
						<input  :name="'ingridient_val_'+card_ingridient.id" type="number" v-model="card_ingridient.quantity_in_main_measure_type">
						{{card_ingridient.main_measure_type.name}}
					</span>
				</div>
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

        	FixSale(card) {
        		this.emitter.emit("isLoading", true);

        		let sell_product = []
 
    			card.sell_product.sell_product_id = card.sell_product.id
    			card.sell_product.amount = card.amount
    			card.sell_product.product_types.forEach(elem => {
    				elem.quantity = elem.quantity_in_main_measure_type * elem.main_measure_type.quantity
    			})

    			sell_product.push(card.sell_product)


        		let sale_data = {
        			'shop_id': 1,
        			'transaction_type' : '_in',
        			'payment_type' : card.payment_type,
        			'amount': card.amount,
        			'operator_id' : 1,
        			'sell_products' : sell_product
        		}

        		this.axios.post('/api/cashbox/mass_create', sale_data).then((response) => {
        			
        			this.axios.post(`api/external_sales/${card.id}/confirm`).then((res) => {
	        				this.$notify({
	        				text: this.$t('Успешно!'),
	        				type: 'success',
        				});
	        			this.render_list_items(true)
        			}).catch(error => {
				          this.$notify({
				            text: this.$t('Ошибка при подтверждении!'),
				            type: 'error',
				          });
				          this.emitter.emit("isLoading", false);
				      })
        		}).catch(error => {
			          this.$notify({
			            text: this.$t('Ошибка при добавлении записи в кассу!'),
			            type: 'error',
			          });
			          this.emitter.emit("isLoading", false);
			      })
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