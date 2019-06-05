<template>
  <div class="row">
    <div class="col-12" >
      <ul class="multiple-list">
        <li class="mb-2" v-for="(author, index) in authors" v-bind:key="index" @click="onDeleteAuthor(index)">
          {{ author.name }} | {{ author.penName }} <i class="fa fa-remove"></i>
        </li>
      </ul>

      <input type="text" class="form-control" name="author_name" placeholder="Search Author" v-model="searchInput" v-on-clickaway="hideList" @keyup="onInputChange" @click="onInputChange">

      <div class="dropdown">
        <div class="dropdown-menu" :class="{ show: haveData }">
          <div class="dropdown-item text-capitalize" v-for="(searchAuthor, index) in searchAuthors" v-bind:key="index" @click="onSearchClick(searchAuthor)" v-if="haveData">
            <p class="wrap-space">{{ searchAuthor.name }} <span v-if="!searchAuthor.none">|</span> {{searchAuthor.penName }}</p>
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
        searchAuthors: [],
        searchInput: '',
        haveData: false
      };
    },
    watch: {
      defaultAuthors: function(newVal) {
        this.setDefault();
      }
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
        this.authors.splice(index, 1);
        this.emitParent();
      },
      onInputChange: function() {
        var data = {
          search: this.searchInput,
          except: this.authors
        }

        axios.post('/admin/authors/search', data)
        .then(({data}) => {
          this.haveData = true;
          if(data.length > 0) {
            this.searchAuthors = data;
          }else {
            this.searchAuthors = [];
            this.searchAuthors.push({
              name: 'No Authors Found',
              none: true
            });
          }
        }, (error) => {});
      },
      onSearchClick: function(searchAuthor) {
        if(this.searchAuthors[0].none) {
          return;
        }
        this.authors.push({
          id: searchAuthor.id,
          name: searchAuthor.name,
          penName: searchAuthor.penName
        });

        this.searchInput = '';
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
