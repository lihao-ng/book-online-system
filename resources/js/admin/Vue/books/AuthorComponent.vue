<template>
  <div class="row">
    <div class="col-sm-12">
      <label>Authors <span class="star">*</span></label> 
      
      <ul>
        <li v-for="(author, index) in authors" v-bind:key="index" @click="onDeleteAuthor(index)" v-if="!author.deleted">{{ author.name }}</li>
      </ul>
      
      <input type="text" class="form-control" name="author_name" v-model="searchInput" v-on-clickaway="hideList" @keyup="onInputChange" @click="onInputChange">

      <ul>
        <li v-for="(searchAuthor, index) in searchAuthors" v-bind:key="index" @click="onSearchClick(searchAuthor)" v-if="haveData">{{ searchAuthor.name }}</li>
      </ul>
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
        if(this.defaultAuthors) {
          this.authors = this.defaultAuthors;
        }
      },
      onDeleteAuthor: function(index) {
        this.authors[index].deleted = true;
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

        this.$emit('authorChange', this.authors);
      },
      hideList: function() {
        this.haveData = false;
      }
    }
  }
</script>
