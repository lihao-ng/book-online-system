<template>
  <div>
    <div class="container-fluid search-bar pt-3 pb-4">
      <div class="row justify-content-center">  
        <div class="col-sm-12 col-md-3 col-lg-2 m-2 ">
          <input type="text" class="search-bar-elements text-secondary pl-2" placeholder="Enter Title" v-model="filter.title" v-on-clickaway="closeBookList" @keyup="onInputChange('title')" @click="onInputChange('title')">

          <div class="vue-dropdown">
            <div class="dropdown-menu w-110" :class="{ show: haveBookData }">
              <div class="dropdown-item text-capitalize" v-for="(searchBook, index) in searchBooks" v-bind:key="index" @click="onSearchClick(searchBook, 'title')" v-if="haveBookData">
                {{ searchBook.title }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-3 col-lg-2 m-2 ">
          <input type="text" class="search-bar-elements text-secondary pl-2" placeholder="Enter Category" v-model="filter.category" v-on-clickaway="closeCatList" @keyup="onInputChange('category')" @click="onInputChange('category')">

          <div class="vue-dropdown">
            <div class="dropdown-menu w-110" :class="{ show: haveCatData }">
              <div class="dropdown-item text-capitalize" v-for="(searchCategory, index) in searchCategories" v-bind:key="index" @click="onSearchClick(searchCategory, 'category')" v-if="haveCatData">
                {{ searchCategory.name }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-3 col-lg-2 m-2">
          <input type="text" class="search-bar-elements text-secondary pl-2" placeholder="Enter Author" v-model="filter.author" v-on-clickaway="closeAutList" @keyup="onInputChange('author')" @click="onInputChange('author')">

          <div class="vue-dropdown">
            <div class="dropdown-menu w-110" :class="{ show: haveAutData }">
              <div class="dropdown-item text-capitalize" v-for="(searchAuthor, index) in searchAuthors" v-bind:key="index" @click="onSearchClick(searchAuthor, 'author')" v-if="haveAutData">
                {{ searchAuthor.name }}
              </div>
            </div>
          </div>
        </div>  

        <div class="col-sm-12 col-md-7 col-lg-2 m-2">
          <button type="button" class="btn search-bar-find-button text-light d-block" @click="onRefresh">
            <i class="fa fa-refresh" aria-hidden="true"></i>
          RESET</button>
        </div>
      </div>
    </div>

    <div class="container-fluid"> 
      <div class="row catalogue-books-display py-5 justify-content-center">
        <!-- book catalogues -->
        <div class="col-xl-7 col-lg-8">
          <paginate name="bookPagination" :list="searchResults" :per="9" v-if="searchResults.length">
            <div class="row justify-content-center">
              <catalog-display-component :default-book="searchResult" v-for="(searchResult, index) in paginated('bookPagination')" :key="index"></catalog-display-component>
            </div>
          </paginate>
          <paginate-links for="bookPagination" :limit="5" :show-step-links="true" :step-links="{ next: 'Next', prev: 'Previous' }" v-if="searchResults.length"></paginate-links>
        </div>  
        <!-- filter, products, categories, products -->
        <div class="col-lg-2 books-row">
          <!-- Top-rated -->
          <div class="row">
            <div class="col">
              <div class="container catalogue-side-books-container mt-0">
                <p class="right-section-title">TOP RATED PRODUCTS</p>
                <top-rated-component :default-top-rated-book="topRatedBook" v-for="(topRatedBook, index) in topRatedBooks" :key="index"></top-rated-component>
              </div>
            </div>
          </div>
          <!-- categories -->
         <!--  <div class="row justify-content-center">
            <div class="col">
              <div class="container book-categories-container">
                <p class="right-section-title">PRODUCT CATEGORIES</p>
                <a class="categories-button" href="#">Drama</a>
                <ul class="book-categories-list">
                  <li><a class="categories-button" href="#">Insipration</a></li>
                  <li><a class="categories-button" href="#">Love story</a></li>             
                </ul>
                <a class="categories-button" href="#">Life style</a>
                <ul class="book-categories-list">
                  <li><a class="categories-button" href="#">Business</a></li>
                  <li><a class="categories-button" href="#">Culture</a></li>              
                </ul>
                <a class="categories-button" href="#">Business</a>
                <a class="categories-button" href="#">Culture</a>
              </div>
            </div>
          </div> -->
          <!-- Products -->
          <div class="row">
            <div class="col">
              <div class="container catalogue-side-books-container">
                <p class="right-section-title">BESTSELLING PRODUCTS</p>
                <bestseller-component :default-bestseller-book="bestsellerBook" v-for="(bestsellerBook, index) in bestsellerBooks" :key="index"></bestseller-component>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</template>

<script>
  import { mixin as clickaway } from 'vue-clickaway';

  export default{
    props: ['topRatedBooks', 'bestsellerBooks'],
    mixins: [clickaway],
    data: function(){
      return {
        filter: {
          title: '',
          category: '',
          author: ''
        },
        searchBooks: [],
        searchCategories: [],
        searchAuthors: [],
        searchResults: [],
        haveBookData: false,
        haveCatData: false,
        haveAutData: false,
        paginate: ['bookPagination']
      };
    },
    mounted: function() {
      this.changeBooks();
    },
    methods: {
      onInputChange: function(type) {
        switch(type) {
          case 'title':
          var url = '/books/earch';
          var data = { title: this.filter.title };
          break;

          case 'category':
          var url = '/categories/search';
          var data = { title: this.filter.title };
          break;

          case 'author':
          var url = '/authors/search';
          var data = { title: this.filter.title };
          break;
        }

        axios.post(url, data)
        .then(({data}) => {
          if(data.length > 0) {
            this.setData(type, data);
            this.openList(type);
          }else {
            this.noDataFound(type);
          }
        }, (error) => {});     

        this.changeBooks();    
      },
      setData: function(type, data) {
        switch(type) {
          case 'title':
          this.searchBooks = data;
          break;

          case 'category':
          this.searchCategories = data;
          break;

          case 'author':
          this.searchAuthors = data;
          break;
        }
      },
      noDataFound: function(type) {
        switch(type) {
          case 'title':
          this.searchBooks = [];
          this.searchBooks.push({ title: 'No Books Found', none: true });
          break;

          case 'category':
          this.searchCategories = [];
          this.searchCategories.push({ name: 'No Categories Found', none: true });
          break;

          case 'author':
          this.searchAuthors = [];
          this.searchAuthors.push({ name: 'No Authors Found', none: true });
          break;
        }
      },
      onSearchClick: function(data, type) {
        if(data.none) {
          this.filter[type] = '';
          return;
        }

        switch(type) {
          case 'title':
          this.filter.title = data.title;
          this.closeBookList();
          break;

          case 'category':
          this.filter.category = data.name;
          this.closeCatList();
          break;

          case 'author':
          this.filter.author = data.name;
          this.closeAutList();
          break;
        }

        this.changeBooks();
      },
      changeBooks: function() {
        var data = {
          title: this.filter.title,
          category: this.filter.category,
          author: this.filter.author,
        }

        axios.post('books/search', data)
        .then(({data}) => {
          this.searchResults = data;          
        }, (error) => {}); 
      },
      onRefresh: function() {
        this.filter.title = '';
        this.filter.category = '';
        this.filter.author = ''; 

        this.changeBooks();
      },
      openList: function(type) {
        switch(type) {
          case 'title':
          this.haveBookData = true;
          break;

          case 'category':
          this.haveCatData = true;
          break;

          case 'author':
          this.haveAutData = true;
          break;
        }
      },
      closeBookList: function() {
        this.haveBookData = false;
      },
      closeCatList: function() {
        this.haveCatData = false;
      },
      closeAutList: function() {
        this.haveAutData = false;
      }
    }
  }
</script>