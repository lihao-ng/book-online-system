<template>
  <div class="container-fluid book-section">
    <div class="row">
      <div class="col-lg-5 col-sm-2 col-3">
        <img :src="topRatedBook.image" class="book-image">
      </div>
      <div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
        <p class="book-name">{{ topRatedBook.title }}</p>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <p class="book-price">RM {{ topRatedBook.price }}</p>
      </div>
    </div>
  </div>
</template>

<script>
  export default{  
    props: ['defaultTopRatedBook'], 
    data: function(){
      return {
        topRatedBook: {}
      };
    },
    watch: {
      defaultTopRatedBook: function(newVal) {
        this.topRatedBook = newVal;
      }
    },
    mounted: function() {
      this.topRatedBook = this.defaultTopRatedBook;
    }
  }
</script>