<template>
  <div class="row">
    <div class="col-12 col-md-7 col-lg-8">
      <div class="alert alert-danger" role="alert" v-if="error.show">
        {{ error.message[0] }}
      </div>

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
                <textarea name="description" class="form-control" required="true" v-model="book.description"></textarea>
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
                <label>Publication Date <span class="star">*</span></label>
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

          <div class="row mb-2" v-if="book.image">
            <div class="col-sm-12 text-center">
              <div class="btn btn-danger mb-1 mr-3" @click="onClearImage">Clear</div>
              <label class="font-weight-bold">Preview </label>
              <div>
                <img :src="book.preview" class="image-size">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-label">
                <label>Image </label>
                <input type="file" name="image" class="form-control" @change="onFileInput">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-5 col-lg-4">
      <div class="card">
        <div class="card-body py-4">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <h4>Categories</h4>
            </div>
          </div>

          <book-categories-component :default-categories="book.categories" @categoryChange="onCategoryChange"></book-categories-component>
        </div>
      </div>

      <div class="card mt-5">
        <div class="card-body py-4">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <h4>Authors</h4>
            </div>
          </div>
          <book-authors-component :default-authors="book.authors" @authorChange="onAuthorChange"></book-authors-component>
        </div>
      </div>
    </div>

    <div class="col-12 mt-4">
      <div class="row">
        <div class="col-12 col-md-3 ml-auto">
          <button type="submit" class="btn btn-warning btn-block" @click="onSubmit">Create</button>
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
        book: {
          isbn: '',
          title: '',
          description: '',
          publisher: '',
          publicationDate: '',
          language: '',
          price: '',
          stock: '',
          image: '',
          preview: '',
          hasOldImage: '',
          authors: '',
          books: ''
        },
        error: {
          show: false,
          message: ''
        }
      };
    },
    mounted(){
      this.setDefault();
    },
    methods: {
      setDefault: function() {
        if(this.defaultBook) {
          this.book = this.defaultBook;
          this.book.preview = this.book.image;
          this.book.hasOldImage = this.book.hasOldImage;
          this.book.categories = this.defaultBook.categories;
          this.book.authors = this.defaultBook.authors;
        }
        var self = this;
        $('.datepicker').on('dp.change', function(e){ 
          self.$set(self.book, 'publicationDate', e.date.format('YYYY-MM-DD'));
        })
      },
      onSubmit: function() {
        var data = new FormData();
        data.append('isbn', this.book.isbn);
        data.append('title', this.book.title);
        data.append('description', this.book.description);
        data.append('publisher', this.book.publisher);
        data.append('publicationDate', this.book.publicationDate);
        data.append('language', this.book.language);
        data.append('price', this.book.price);
        data.append('stock', this.book.stock);
        data.append('image', this.book.image);
        data.append('authors', JSON.stringify(this.book.authors));
        data.append('categories', JSON.stringify(this.book.categories));

        // var data = {
        //   isbn: this.book.isbn,
        //   title: this.book.title,
        //   authors: this.book.authors,
        //   description: this.book.description,
        //   publisher: this.book.publisher,
        //   publicationDate: this.book.publicationDate,
        //   language: this.book.language,
        //   price: this.book.price,
        //   stock: this.book.stock,
        //   categories: this.book.categories
        // }

        if(!this.defaultBook) {
          var method = 'POST';
          var url = '/admin/books'
        }else {
          var method = "POST";
          var url = `/admin/books/${this.defaultBook.id}`;
          data.append('hasOldImage', this.book.hasOldImage);
        }

        axios({
          method: method,
          url: url,
          data: data
        }).then(({data}) => {
          window.location.href = data;
        }, (error) => {
          this.error.show = true;
          this.error.message = _.values(error.response.data.errors)[0];
          $(window).scrollTop(0);
        });
      },
      onAuthorChange: function(authors) {
        this.book.authors = authors;
      },
      onCategoryChange: function(categories) {
        this.book.categories = categories;
      },
      onFileInput: function(e) {  
        if(!e.target.files[0]) {
          this.book.image = '';
          return;
        }
        this.book.hasOldImage = '';
        this.book.image = e.target.files[0];
        this.book.preview = URL.createObjectURL(e.target.files[0]);
      },
      onClearImage: function() {
        this.book.hasOldImage = '';
        this.book.image = '';
        this.book.preview = '';
      }
    }
  }
</script>
