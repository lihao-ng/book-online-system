<template>
  <div>
    <div class=" col-12 pb-3 mb-4 bg-white cartPage-shadow">
      <div class="row">
        <div class="col-12 col-lg-3">
          <div class="text-center">
            <img :src="item.image" class="img-thumbnail cart-image">
          </div>
        </div>

        <div class="col-12 col-lg-9">
          <div class="row cartPage-title-container justify-content-between mr-0 ml-0">
            <div class="cartPage-title-detail-container col-6">
              <div class="cartPage-title">Details:</div>
            </div>
            <div class="cartPage-title-price-container col-6 col-sm-5">
              <div class="cartPage-title">Price: RM{{ item.price }}</div>
            </div>
          </div>

          <div class="row cartPage-detail-content-container">
            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <span class="cartPage-detail-title">Book Name:</span>
                  {{ item.title }}<br>
                  <span class="cartPage-detail-title">Author:</span>
                  {{ author.name }}<br>
                  <span class="cartPage-detail-title">Language:</span>
                  {{ item.language }}<br>
                  <span class="cartPage-detail-title">Rating:</span>
                  {{ item.rating }}/5<br>
                  <span class="cartPage-detail-title">Description:</span> 
                  {{ item.description }}
                  <br>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-12 cartPage-garbage-numOfOrderBar-container">
              <input class="cartPage-numOfOrderBar mr-4" type="number" value="1" min="1">
              <button class="cartPage-garbage-button"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default{
    props: ['defaultItem'],
    data: function(){
      return {
        item: {},
        author: {}
      };
    },
    mounted: function() {
      this.setDefault();
    },
    methods: {
      setDefault: function() {
        this.item = this.defaultItem;
        if(this.defaultItem.authors[0]) {
          this.author = this.defaultItem.authors[0];
        }
      },
      onSubmit: function() {
        // if(!this.book.id) {
        //   this.error.show = true;
        //   return;
        // }else {
        //   this.error.show = false;
        // }

        // window.location.href = `/books/${this.book.id}`;
      }
    }
  }
</script>