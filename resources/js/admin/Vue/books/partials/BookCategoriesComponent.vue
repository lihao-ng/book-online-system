<template>
  <div class="row">
    <div class="col-12">
      <ul class="multiple-list">
        <li class="mb-2" v-for="(category, index) in categories" v-bind:key="index" @click="onDeleteCategory(index)">
          {{ category.name }} <i class="fa fa-remove"></i>
        </li>
      </ul>

      <input type="text" class="form-control" name="category" placeholder="Search Category" v-model="searchInput" v-on-clickaway="hideList" @keyup="onInputChange" @click="onInputChange">

      <div class="dropdown">
        <div class="dropdown-menu" :class="{ show: haveData }">
          <div class="dropdown-item text-capitalize" v-for="(searchCategory, index) in searchCategories" v-bind:key="index" @click="onSearchClick(searchCategory)" v-if="haveData">
            {{ searchCategory.name }}
          </div>
        </div>
      </div>
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
        searchInput: '',
        haveData: false
      };
    },
    watch: {
      defaultCategories: function(newVal) {
        this.setDefault();
      }
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
        this.categories.splice(index, 1);
        this.emitParent();
      },
      onInputChange: function() {
        var data = {
          search: this.searchInput,
          except: this.categories
        }

        axios.post('/admin/categories/search', data)
        .then(({data}) => {
          if(data.length > 0) {
            this.searchCategories = data;
            this.haveData = true;
          }else {
            this.hideList();
          }
        }, (error) => {});
      },
      onSearchClick: function(searchCategory) {
        this.categories.push({
          id: searchCategory.id,
          name: searchCategory.name
        });
        this.searchInput = '';
        this.emitParent();
      },
      emitParent: function() {
        this.$emit('categoryChange', this.categories);
      },
      hideList: function() {
        this.haveData = false;
      }
    }
  }
</script>