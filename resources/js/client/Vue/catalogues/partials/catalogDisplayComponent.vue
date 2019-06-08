<template>
  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
    <div class="catalogue-books-container container">
      <img :src="book.image" class="catalogue-books-image mt-2">
      <p class="catalogue-books-name">{{ book.title }}</p>
      <!-- <i class="catalogue-books-author">Taherah Mafi</i> -->
      <p class="catalogue-books-price">RM {{ book.price }}</p>
      <div class="catalogue-books-buttons-div">
        <a :href="'/books/' + book.id">
          <button type="button" class="btn catalogue-books-detail-button">
            <i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
            Detail
          </button>
        </a>
        <button type="button" class="btn catalogue-books-buy-button">
          <i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
          Buy
        </button>
      </div>
    </div> 
  </div>
</template>

<script>
  export default{  
    props: ['defaultBook'], 
    data: function(){
      return {
        book: {}
      };
    },
    watch: {
      defaultBook: function(newVal) {
        this.book = newVal;
      }
    },
    mounted: function() {
      this.book = this.defaultBook;
    }
  }
</script>