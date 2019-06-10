<template>
  <div class="container-fluid book-section">
    <div class="row">
      <div class="col-lg-5 col-sm-2 col-3">
        <img :src="bestsellerBook.image" class="book-image">
      </div>
      <div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
        <p class="book-name">{{ bestsellerBook.title }}</p>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <i class="fa fa-star stars-icon" aria-hidden="true"></i>
        <p class="book-price">{{ bestsellerBook.price }}</p>
      </div>
    </div>
  </div>
</template>

<script>
  export default{  
    props: ['defaultBestsellerBook'], 
    data: function(){
      return {
        bestsellerBook: {}
      };
    },
    watch: {
      defaultBestsellerBook: function(newVal) {
        this.bestsellerBook = newVal;
      }
    },
    mounted: function() {
      this.bestsellerBook = this.defaultBestsellerBook;
    }
  }
</script>