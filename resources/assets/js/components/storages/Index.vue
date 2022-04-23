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
      <div class="row-btw mb-10">
        <button @click="openBalance" class="btn btn-primary">
          {{ $t('Баланс складов') }}
        </button>

        <router-link :to="{name: 'storages_create'}">
          <button v-if="this.$can('Storage_create')" class="btn btn-success" >{{ $t('Добавить склад') }}</button>
        </router-link>
      </div>

      <GDialog style="z-index: 9999;" :persistent="false" v-model="balance_modal_show" max-width="500">
        <h1 class="tac">{{$t('Суммарный баланс')}}: {{balance.all_balance}}</h1>
        <vue-good-table style="position: static; padding: 10px 20px;"
          mode="remote"
          :columns="balance_columns"
          :rows="balance_rows"
          :line-numbers="true"
          >
        }
      <template #table-row="props">
        
      </template>
    </vue-good-table>
      </GDialog>
      
    
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
      balance: null,
      balance_modal_show: false,
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Действия'),
          field: 'actions',
          sortable: false,
          width: '65px',
        },
      ],
      rows: [],
      balance_columns:[
        {
          label: this.$t("Склад"),
          field: "name",
        },
        {
          label: this.$t("Баланс"),
          field: 'balance'
        },
      ],
      balance_rows:[],
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
        var loader = this.$loading.show({
                canCancel: false,
                loader: 'dots',});
        
        this.axios.get('/api/storages').then((response) => {
               this.storages = response.data['data']
               this.rows = this.storages
               loader.hide()

             }).catch(function(error){
            if(error.response.status == 403){
                loader.hide()
                this.$router.push({ name: '403' })
            }
        })
    },

    openBalance() {


        this.axios.post('/api/storages/get_balance', {storage_ids:[]}).then((response) => {
          this.balance = response.data.data
          this.balance_rows = response.data.data.storages
          this.balance_modal_show = true
        })


      },
  },
};
</script>