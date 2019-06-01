<template>
  <div class="row">
    <div class="col-12">
      <input type="text" class="form-control" name="category" placeholder="Search Category" v-model="searchInput" v-on-clickaway="hideList" @keyup="onInputChange" @click="onInputChange">
    </div>
  </div>
</template>

<script>
  import { mixin as clickaway } from 'vue-clickaway';

  export default{
    props: ['defaultCategories'],
    mixins: [clickaway],
    data: function(){
      return {
        categories: [],
        searchCategories: [],
        searchInput: []
      };
    },
    mounted(){
      this.setDefault();
    },
    methods: {
      setDefault: function() {
        if(!this.defaultCategories) {
          return;
        }

        this.categories = this.defaultCategories;
      },
      onDeleteCategory: function(index) {
        this.authorsId.splice(index, 1);
        this.$set(this.categories[index], 'deleted', true);
        this.emitParent();
      },
      onInputChange: function() {
        var data = {
          search: this.searchInput,
          except: this.authorsId
        }

        axios.post('/admin/categories/search', data)
        .then(({data}) => {
          if(data.length > 0) {
            this.searchCategories = data;
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