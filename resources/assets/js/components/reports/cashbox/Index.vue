<template>
  <notifications position="bottom right" />
  <div>
  	<GDialog style="z-index: 9999;" :persistent="false" v-model="del_modal_show" max-width="500">
  	    <div class="getting-started-example-styled">
  	      <div class="getting-started-example-styled__content">
  	        <div class="getting-started-example-styled__title">
  	          {{ $t('Внимание') }}!
  	        </div>

  	        <p>{{ $t('Вы уверены, что хотите удалить эту запись?') }}</p>
  	      </div>

  	      <div class="getting-started-example-styled__actions">
  	        <button @click="delProduct" class="btn btn-danger">
  	          {{ $t('Удалить') }}
  	        </button>
  	      </div>
  	    </div>
  	  </GDialog>

      <GDialog style="z-index: 9999;" :persistent="false" v-model="add_modal_show" max-width="500">
          <div class="getting-started-example-styled">
            <form class="" @submit="create_operation">
            <div class="getting-started-example-styled__content">
              <div class="getting-started-example-styled__title">
                {{ $t('Добавить операцию') }}
              </div>

              <div class="form_content">
                <div class="form_item">
                  <label class="tal" for="transaction_type">{{ $t('Тип транзакции') }}*:</label>
                  <select name="transaction_type" class="form-control" required v-model="formData.transaction_type">
                    <option value="_in">{{$t('Поступление')}}</option>
                    <option value="_out"> {{$t('Расход')}}</option>
                  </select>
                </div>
                <div class="form_item">
                  <label class="tal" for="payment_type">{{ $t('Тип оплаты') }}*:</label>
                  <select name="payment_type" class="form-control" required v-model="formData.payment_type">
                    <option value="_cash">{{$t('Наличные')}}</option>
                    <option value="_card"> {{$t('Карта')}}</option>
                  </select>
                </div>
                <div class="form_item">
                  <label class="tal" for="shop_id">{{ $t('Магазин') }}*:</label>
                  <select name="shop_id" class="form-control" required v-model="formData.shop_id">
                    <option v-for="shop in shop_list" :value="shop.id">{{shop.name}}</option>
                  </select>
                </div>
                <div class="form_item">
                  <label class="tal" for="amount">{{ $t('Сумма') }}*:</label>
                  <input type="number" required class="form-control" name="amount" v-model="formData.amount">
                </div>
                <div class="form_item">
                  <label class="tal" for="description">{{ $t('Описание') }}:</label>
                  <input type="text" class="form-control" name="description" v-model="formData.description">
                </div>
              </div>
            </div>

            <div class="getting-started-example-styled__actions">
              <button type="submit" class="btn btn-success">
                {{ $t('Сохранить') }}
              </button>
            </div>
          </form>
          </div>
        </GDialog>

      <div style="display: flex; flex-wrap: wrap;">
        <button v-if="this.$can('Cashbox_collect')" :disabled="!(this.collection_ids.length)" @click="makeCollection" class="btn btn-primary mb-10 mr-10" >{{ $t('Инкассация') }}</button>
        <router-link v-if="this.$can('Cashbox_history')" :to='{name: "reports_casbox_collections"}'><button class="btn btn-info mb-10" >{{ $t('Архив инкассаций') }}</button></router-link>
        <button v-if="this.$can('Cashbox_create')" @click="addOperation" class="btn btn-success mar-left mb-10" >{{ $t('Добавить операцию') }}</button>
      </div>

      <div class="detail">
        <div class="detail__title">{{$t('Баланс')}}</div>
        <div class="detail__conent">
          <div class="detail__content_item">
            <div class="content__item_title">{{$t('Поступление')}}</div>
            <div class="content__item_row">
              <div class="item__row_item">
                {{$t('Наличные')}}: {{balance.income.cash}}грн
              </div>
              <div class="item__row_item">
                {{$t('Карта')}}: {{balance.income.card}}грн
              </div>
              <div class="item__row_item">
                {{$t('Всего')}}: {{parseFloat(parseFloat(balance.income.cash) + parseFloat(balance.income.card)).toFixed(2)}}грн
              </div>
            </div>
          </div>
          <div class="detail__content_item">
            <div class="content__item_title">{{$t('Расход')}}</div>
            <div class="content__item_row">
              <div class="item__row_item">
                {{$t('Наличные')}}: {{balance.outcome.cash}}грн
              </div>
              <div class="item__row_item">
                {{$t('Карта')}}: {{balance.outcome.card}}грн
              </div>
              <div class="item__row_item">
                {{$t('Всего')}}: {{parseFloat(parseFloat(balance.outcome.cash) + parseFloat(balance.outcome.card)).toFixed(2)}}грн
              </div>
            </div>
          </div>
          <div class="detail__content_item">
            <div class="content__item_title">{{$t('Всего')}}</div>
            <div class="content__item_row">
              <div class="item__row_item">
                {{$t('Наличные')}}: {{balance.sum.cash}}грн
              </div>
              <div class="item__row_item">
                {{$t('Карта')}}: {{balance.sum.card}}грн
              </div>
              <div class="item__row_item">
                {{$t('Всего')}}: {{parseFloat(parseFloat(balance.sum.cash) + parseFloat(balance.sum.card)).toFixed(2)}}грн
              </div>
            </div>
          </div>
        </div>
      </div>

    <vue-good-table style="position: static; "
      v-on:select-all="selectAll"
      v-on:column-filter="onColumnFilter"
      :columns="columns"
      :rows="rows"
      :select-options="{
        enabled: true,
        selectOnCheckboxOnly: true,
        disableSelectInfo: true,
      }"
       :search-options="{ enabled: true }"
      :pagination-options="{
          enabled: true,
          mode: 'records',
          perPage: 20,
          position: 'top',
          dropdownAllowAll: true,
          setCurrentPage: 1,
          nextLabel: $t('Вперед'),
          prevLabel: $t('Назад'),
          rowsPerPageLabel: $t('Записей на одной странице'),
          ofLabel: $t('из'),
          pageLabel: 'page', // for 'pages' mode
          allLabel: 'All',
        }"
        v-on:selected-rows-change="selectionChanged"
        v-on:row-click="rowClick"
        >
      <template #table-row="props">
          <span v-if="props.column.field == 'operator.name'">
            <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: props.row.operator.id}}">{{props.row.operator.name}}
            </router-link>
            <span v-else>{{props.row.operator.name}}</span>
          </span>

          <span v-if="props.column.field == 'transaction_type'" v-bind:style="[props.row.transaction_type == '_in' ? {color: 'green'} : {color: 'red'}]">{{props.row.transaction_type == '_in' ? this.$t('поступление') : this.$t('расход')}}</span>

          <span v-if="props.column.field == 'payment_type'">{{props.row.payment_type == '_card' ? this.$t('карта') : this.$t('наличные')}}</span>

          <span  v-if="props.column.field == 'sell_product_name'">
            <router-link class="redirect_from_table" v-if="$can('SellProduct_show') && props.row.sell_product" :to="{name: 'products_for_sale_show', params: {id: props.row.sell_product.id}}">{{props.row.sell_product.name}}
            </router-link>
            <router-link class="redirect_from_table" v-else-if="$can('ProductType_show') && props.row.product_purchase" :to="{name: 'products_type_show', params: {id: props.row.product_purchase.product_type.id}}">{{props.row.product_purchase.product_type.name}}
            </router-link>
            <span v-else>{{props.row.sell_product ? props.row.sell_product.name : (props.row.product_purchase ? props.row.product_purchase.product_type.name : '')}}</span>
          </span>

          <span v-if="props.column.field == 'shop.name'">
            <router-link class="redirect_from_table" v-if="$can('Shop_show')" :to="{name: 'shops_show', params: {id: props.row.shop.id}}">{{props.row.shop.name}}
            </router-link>
            <span v-else>{{props.row.shop.name}}</span>
          </span>

          <span class="table_actions" v-if="props.column.field == 'actions'">
            <!-- <router-link :to="{name: 'products_for_sale_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link :to="{name: 'products_for_sale_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link> -->
            <a v-if="this.$can('Cashbox_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
          </span>
        </template>
    </vue-good-table>
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
    return {
      products: null,
      operators: [],
      del_modal_show: false,
      add_modal_show: false,
      current_id: null,
      shop_list: null,
      formData: {},
      collection_ids: {},
      balance: {
        income: {
          cash: 0,
          card: 0,
        },
        outcome: {
          cash: 0,
          card: 0,
        },
        sum: {
          cash: 0,
          card: 0,
        }
      },
      columns: [
        {
          label: this.$t('Тип транзакции'),
          field: 'transaction_type',
        },
        {
          label: this.$t('Сумма'),
          field: 'amount',
        },
        {
          label: this.$t('Оператор'),
          field: 'operator.name',
          filterOptions: {
              enabled: true,
              placeholder: this.$t('Выбрать оператора'),
              filterDropdownItems: [],
          },
        },
        {
          label: this.$t('Тип оплаты'),
          field: 'payment_type',
        },
        {
          label: this.$t('Продукт'),
          field: 'sell_product_name',
        },
        {
          label: this.$t('Магазин'),
          field: 'shop.name',
        },
        {
          label: this.$t('Создано'),
          field: 'created_at',
        },
        {
          label: this.$t('Действия'),
          field: 'actions',
          sortable: false,
          width: '65px',
        },
      ],
      rows: [],
      all_checked: true
    };
  },
  mounted(){
  	this.render_list_items()
    this.axios.post('/api/shops/get_by_company', {company_id: this.$companyId}).then((response) => {
      this.shop_list = response.data.data
      console.log(this.shop_list)
    })
  	document.title = this.$t('Инкассация');
  },
  methods:{
  	onOpen(params){
  		this.del_modal_show = true
  		this.current_id = params.id
  		console.log(params)
  	},
  	delProduct(){
  		this.axios.delete(`/api/cashbox/${this.current_id}`, {

  		}).then((response) => {
        this.$notify({
                text: this.$t('Успешно!'),
                type: 'success',
              })
  			this.render_list_items()
  		}).catch(error => {
        if(error.response.status == 409){
          this.$notify({
            text: this.$t('Ошибка при удалении!'),
            type: 'error',
          });
          
        }
      }).finally((result) => {
        this.del_modal_show = false
      })

  	},
    addOperation(){
      this.add_modal_show = true
    },
    create_operation(e){
      e.preventDefault()
      console.log(this.formData)
      this.axios.post('/api/cashbox', this.formData ).then((response) => {
        this.$notify({
          text: this.$t('Успешно!'),
          type: 'success',
        })
        this.add_modal_show = false
        this.formData = {}
        this.render_list_items()
      })
    },
    selectionChanged(props) {
      // console.log(props)
    },
    rowClick(props) {
      console.log(props.row.vgtSelected)
      if(props.selected == false){
        this.all_checked = false
      }
      // props.row.vgtSelected = props.selected
      this.rows.find(item => item.id == props.row.id).vgtSelected = props.selected
      this.countBalance()
    },
    selectAll(props){
        this.all_checked = !this.all_checked
        console.log(this.all_checked)
        Promise.resolve(this.rows.forEach(item => {
            item.vgtSelected = this.all_checked
        },this)).then(result => {
          this.countBalance()
        })
        
        
    },
    countBalance() {
      this.balance.income.cash = 0
      this.balance.income.card = 0
      this.balance.outcome.cash = 0
      this.balance.outcome.card = 0
      this.collection_ids = []
      this.rows.forEach(item => {
        if(item.vgtSelected == true){
          if(item.transaction_type == '_in'){
            if(item.payment_type == '_cash'){
              this.balance.income.cash = parseFloat(parseFloat(this.balance.income.cash) + parseFloat(item.amount)).toFixed(2)
            }
            else{
              this.balance.income.card = parseFloat(parseFloat(this.balance.income.card) + parseFloat(item.amount)).toFixed(2)
            }
          }
          else{
            if(item.payment_type == '_cash'){
              this.balance.outcome.cash = parseFloat(parseFloat(this.balance.outcome.cash) + parseFloat(item.amount)).toFixed(2)
            }
            else{
              this.balance.outcome.card = parseFloat(parseFloat(this.balance.outcome.card) + parseFloat(item.amount)).toFixed(2)
            }
          }
          this.collection_ids.push(item.id)
        }
      },this);
      console.log(this.rows)
      this.balance.sum.cash = parseFloat(parseFloat(this.balance.income.cash) - parseFloat(this.balance.outcome.cash)).toFixed(2)
      this.balance.sum.card = parseFloat(parseFloat(this.balance.income.card) - parseFloat(this.balance.outcome.card)).toFixed(2)
    },
    onColumnFilter(params){
      let selected_name = params.columnFilters['operator.name']
      if(selected_name){
        this.rows.forEach(item => {
          if(item.operator.name == selected_name){
            item.vgtSelected = true
          }
          else{
            item.vgtSelected = false
          }
        })
      }
      else{
        this.rows.forEach(item => {
            item.vgtSelected = true
        })
      }
      this.countBalance()
    },
    makeCollection(){
      this.axios.post('/api/cashbox/collect', {ids : this.collection_ids}).then((response) => {
        this.$notify({
          text: this.$t('Успешно!'),
          type: 'success',
        })
        this.collection_ids = {}
        this.balance.income.cash = 0
        this.balance.income.card = 0
        this.balance.outcome.cash = 0
        this.balance.outcome.card = 0
        this.balance.sum.cash = 0
        this.balance.sum.card = 0
        this.render_list_items()
      })
    },
  	render_list_items: function(){
  		var loader = this.$loading.show({
  		        canCancel: false,
  		        loader: 'dots',});

  		this.axios.get('/api/cashbox').then((response) => {
  		       this.products = response.data['data']
             this.products.forEach(item => {
                if(!this.columns[2].filterOptions.filterDropdownItems.find(operator => operator == item.operator.name)){
                   this.columns[2].filterOptions.filterDropdownItems.push(item.operator.name)
                }
             })
             console.log(this.operators)
  		       this.rows = this.products
             this.rows.forEach(item => {
              item.vgtSelected = true
             })
             this.countBalance()
  		       loader.hide()

  		     }).catch(function(error){
            if(error.response.status == 403){
              loader.hide()
                this.$router.push({ name: '403' })
            }
        })
  	},
  },
};
</script>


<style scoped lang="scss">
  .detail{
    margin-inline: 0;
  }

  .detail__title {
    font-size: 30px;
  }

  .detail__content_item{
    padding-block: 5px;
    border-bottom: 1px solid #dadada;
  }

  .content__item_title{
    font-size: 22px;
    text-align: center;
    padding-bottom: 5px;
  }

  .content__item_row{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }
</style>