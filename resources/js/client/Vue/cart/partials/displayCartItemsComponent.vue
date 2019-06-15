<template>
  <div>
    <div class=" col-12 pb-3 mb-4 bg-white cartPage-shadow">
      <div class="row">
        <div class="col-12 col-lg-3">
          <div class="text-center">
            <img :src="book.image" class="img-thumbnail cart-image">
          </div>
        </div>

        <div class="col-12 col-lg-9">
          <div class="row cartPage-title-container justify-content-between mr-0 ml-0">
            <div class="cartPage-title-detail-container col-6">
              <div class="cartPage-title">Details:</div>
            </div>
            <div class="cartPage-title-price-container col-6 col-sm-5">
              <div class="cartPage-title">Price: RM{{ book.price }}</div>
            </div>
          </div>

          <div class="row cartPage-detail-content-container">
            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <span class="cartPage-detail-title">Book Name:</span>
                  {{ book.title }}<br>
                  <span class="cartPage-detail-title">Author:</span>
                  {{ author.name }}<br>
                  <span class="cartPage-detail-title">Language:</span>
                  {{ book.language }}<br>
                  <span class="cartPage-detail-title">Rating:</span>
                  {{ book.rating }}/5<br>
                  <span class="cartPage-detail-title">Description:</span> 
                  {{ book.description }}
                  <br>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-12 cartPage-garbage-numOfOrderBar-container">
              <input class="cartPage-numOfOrderBar mr-4" type="number" v-model="item.amount" @keyup="onChange">
              <button class="cartPage-garbage-button" @click="onDelete"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default{
    props: ['defaultItem', 'index'],
    data: function(){
      return {
        item: {},
        book: {},
        author: {}
      };
    },
    mounted: function() {
      this.setDefault();
    },
    methods: {
      setDefault: function() {
        this.item = this.defaultItem;
        this.book = this.item.book;
        if(this.book.authors[0]) {
          this.author = this.book.authors[0];
        }
      },
      onChange: function() {
        if(this.item.amount <= 0 || this.item.amount == "") {
          this.item.amount = 1;
        }

        this.$emit('onItemChanged', this.item, this.index);
      },
      onDelete: function() {
        this.$emit('onItemDeleted', this.item, this.index);
      }
    }
  }
</script>