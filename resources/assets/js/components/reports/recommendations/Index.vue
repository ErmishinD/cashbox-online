<template>

  <div>
    <div class="tac content_title" style="display: flex;">
      <span style="margin-inline:auto;">{{$t('Рекомендации для закупок')}}</span>
      <button v-if="this.$can('ProductPurchase_create')" @click="goToPurchases" class="btn pos-ab btn-success mar-left" >{{ $t('Перейти к закупкам') }}</button>
    </div>

    <div class="tac content_title">
      <span>{{$t('Период анализа')}}:</span>
      <Datepicker class="datepicker" v-model="date" range multiCalendars :format="format"  @update:modelValue="handleInternal"></Datepicker>
    </div>

    <div class="tac content_title">
      <span>{{$t('Магазин')}}:</span>
      <select class="form-control" style="margin-left: 5px;" @change="changeStorage" v-model="current_shop">
        <option value="">{{$t('Все магазины')}}</option>
        <option v-for="shop in shops" :value="shop.id">{{shop.name}}</option>
      </select>
    </div>
    <vue-good-table style="position: static;"
      
      :columns="columns"
      :rows="rows"
      :pagination-options="{
        enabled: true,
      }"
      :select-options="{
        enabled: true,
        selectOnCheckboxOnly: true,
        disableSelectInfo: true,
      }"
      v-on:row-click="rowClick"
      v-on:select-all="selectAll"
      :line-numbers="true">
      <template #table-row="props">

        <span  v-if="props.column.field == 'name'">
          <router-link class="redirect_from_table" v-if="$can('ProductType_show')" :to="{name: 'products_type_show', params: {id: props.row.id}}">{{props.row.name}}</router-link>
          <span v-else="">{{props.row.name}}</span>
        </span>
        
         <span v-if="props.column.field == 'cashbox_sum_quantity'">
           {{props.row.cashbox_sum_quantity / props.row.main_measure_type.quantity}} {{props.row.main_measure_type.name}}
         </span>

         <span v-if="props.column.field == 'write_off_sum_quantity'">
           {{props.row.write_off_sum_quantity / props.row.main_measure_type.quantity}} {{props.row.main_measure_type.name}}
         </span>

          
        </template>
    </vue-good-table>
  </div>
</template>



<script>

  import Datepicker from '@vuepic/vue-datepicker';
  import '@vuepic/vue-datepicker/dist/main.css'

export default {
  components: { Datepicker,},
  data(){
    return {
      date:'',
      
      current_shop:'',
      shops: '',
      start_date: '',
      end_date: '',
      all_checked: false,
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Сумма продаж'),
          field: 'cashbox_sum_cost',
        },
        {
          label: this.$t('Кол-во продаж'),
          field: 'cashbox_sum_quantity',
        },

        {
          label: this.$t('Сумма списанных товаров'),
          field: 'write_off_sum_cost',
        },
        {
          label: this.$t('Кол-во списанных товаров'),
          field: 'write_off_sum_quantity',
        },
        

      ],
      rows: [],
    };
  },
  watch:{
    current_shop(){
      this.loadItems()
    }
  },
  mounted(){
    this.emitter.emit("isLoading", true);

    this.axios.post('/api/get_for_select/', {entities: ['Shop']}).then(response => {
      this.shops = response.data.Shop
    })

    this.loadItems()

  	document.title = this.$t('Рекомендации');

  },
  methods:{
      // load items is what brings back the rows from server
      loadItems() {
          this.emitter.emit("isLoading", true);
          this.axios.get(`/api/reports/purchase_recommendations/`, {params: {start_date: this.start_date, end_date: this.end_date, shop_id: this.current_shop}}).then((response) => {
              this.rows = response.data.data
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
          this.start_date = startDate
          endDate = this.getFormatDate(endDate)
          this.end_date = endDate

          this.loadItems()
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
        this.loadItems()
      }

      
     },

     rowClick(props) {
      console.log(props.row.vgtSelected)
      if(props.selected == false){
        this.all_checked = false
      }
      // props.row.vgtSelected = props.selected
      this.rows.find(item => item.id == props.row.id).vgtSelected = props.selected
      
    },
    selectAll(props){
        this.all_checked = !this.all_checked
        this.rows.forEach(item => {
            item.vgtSelected = this.all_checked
        })


    },

    goToPurchases(){
      let selected_rows = JSON.stringify(this.rows.filter(item => item.vgtSelected))
      this.$router.push({ name: 'purchases_create', params: {products_from_recommendations: selected_rows}})
    },
  },
};
</script>

<style scoped>
  .datepicker{
    width: 300px;
    display: inline-block;
    line-height: 0.7;
  }

  
</style>