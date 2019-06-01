<template>
  <div class="row">
    <div class="col-12 col-md-9">
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
                <label>ISBN Number <span class="star">*</span></label>
                <input type="text" name="isbn" class="form-control" required="true" placeholder="Enter ISBN Number here" v-model="book.isbn">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-label">
                <label>Title <span class="star">*</span></label>
                <input type="text" name="title" class="form-control" required="true" placeholder="Enter Title here" v-model="book.title">
              </div>
            </div>
          </div>

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
                <input type="text" name="publication_date" class="form-control datepicker" required="true" v-model="book.publicationDate">
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
        </div>
      </div>
    </div>

    <div class="col-12 col-md-3">
      <div class="card">
        <div class="card-body py-4">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <h4>Categories</h4>
            </div>
          </div>

          <!-- <category-component :default-categories="book.categories"></category-component> -->

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-warning btn-block" @click="onSubmit">Create</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card mt-5">
        <div class="card-body py-4 px-5">
          <div class="row">
            <div class="col-sm-6 mb-3">
              <h4>Authors</h4>
            </div>
          </div>
          <book-authors-component :default-authors="book.authors" @authorChange="onAuthorChange"></book-authors-component>
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
        var self = this;
        $('.datepicker').on('dp.change', function(e){ 
          self.$set(self.book, 'publicationDate', e.date.format('YYYY-MM-DD'));
        })
      },
      onSubmit: function() {
        var data = {
          isbn: this.book.isbn,
          title: this.book.title,
          authors: this.book.authors,
          description: this.book.description,
          publisher: this.book.publisher,
          publicationDate: this.book.publicationDate,
          language: this.book.language,
          price: this.book.price,
          stock: this.book.stock
        }

        axios.post('/admin/books', data)
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
