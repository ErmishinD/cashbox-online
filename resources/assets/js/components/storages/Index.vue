<template>

  <div>
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
      <router-link :to="{name: 'storages_create'}">
        <button class="btn btn-success pull-right mb-10" >{{ $t('Добавить склад') }}</button>
      </router-link>
    
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link :to="{name: 'storages_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link :to="{name: 'storages_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
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
      storages: null,
      modal_show: false,
      current_name: null,
      current_id: null,
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
        axios.delete(`/api/storages/${this.current_id}`, {
          
        }).then((response) => {
            this.render_list_items()
            this.modal_show = false
        });

    },
    render_list_items: function(){
        var loader = this.$loading.show({
                canCancel: false,
                loader: 'dots',});
        
        this.axios.get('/api/storages').then((response) => {
               this.storages = response.data['data']
               this.rows = this.storages
               loader.hide()

             })
    },
  },
};
</script>


<!-- <template>
    <div>
        <div class="box">
            <p v-if="!messages.length">Start typing the first message</p>

            <div v-for="message in messages">
                

                <div>{{message.text}}</div>
            </div>
        </div>

        <form @submit.prevent="submit">
            <div class="field has-addons has-addons-fullwidth">
                <div class="control is-expanded">
                    <input class="input" type="text" placeholder="Type a message" v-model="newMessage">
                </div>
                <div class="control">
                    <button type="submit" class="button is-danger" :disabled="!newMessage">
                        Send
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                userId: Math.random().toString(36).slice(-5),
                messages: [],
                newMessage: ''
            }
        },
        mounted () {
            Echo.channel('channel-test')
                .listen('TestEvent', (e) => {
                        this.messages.push({
                            text: e.message
                        });
                    
                });
        },
        methods: {
            submit() {
                axios.post(`/api/test`, {
                    message: this.newMessage
                }).then((response) => {
                    console.log(response);
                    this.messages.push({
                        text: this.newMessage
                    });

                    this.newMessage = '';
                }, (error) => {
                    console.log(error);
                });

            }
        }
    }
</script> -->