<template>
  <div class="row">
    <div class="col-12" >
      <ul class="multiple-list">
        <li class="mb-2" v-for="(book, index) in books" v-bind:key="index" @click="onDeleteBook(index)">
          {{ book.title }} <i class="fa fa-remove"></i>
        </li>
      </ul>

      <input type="text" class="form-control" name="book_name" placeholder="Search Book" v-model="searchInput" v-on-clickaway="hideList" @keyup="onInputChange" @click="onInputChange">

      <div class="vue-dropdown">
        <div class="dropdown-menu" :class="{ show: haveData }">
          <div class="dropdown-item text-capitalize" v-for="(searchBook, index) in searchBooks" v-bind:key="index" @click="onSearchClick(searchBook)" v-if="haveData">
            {{ searchBook.title }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template> 
<script>
  import { mixin as clickaway } from 'vue-clickaway';

  export default{
    props: ['defaultBooks'],
    mixins: [clickaway],
    data: function(){
      return {
        books: [],
        searchBooks: [],
        searchInput: '',
        haveData: false
      };
    },
    watch: {
      defaultBooks: function(newVal) {
        this.setDefault();
      }
    },
    mounted(){
      this.setDefault();
    },
    methods: {
      setDefault: function() {
        if(!this.defaultBooks) {
          return;
        }
        this.books = this.defaultBooks;
      },
      onDeleteBook: function(index) {
        this.books.splice(index, 1);
        this.emitParent();
      },
      onInputChange: function() {
        var data = {
          search: this.searchInput,
          except: this.books
        }

        axios.post('/admin/books/search', data)
        .then(({data}) => {
          this.haveData = true;
          if(data.length > 0) {
            this.searchBooks = data;
          }else {
            this.searchBooks = [];
            this.searchBooks.push({
              title: 'No Books Found',
              none: true
            });
          }
        }, (error) => {});
      },
      onSearchClick: function(searchBook) {
        if(this.searchBooks[0].none) {
          return;
        }
        this.books.push({
          id: searchBook.id,
          title: searchBook.title,
          isbn: searchBook.isbn
        });
        this.searchInput = '';
        this.emitParent();
      },
      emitParent: function() {
        this.$emit('bookChange', this.books);
      },
      hideList: function() {
        this.haveData = false;
      }
    }
  }
</script>
