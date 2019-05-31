<template>
 <div class="card">
  <div class="card-body py-4 px-5">
    <div class="row">
      <div class="col-sm-6 mb-3">
        <h4>Book Details</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group has-label">
          <label>Title <span class="star">*</span></label>
          <input type="text" name="title" class="form-control" required="true" placeholder="Title" v-model="book.title">
        </div>
      </div>
    </div>

    <author-component :default-authors="book.authors" @authorChange="onAuthorChange"></author-component>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group has-label">
          <label>Description <span class="star">*</span></label>
          <input type="textarea" name="description" class="form-control" required="true" v-model="book.description">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group has-label">
          <label>Publisher <span class="star">*</span></label>
          <input type="text" name="publisher" class="form-control" required="true" v-model="book.publisher">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group has-label">
          <label>Publisher Date <span class="star">*</span></label>
          <input type="text" name="publication_date" class="form-control datepicker" required="true" v-model="book.publisherDate">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group has-label">
          <label>Language <span class="star">*</span></label>
          <input type="text" name="language" class="form-control" required="true" v-model="book.language">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group has-label">
          <label>Price <span class="star">*</span></label>
          <input type="text" name="price" class="form-control" required="true" v-model="book.price">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group has-label">
          <label>Stocks <span class="star">*</span></label>
          <input type="text" name="stock" class="form-control" required="true" v-model="book.stock">
        </div>
      </div>
    </div>

    <div class="row text-right">
      <div class="offset-0 offset-md-9 col-12 col-md-3">
        <button type="submit" class="btn btn-warning btn-block">Create</button>
      </div>
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
    mounted(){
      this.setDefault();
    },
    methods: {
      setDefault: function() {
        if(this.defaultBook) {
          this.book = this.defaulBook;
        }
      },
      onSubmit: function() {
        var data = {
          title: this.book.title,
          authors: this.book.authors,
          description: this.book.description,
          publisher: this.book.publisher,
          publicationDate: this.book.publisherDate,
          language: this.book.language,
          price: this.book.price,
          stocks: this.book.stocks
        }

        axios.post('/admin/admins/store', data)
        .then(({data}) => {
          console.log("success");
          // redirect
        }, (error) => {

        });
      },
      onAuthorChange: function(authors) {
        this.book.authors = authors;
      }
    }
  }
</script>
