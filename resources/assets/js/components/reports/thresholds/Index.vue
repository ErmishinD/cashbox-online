<template>

  <div>

    <div class="">
      {{$t('Кол-во заканчивающихся товаров')}}:
      <span v-for="storage in all_products_thresholds">&nbsp;{{storage.name}} - {{storage.below_threshold_count}} |</span>
    </div>
    <div class="tac content_title">
      <span>{{$t('Текущий склад')}}:</span>
      <select class="form-control" style="margin-left: 5px;" @change="changeStorage" v-model="current_storage">
        <option v-for="storage in storages" :value="storage.id">{{storage.name}}</option>
      </select>
      <button v-if="this.$can('ProductPurchase_create')" @click="goToPurchases" class="btn btn-success mar-left" >{{ $t('Перейти к закупкам') }}</button>
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
      v-on:column-filter="onColumnFilter"
      :line-numbers="true">
      <template #table-row="props">
        
         

          <span v-if="props.column.field == 'quantity'">{{props.row.current_quantity}}{{props.row.main_measure_type.name}}</span>
        </template>
    </vue-good-table>
  </div>
</template>



<script>

export default {
  data(){
    return {
      all_products_thresholds: null,
      products_thresholds: null,
      current_storage:'',
      storages: '',
      all_checked: false,
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Кол-во на складе'),
          field: 'quantity',
        },
        

      ],
      rows: [],
    };
  },
  watch:{
    current_storage(){
      this.loadItems()
    }
  },
  mounted(){
    this.emitter.emit("isLoading", true);
    this.axios.get('/api/reports/warning_threshold').then((response) => {
        this.all_products_thresholds = response.data['data']
    })

    this.axios.post('/api/get_for_select/', {entities: ['Storage']}).then(response => {
      this.storages = response.data.Storage
      this.current_storage = this.storages[0].id
    })

  	document.title = this.$t('Предупреждения');

  },
  methods:{
      // load items is what brings back the rows from server
      loadItems() {
          this.emitter.emit("isLoading", true);
          this.axios.get(`/api/reports/warning_threshold/${this.current_storage}`).then((response) => {
              this.products_thresholds = response.data['data']
              this.rows = this.products_thresholds
              this.emitter.emit("isLoading", false);

          })
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
      this.$router.push({ name: 'purchases_create', params: {products_from_thresholds: selected_rows, storage_id: this.current_storage}})
    },
  },
};
</script>