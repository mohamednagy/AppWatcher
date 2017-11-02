<template>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-bars"></i> LATEST LOGS</h3>

        <div class="box-tools">
            <pagination :data="logs" v-on:pagination-change-page="getLogs" class="pagination pagination-sm no-margin pull-right"></pagination>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        
        <table class="table">
          <tr>
            <th>Log</th>
            <th style="width: 150px">Time</th>
            <th style="width: 40px">Type</th>
          </tr>
          <tbody>
              <tr v-for="log in logs.data">
                <td>{{log.log}}</td>
                <td>
                  {{log.created_at}}
                </td>
                <td><a v-on:click="Bus.$emit('log-tag-selected', log.type)" class="badge" v-bind:class="'bg-'+log.type">{{log.type}}</a></td>
              </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
</template>

<script>
    import axios from 'axios';
    import Paginate from 'laravel-vue-pagination';

    export default {
        components: {
            'pagination': Paginate
        },
        data() {
            return {
                logs: {},
                errors: [],
                Bus: window.Bus,
                selectedTags: null
            }
        },
        created(){
            let _this = this;
            window.Bus.$on('log-tag-selected', function (tagName) {
                _this.selectedTags = tagName;
                _this.getLogs();
            });
        },
        mounted() {
            this.getLogs();
        },
        methods: {
            getLogs : function(page){
                var type = this.$attrs['log-type'] || null;
                var url = "logs?page="+(page || 1);
                if(type){
                    url +=  "&type="+type;
                }
                if(this.selectedTags){
                    url += "&tag="+this.selectedTags;
                }
                axios.get(url)
                .then(response => {
                  // JSON responses are automatically parsed.
                  this.logs = response.data;
                })
                .catch(e => {
                  this.errors.push(e)
                })
              }
        }
    }
</script>
