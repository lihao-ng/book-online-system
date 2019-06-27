<template>
  <div class="container-fluid search-bar py-3">
    <div class="row justify-content-center">
      <div class="col-12 col-md-9 col-lg-7">
       <div class="alert alert-danger" role="alert" v-if="error.show">
        {{ error.message }}
      </div>
    </div>
  </div>

  <div class="row justify-content-center" align="center"> 
    <div class="col-sm-12 col-md-6 col-lg-5 m-2">
      <input type="text" class="search-bar-elements text-secondary pl-2 w-100" placeholder="Enter Title" v-model="book.title" v-on-clickaway="closeList" @keyup="onInputChange" @click="onInputChange">
      <div class="vue-dropdown">
        <div class="dropdown-menu" :class="{ show: haveData }">
          <div class="dropdown-item text-capitalize" v-for="(searchBook, index) in books" v-bind:key="index" @click="onSearchClick(searchBook)" v-if="haveData">
            <div class="row">
              <div class="col-3">
                <img :src="searchBook.image" class="img-fluid">
              </div>
              <div class="col-9">
                {{ searchBook.title }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 

    <div class="col-sm-12 col-md-3 col-lg-2 m-2 ml-md-4">
      <button type="button" class="btn search-bar-find-button text-light d-block" @click="onSubmit">
        <i class="fa fa-search"></i>
      FIND BOOK</button>
    </div>
  </div>
</div>
</template>

<script>
  import { mixin as clickaway } from 'vue-clickaway';

  export default{
    mixins: [clickaway],
    data: function(){
      return {
        book: {},
        books: [],
        haveData: false,
        error: {
          show: false,
          message: 'Please select a book first.'
        }
      };
    },
    methods: {
      onSubmit: function() {
        if(!this.book.id) {
          this.error.show = true;
          return;
        }else {
          this.error.show = false;
        }

        window.location.href = `/books/${this.book.id}`;
      },
      onInputChange: function() {
        var data = {
          title: this.book.title
        }

        axios.post('/books/search', data)
        .then(({data}) => {
          if(data.length > 0) {
            this.books = data;
            this.openList();
          }else {
            this.books = [];
            this.books.push({
              title: 'No Books Found',
              none: true
            })
          }
        }, (error) => {});         
      },
      onSearchClick: function(book) {
        if(book.none) {
          this.book.title = '';
          return;
        }
        this.book.id = book.id;
        this.book.title = book.title;
        this.closeList();
      },
      openList: function() {
        this.haveData = true;
      },
      closeList: function() {
        this.haveData = false;
      }
    }
  }
</script>
