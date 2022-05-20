<template>
   
  <div>
    <notifications position="bottom right" />
  	  <router-link :to="{name: 'settings_roles_create'}">
  	  	<button v-if="this.$can('Role_create')" class="btn btn-success pull-right mb-10" >{{ $t('Добавить роль') }}</button>
  	  </router-link>
  	<GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="500">
        <div class="getting-started-example-styled">
          <div class="getting-started-example-styled__content">
            <div class="getting-started-example-styled__title">
              {{ $t('Внимание') }}!
            </div>

            <p>{{ $t('Вы уверены, что хотите удалить') }} "{{current_name}}"?</p>
          </div>

          <div class="getting-started-example-styled__actions">
            <button @click="delRole" class="btn btn-danger">
              {{ $t('Удалить') }}
            </button>
          </div>
        </div>
      </GDialog>
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link v-if="this.$can('Role_edit')" :to="{name: 'settings_roles_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a v-if="props.row.users_amount == 0 && this.$can('Role_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
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
      roles: null,
      modal_show: false,
      current_name: null,
      current_id: null,
      columns: [
        {
          label: this.$t('Название'),
          field: 'human_name',
        },
        {
          label: this.$t('Кол-во пользователей'),
          field: 'users_amount',
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
  	document.title = this.$t('Роли');
  },
  methods:{
  	render_list_items: function(){
  		this.emitter.emit("isLoading", true);
  		
  		this.axios.get('/api/roles').then((response) => {
  		       this.roles = response.data['data']
  		       this.rows = this.roles
  		       this.emitter.emit("isLoading", false);
  		     })
  	},
    onOpen(params){
      this.modal_show = true
      this.current_name = params.human_name
      this.current_id = params.id
      console.log(params)
    },
    delRole(){
      axios.delete(`/api/roles/${this.current_id}`, {
        
      }).then((response) => {
        this.$notify({
                text: this.$t('Успешно!'),
                type: 'success',
              });
        this.render_list_items()
        this.modal_show = false
      });

    },
  },
};
</script>