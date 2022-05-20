<template>

  <div>
    <notifications position="bottom right" />
    <GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="500">
        <div class="getting-started-example-styled">
          <div class="getting-started-example-styled__content">
            <div class="getting-started-example-styled__title">
              {{ $t('Внимание') }}!
            </div>

            <p>{{ $t('Вы уверены, что хотите удалить') }} "{{current_name}}"?</p>
          </div>

          <div class="getting-started-example-styled__actions">
            <button @click="delStorage" class="btn btn-danger">
              {{ $t('Удалить') }}
            </button>
          </div>
        </div>
      </GDialog>
      <div class="row-btw mb-10" style="font-size: 27px;">
        <div>{{$t('Суммарный баланс: ')}} {{this.balance.all_balance}}</div>
        <router-link :to="{name: 'storages_create'}">
          <button v-if="this.$can('Storage_create')" class="btn  pull-right btn-success" >{{ $t('Добавить склад') }}</button>
        </router-link>
      </div>
      
    
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link v-if="this.$can('Storage_show')" :to="{name: 'storages_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link v-if="this.$can('Storage_edit')" :to="{name: 'storages_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a v-if="this.$can('Storage_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
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
      storages: null,
      modal_show: false,
      current_name: null,
      current_id: null,
      balance: [],
      balance_modal_show: false,
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Баланс'),
          field: 'balance',
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
    document.title = this.$t('Склады');

  },
  methods:{
    onOpen(params){
        this.modal_show = true
        this.current_name = params.name
        this.current_id = params.id
        console.log(params)
    },
    delStorage(){
        axios.delete(`/api/storages/${this.current_id}`).then((response) => {
          this.render_list_items()
          this.$notify({
                  text: this.$t('Успешно!'),
                  type: 'success',
              })
        }).catch(error => {
          if(error.response.status == 409){
            this.$notify({
              text: this.$t('Ошибка при удалении!'),
              type: 'error',
            });
            
          }
        }).finally((result) => {
          this.modal_show = false
        })

    },
    render_list_items: function(){
        this.emitter.emit("isLoading", true);
        
        this.axios.post('/api/storages/get_balance', {storage_ids:[]}).then((response) => {
                this.balance = response.data['data']
               this.storages = response.data['data'].storages
               this.rows = this.storages
               this.emitter.emit("isLoading", false);

             })
    },
  },
};
</script>