<template>
  <div class="tac content_title">
    {{$t('Прибыль по магазинам')}}
  </div>
  <Datepicker class="datepicker" v-model="date" range multiCalendars :format="format"  @update:modelValue="handleInternal"></Datepicker>

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

  
 

 

</template>





<script>

  import Datepicker from '@vuepic/vue-datepicker';
  import '@vuepic/vue-datepicker/dist/main.css'

  import { LineChart } from 'vue-chart-3';
  import { BarChart } from 'vue-chart-3';
  import { Chart, ChartData, ChartOptions, registerables } from "chart.js";

  Chart.register(...registerables);

export default {
  components: { Datepicker,
  LineChart, BarChart },
  data(){
    return {
      date:'',
      data: '',
      current_shop: '',
      shops: '',
      chartData: '',
      options: '',
      amountData: '',
      expenseData: '',
      profitData: '',
      profitDataByCategory: '',
      categoryOptions: '',
    };
  },
  watch:{
    current_shop:{
      handler(){
        this.getDataByDate()
      },
      deep: true
    }
  },
  mounted(){
    this.axios.post('/api/get_for_select/', {entities: ['Shop']}).then(response => {
      this.shops = response.data.Shop
    })
    this.getDataByDate()
    

  	document.title = this.$t('Прибыль');

  },
  methods:{
      getDataByDate(startDate, endDate){
        this.emitter.emit("isLoading", true);
        this.axios.get(`/api/reports/profit_by_day/`, {params: {start_date: startDate, end_date:endDate, shop_id: this.current_shop}}).then((response) => {
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

        this.axios.get('/api/reports/profit_by_category/', {params: {start_date: startDate, end_date:endDate, shop_id: this.current_shop}}).then((response) => {
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
                    position: 'bottom'
                  },
                },
              }

            this.emitter.emit("isLoading", false);
          })
        })
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
     handleInternal(date){
      if(date){
        let startDate = date[0]
        let endDate = date[1]
        if(startDate && endDate){
          startDate = this.getFormatDate(startDate)
          endDate = this.getFormatDate(endDate)
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
        this.getDataByDate()
      }

      
     },
  },
};
</script>

<style scoped>
  .datepicker{
    width: 300px;
    margin-inline: auto;
  }
</style>