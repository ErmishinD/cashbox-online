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

      <div style="display: flex;">
        <button class="btn btn-primary mb-10 mr-10" >{{ $t('Инкассация') }}</button>
        <button class="btn btn-info mb-10" >{{ $t('Архив инкассаций') }}</button>
        <button @click="addOperation" class="btn btn-success mar-left mb-10" >{{ $t('Добавить операцию') }}</button>
      </div>
      

  	
    <vue-good-table style="position: static; "
      v-on:select-all="selectAll"
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
        >
      <template #table-row="props">
          <span v-if="props.column.field == 'sell_product_name'">{{props.row.sell_product ? props.row.sell_product.name : (props.row.product_purchase ? props.row.product_purchase.product_type.name : '')}}</span>
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <!-- <router-link :to="{name: 'products_for_sale_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link :to="{name: 'products_for_sale_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link> -->
            <a @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
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
      del_modal_show: false,
      add_modal_show: false,
      current_id: null,
      shop_list: null,
      formData: {},
      balance: null,
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
    };
  },
  mounted(){
  	this.render_list_items()
    this.axios.post('/api/shops/get_by_company', {company_id: this.$companyId}).then((response) => {
      this.shop_list = response.data.data
      console.log(this.shop_list)
    })
  	document.title = this.$t('Товары на продажу');
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
  			this.del_modal_show = false
  		});

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
    selectAll(params){
      console.log(params)
    },

  	render_list_items: function(){
  		var loader = this.$loading.show({
  		        canCancel: false,
  		        loader: 'dots',});
  		
  		this.axios.get('/api/cashbox').then((response) => {
  		       this.products = response.data['data']
  		       this.rows = this.products
  		       loader.hide()

  		     }).catch(function(error){
  		     	if(error.response.status == 403){
  		     		window.location.href = '/403';
  		     	}
  		     })
  	},
  },
};
</script>