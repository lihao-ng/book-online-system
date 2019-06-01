<template>
  <div class="row">
    <div class="col-12" >
      <ul class="multiple-list">
        <li class="mb-2" v-for="(author, index) in authors" v-bind:key="index" @click="onDeleteAuthor(index)" v-if="!author.deleted">
          {{ author.name }} <i class="fa fa-remove"></i>
        </li>
      </ul>

      <input type="text" class="form-control" name="author_name" placeholder="Search Author" v-model="searchInput" v-on-clickaway="hideList" @keyup="onInputChange" @click="onInputChange">

      <div class="dropdown">
        <div class="dropdown-menu" :class="{ show: haveData }">
          <div class="dropdown-item text-capitalize" v-for="(searchAuthor, index) in searchAuthors" v-bind:key="index" @click="onSearchClick(searchAuthor)" v-if="haveData">
            {{ searchAuthor.name }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template> 
<script>
  import { mixin as clickaway } from 'vue-clickaway';

  export default{
    props: ['defaultAuthors'],
    mixins: [clickaway],
    data: function(){
      return {
        authors: [],
        authorsId: [],
        searchAuthors: [],
        searchInput: '',
        haveData: false
      };
    },
    mounted(){
      this.setDefault();
    },
    methods: {
      setDefault: function() {
        if(!this.defaultAuthors) {
          return;
        }

        this.authors = this.defaultAuthors;
      },
      onDeleteAuthor: function(index) {
        this.authorsId.splice(index, 1);
        this.$set(this.authors[index], 'deleted', true);
        this.emitParent();
      },
      onInputChange: function() {
        var data = {
          search: this.searchInput,
          except: this.authorsId
        }

        axios.post('/admin/admins/search', data)
        .then(({data}) => {
          if(data.length > 0) {
            this.searchAuthors = data;
            this.haveData = true;
          }else {
            this.hideList();
          }
        }, (error) => {

        });
      },
      onSearchClick: function(searchAuthor) {
        this.authorsId.push(searchAuthor.id);

        this.authors.push({
          id: searchAuthor.id,
          name: searchAuthor.name
        });

        this.emitParent();
      },
      emitParent: function() {
        this.$emit('authorChange', this.authors);
      },
      hideList: function() {
        this.haveData = false;
      }
    }
  }
</script>
