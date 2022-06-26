<template>
  <div class="tac content_title">
    {{$t('Прибыль по магазинам')}}
  </div>
  <Datepicker class="datepicker" v-model="date" range multiCalendars :format="format"  @update:modelValue="handleInternal"></Datepicker>

  <div class="tac content_title">
    {{$t('Суммарная прибыль')}}: {{sum_data.sum_profit}}
  </div>

  <div v-for="shop in data">
    <div class="tac content_title">
      {{shop.name}}
    </div>
    <div class="row-btw">
      <span>{{$t('Доходы')}}: {{shop.sum_amount}}</span>
      <span>{{$t('Расходы')}}: {{shop.sum_self_cost}}</span>
      <span>{{$t('Прибыль')}}: {{shop.sum_profit}}</span>
    </div>
  </div>

</template>



<script>

  import Datepicker from '@vuepic/vue-datepicker';
  import '@vuepic/vue-datepicker/dist/main.css'

export default {
  components: { Datepicker },
  data(){
    return {
      date:'',
      data: '',
      sum_data: ''
    };
  },
  watch:{

  },
  mounted(){
    this.getDataByDate()
    

  	document.title = this.$t('Прибыль');

  },
  methods:{
      getDataByDate(startDate, endDate){
        this.emitter.emit("isLoading", true);
        this.axios.get('/api/reports/profit', {params: {start_date: startDate, end_date:endDate}}).then((response) => {
            this.data = response.data['data']
            this.sum_data = response.data['sum_data']
            this.emitter.emit("isLoading", false);
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