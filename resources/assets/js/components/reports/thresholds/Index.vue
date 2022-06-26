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
    </div>
    <vue-good-table style="position: static;"
      
      :columns="columns"
      :rows="rows"
      :pagination-options="{
        enabled: true,
      }"
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
  	render_list_items: function(){
  		this.loadItems()
  	},
      updateParams(newProps) {
        console.log(newProps)
          this.serverParams = Object.assign({}, this.serverParams, newProps);
      },

      onPageChange(params) {
          this.updateParams({page: params.currentPage});
          this.loadItems();
      },

      onPerPageChange(params) {
          this.updateParams({perPage: params.currentPerPage, page: 1});
          this.loadItems();
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
          this.loadItems();
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
          this.loadItems();
      },

      // load items is what brings back the rows from server
      loadItems() {
          this.emitter.emit("isLoading", true);
          this.axios.get(`/api/reports/warning_threshold/${this.current_storage}`).then((response) => {
              this.products_thresholds = response.data['data']
              this.rows = this.products_thresholds
              this.emitter.emit("isLoading", false);

          })
      }
  },
};
</script>