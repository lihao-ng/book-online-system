<template>
  <div class="row">
    <div class="col-12" >
      <ul class="multiple-list">
        <li class="mb-2" v-for="(book, index) in books" v-bind:key="index" @click="onDeleteBook(index)">
          {{ book.title }} <i class="fa fa-remove"></i>
        </li>
      </ul>

      <input type="text" class="form-control" name="book_name" placeholder="Search Book" v-model="searchInput" v-on-clickaway="hideList" @keyup="onInputChange" @click="onInputChange">

      <div class="dropdown">
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
        booksId: [],
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
        this.books.forEach((book) => {
          this.booksId.push(book.id);
        });
      },
      onDeleteBook: function(index) {
        this.booksId.splice(index, 1);
        this.books.splice(index, 1);
        this.emitParent();
      },
      onInputChange: function() {
        var data = {
          search: this.searchInput,
          except: this.booksId
        }

        axios.post('/admin/books/search', data)
        .then(({data}) => {
          if(data.length > 0) {
            this.searchBooks = data;
            this.haveData = true;
          }else {
            this.hideList();
          }
        }, (error) => {});
      },
      onSearchClick: function(searchBook) {
        this.booksId.push(searchBook.id);

        this.books.push({
          id: searchBook.id,
          title: searchBook.title
        });

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
