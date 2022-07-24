<template>
  <div class="tac content_title">
    {{$t('Прибыль по магазинам')}}
  </div>
  <Datepicker class="datepicker" v-model="date" range multiCalendars :format="format"  @update:modelValue="handleInternal"></Datepicker>

   <div class="tac content_title">
    {{$t('Суммарная прибыль')}}: {{sum_data.sum_profit}}
    <i v-bind:class="is_common_data_hidden ? 'fa-plus' : 'fa-minus'" @click="is_common_data_hidden = !is_common_data_hidden" class="fas toggle_icon"></i>
    </div>
    <div v-show="!is_common_data_hidden">
      <vue-good-table style="position: static;"
          :columns="common_data_columns"
          :rows="common_data_rows"
          :line-numbers="true">
          <template #table-row="props">
            <span  v-if="props.column.field == 'name'">
              <router-link class="redirect_from_table" v-if="$can('Shop_show')" :to="{name: 'shops_show', params: {id: props.row.id}}">{{props.row.name}}</router-link>
              <span v-else="">{{props.row.name}}</span>
            </span>
          </template>
        </vue-good-table>
    </div>




  <div class="tac content_title" style="    display: flex;
    justify-content: center;
    align-items: center;">
    <label for="">{{$t('Магазин')}}:</label>
    <select class="form-control" name="" id="" v-model="current_shop">
      <option value="">{{$t('Все')}}</option>
      <option v-for="shop in shops" :value="shop.id">{{shop.name}}</option>
    </select>
  </div>

  <div style="display: flex; justify-content:space-around;">
    <div><div class="tac content_title">{{$t('Доходы')}}</div><LineChart :chartData="amountData" :options="options" /></div>
    <div><div class="tac content_title">{{$t('Расходы')}}</div><LineChart :chartData="expenseData" :options="options" /></div>
    <div><div class="tac content_title">{{$t('Прибыль')}}</div><LineChart :chartData="profitData" :options="options" /></div>
  </div>

  <div class="tac content_title">
    {{$t('Прибыль по категориям')}}
  </div>

  <BarChart :chartData="profitDataByCategory" :options="categoryOptions" />

  <div class="tac content_title">
    {{$t('Популярность продаваемых товаров')}}
  </div>

  <PieChart :chartData="popularProductsData" :options="popularProductsOptions" />

  <div class="tac content_title">
    {{$t('Доля продажи товара по категориям')}}
  </div>

  <div class="tac content_title" style="    display: flex;
    justify-content: center;
    align-items: center;">
    <label for="">{{$t('Товар')}}:</label>
    <select class="form-control" name="" id="" v-model="current_product_type">
      <option v-for="product_type in product_types" :value="product_type.id">{{product_type.name}}</option>
    </select>
  </div>

  <PieChart v-show="productConsumptionData.labels?.length" style="width: 400px;" class="mar-inl-auto" :chartData="productConsumptionData" :options="productConsumptionOptions" />

  <div v-show="!productConsumptionData.labels?.length" class="tac content_title" style="opacity: 0.5;">
    {{$t('Нет данных')}}!
  </div>

  <div class="tac content_title">
    {{$t('Все операции в кассе')}}
  </div>

  <vue-good-table style="position: static;"
      mode="remote"
      v-on:page-change="onPageChange"
      v-on:sort-change="onSortChange"
      v-on:column-filter="onColumnFilter"
      v-on:per-page-change="onPerPageChange"
      :totalRows="totalRecords"
      :isLoading.sync="isLoading"
      :pagination-options="{
        enabled: true,
      }"
      :columns="transaction_columns"
      :rows="transaction_rows"
      :line-numbers="true">
      <template #table-row="props">
        <span  v-if="props.column.field == 'sell_product.name'">
          <router-link class="redirect_from_table" v-if="$can('SellProduct_show')" :to="{name: 'products_for_sale_show', params: {id: props.row.sell_product?.id}}">{{props.row.sell_product?.name}}</router-link>
          <span v-else="">{{props.row.sell_product?.name}}</span>
        </span>
        <span  v-if="props.column.field == 'operator.name'">
          <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: props.row?.operator.id}}">{{props.row.operator?.name}}</router-link>
          <span v-else="">{{props.row.operator?.name}}</span>
        </span>
        </template>
    </vue-good-table>


</template>





<script>

  import Datepicker from '@vuepic/vue-datepicker';
  import '@vuepic/vue-datepicker/dist/main.css'

  import { LineChart } from 'vue-chart-3';
  import { BarChart } from 'vue-chart-3';
  import { PieChart } from 'vue-chart-3';
  import { Chart, ChartData, ChartOptions, registerables } from "chart.js";

  Chart.register(...registerables);

export default {
  components: { Datepicker,
  LineChart, BarChart, PieChart },
  data(){
    return {
      date:'',
      data: '',
      common_data: '',
      current_shop: '',
      shops: '',
      chartData: '',
      options: '',
      amountData: '',
      expenseData: '',
      profitData: '',
      profitDataByCategory: '',
      categoryOptions: '',
      sum_data: 0,
      is_common_data_hidden: true,
      popularProductsData: '',
      popularProductsOptions: '',
      totalRecords: 0,
      serverParams: {
        columnFilters: {
        },
        sort: {
            field: '',
            type: '',
        },
        page: 1,
        perPage: 10
      },
      start_date: '',
      end_date: '',
      transaction_columns: [
        {
          label: this.$t('Название товара'),
          field: 'sell_product.name',
          // filterOptions: {
          //   enabled: true, // enable filter for this column
          //   placeholder: this.$t('Фильтрация'), // placeholder for filter input
          //   trigger: 'enter', //only trigger on enter not on keyup
          // },
        },
        {
          label: this.$t('Сумма продажи'),
          field: 'amount',
          // filterOptions: {
          //     enabled: true,
          //     placeholder: this.$t('Фильтрация'),
          //     filterDropdownItems: [this.$t('Портящийся'), this.$t('Непортящийся')],
          // },
        },
        {
          label: this.$t('Себестоимость'),
          field: 'self_cost',
          // filterOptions: {
          //     enabled: true,
          //     placeholder: this.$t('Фильтрация'),
          //     filterDropdownItems: [this.$t('Портящийся'), this.$t('Непортящийся')],
          // },
        },
        {
          label: this.$t('Прибыль'),
          field: 'profit',
          // filterOptions: {
          //     enabled: true,
          //     placeholder: this.$t('Фильтрация'),
          //     filterDropdownItems: [this.$t('Портящийся'), this.$t('Непортящийся')],
          // },
        },

        {
          label: this.$t('Дата продажи'),
          field: 'created_at',
          // filterOptions: {
          //     enabled: true,
          //     placeholder: this.$t('Фильтрация'),
          //     filterDropdownItems: [this.$t('Портящийся'), this.$t('Непортящийся')],
          // },
        },

        {
          label: this.$t('Продавец'),
          field: 'operator.name',
          // filterOptions: {
          //     enabled: true,
          //     placeholder: this.$t('Фильтрация'),
          //     filterDropdownItems: [this.$t('Портящийся'), this.$t('Непортящийся')],
          // },
        },

        // {
        //   label: this.$t('Действия'),
        //   field: 'actions',
        //   sortable: false,
        //   width: '65px',
        // },
      ],
      transaction_rows: [],
      common_data_columns:[
        {
          label: this.$t('Магазин'),
          field: 'name',
        },
        {
          label: this.$t('Доходы'),
          field: 'sum_amount',
        },
        {
          label: this.$t('Доходы картой'),
          field: 'sum_amount_card',
        },
        {
          label: this.$t('Доходы наличными'),
          field: 'sum_amount_cash',
        },
        {
          label: this.$t('Расходы'),
          field: 'sum_self_cost',
        },
        {
          label: this.$t('Прибыль'),
          field: 'sum_profit',
        },
      ],
      common_data_rows: [],
      product_types: '',
      current_product_type: '',
      productConsumptionData: '',
      productConsumptionOptions: '',
    };
  },
  watch:{
    current_shop:{
      handler(){
        this.getDataByDate()
      },
      deep: true
    },
    current_product_type:{
      handler(){
        this.getProductConsumptions()
      }
    }
  },
  mounted(){

    this.getDataByDate()

    this.axios.post('/api/get_for_select/', {entities: ['Shop', 'ProductType']}).then(response => {
      this.shops = response.data.Shop
      this.product_types = response.data.ProductType
      this.current_product_type = this.product_types[0].id
    })


      document.title = this.$t('Прибыль');

  },
  methods: {
      getDataByDate(startDate, endDate) {
          this.emitter.emit("isLoading", true);

          let start_date = startDate ? startDate : this.start_date
          let end_date = endDate ? endDate : this.end_date

          this.axios.get('/api/reports/profit', {
              params: {
                  start_date: start_date,
                  end_date: end_date,
                  shop_id: this.current_shop
              }
          }).then((response) => {
              this.common_data_rows = response.data['data']
              this.sum_data = response.data['sum_data']
          })
          this.axios.get(`/api/reports/profit_by_day/`, {
              params: {
                  start_date: start_date,
                  end_date: end_date,
                  shop_id: this.current_shop
              }
          }).then((response) => {
              Promise.resolve(this.data = response.data['data']).then(() => {
                  this.amountData = {
                      labels: this.data.date_list,
                      datasets: [
                          {
                              label: this.$t('Доходы'),
                              data: this.data.amount_list,
                              fill: true,
                              borderColor: "#ffc107",
                          },

                      ],
                  }

                  this.expenseData = {
                      labels: this.data.date_list,
                      datasets: [
                          {
                              label: this.$t('Расходы'),
                              data: this.data.self_cost_list,
                              fill: true,
                              borderColor: "#dc3545",
                  },

                      ],
              }

              this.profitData = {
                labels: this.data.date_list,
                datasets: [
                  {
                    label: this.$t('Прибыль'),
                    data: this.data.profit_list,
                    fill: true,
                    borderColor: "#198754",
                  },


                ],
              }


                  this.options = {
                      plugins: {
                          legend: {
                              display: false,
                          },
                      },
                  }
              })


          })

          this.axios.get('/api/reports/profit_by_category/', {
              params: {
                  start_date: start_date,
                  end_date: end_date,
                  shop_id: this.current_shop
              }
          }).then((response) => {
              let category_data
              Promise.resolve(category_data = response.data['data']).then(() => {
                  this.profitDataByCategory = {
                      labels: category_data.categories_list,
                      datasets: [
                          {
                              data: category_data.profit_list,
                              backgroundColor: ['#77CEFF', '#0079AF', '#123E6B', '#97B0C4', '#A5C8ED'],
                          },

                      ],
                  }

                  this.categoryOptions = {
                      plugins: {
                          legend: {
                              display: false,
                          },
                      },
                  }

              })
          })

          this.axios.get('/api/reports/popular_sell_products/', {
              params: {
                  start_date: start_date,
                  end_date: end_date,
                  shop_id: this.current_shop
              }
          }).then((response) => {
              let popular_products_data
              Promise.resolve(popular_products_data = response.data['data']).then(() => {
                  this.popularProductsData = {
                      labels: popular_products_data.sell_products_list,
                      datasets: [
                          {
                              data: popular_products_data.count_list,
                              backgroundColor: ['#77CEFF', '#0079AF', '#123E6B', '#97B0C4', '#A5C8ED'],
                          },

                      ],
                  }

                  this.popularProductsOptions = {
                      plugins: {
                          legend: {
                              position: 'bottom'
                          },
                      },
                  }


              })
        })

        this.getProductConsumptions()

        this.getTransactions()
      },
     format(date){
      let startDate = date[0]
      let endDate = date[1]
      if(startDate && endDate){
        startDate = this.getFormatDate(startDate)
        endDate = this.getFormatDate(endDate)
        console.log(`${startDate} - ${endDate}`)
        return `${startDate} - ${endDate}`
      }
      else{

      }

     },
     getFormatDate(date){
      const day = date.getDate();
      const month = date.getMonth() + 1;
      const year = date.getFullYear();
      return `${day}-${month}-${year}`
     },
     getTransactions(){
      this.emitter.emit("isLoading", true);
        this.axios.post('/api/reports/get_paginated_transactions', {...this.serverParams, start_date:this.start_date, end_date:this.end_date, shop_id: this.current_shop}).then(res => {
          this.transaction_rows = res.data.pagination.data
          this.totalRecords = res.data['pagination']['total'];
          this.emitter.emit("isLoading", false);
        })
     },
     handleInternal(date){
      this.serverParams.page = 1
      if(date){
        let startDate = date[0]
        let endDate = date[1]
        if(startDate && endDate){

          startDate = this.getFormatDate(startDate)
          this.start_date = startDate
          endDate = this.getFormatDate(endDate)
          this.end_date = endDate

          this.getDataByDate(startDate, endDate)
        }
        else{
          this.$notify({
              text: this.$t('Выберите дату начала и дату конца!'),
              type: 'error',
            });
        }
      }
      else{
        this.start_date = ''
        this.end_date = ''
        this.getDataByDate()
      }


     },
     updateParams(newProps) {
        console.log(newProps)
          this.serverParams = Object.assign({}, this.serverParams, newProps);
      },

      onPageChange(params) {
          this.updateParams({page: params.currentPage});
          this.getTransactions();
      },

      onPerPageChange(params) {
          this.updateParams({perPage: params.currentPerPage, page: 1});
          this.getTransactions();
      },

      onSortChange(params) {
        let data = Object.assign({}, params)[0]


          this.updateParams({
              sort: [{
                  type: data.type,
                  field: data.field,
              }],
              page: 1
          });
          this.getTransactions();
      },

      onColumnFilter(params) {
        console.log(params.columnFilters.type)
        if(params.columnFilters.type == this.$t('Портящийся')){
          params.columnFilters.type = '_perishable'
        }
        else if(params.columnFilters.type == this.$t('Непортящийся')){
          params.columnFilters.type = '_imperishable'
        }
          this.updateParams(params);
          this.getTransactions();
      },

      getProductConsumptions(){
        this.emitter.emit("isLoading", true);
        this.axios.get(`/api/reports/product_consumptions_by_category/${this.current_product_type}`, {params: {start_date:this.start_date, end_date:this.end_date, shop_id: this.current_shop}}).then(response => {
          let consumption_product_data
          Promise.resolve(consumption_product_data = response.data['data']).then(() => {
            if(!consumption_product_data){
              consumption_product_data = {}
              consumption_product_data.categories_list = []
              consumption_product_data.values_list = []
            }
            this.productConsumptionData = {
              labels: consumption_product_data.categories_list,
                datasets: [
                  {
                    data: consumption_product_data.values_list,
                    backgroundColor: ['#77CEFF', '#0079AF', '#123E6B', '#97B0C4', '#A5C8ED'],
                  },

                ],
            }

            this.productConsumptionOptions = {
                plugins: {
                  legend: {
                    position: 'bottom'
                  },
                },
              }


          })
          this.emitter.emit("isLoading", false);
        })
      }
  },
};
</script>

<style scoped>
  .datepicker{
    width: 300px;
    margin-inline: auto;
  }
</style>
