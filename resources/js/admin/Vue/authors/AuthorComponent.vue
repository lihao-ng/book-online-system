<template>
  <div class="row">
    <div class="col-12">
      <div class="alert alert-danger" role="alert" v-if="error.show">
        {{ error.message[0] }}
      </div>

      <div class="card">
        <div class="card-body py-4 px-5">
          <div class="row">
            <div class="col-sm-6 mb-3">
              <h4>Author Details</h4>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-label">
                <label>Name <span class="star">*</span></label>
                <input type="text" name="name" class="form-control" required="true" placeholder="Enter Name" v-model="author.name">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-label">
                <label>Description <span class="star">*</span></label>
                <textarea name="description" class="form-control" required="true" v-model="author.description"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-label">
                <label>Pen Name </label>
                <input type="text" name="pen_name" class="form-control" v-model="author.penName">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-label">
                <label>Birthday <span class="star">*</span></label>
                <input type="text" name="birthday" class="form-control datepicker" required="true" v-model="author.birthday">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-label">
                <label>Birth Place </label>
                <input type="text" name="birth_place" class="form-control" v-model="author.birthPlace">
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

    <div class="col-12">
      <div class="card mt-5">
        <div class="card-body py-4 px-5">
          <div class="row">
            <div class="col-sm-6 mb-3">
              <h4>Books</h4>
            </div>
          </div>
          <author-books-component :default-books="author.books" @bookChange="onBookChange"></author-books-component>
        </div>
      </div>
    </div>

    <div class="col-12 mt-3">
      <div class="row">
        <div class="col-12 col-md-4 ml-auto">
          <button type="submit" class="btn btn-warning btn-block" @click="onSubmit">Create</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default{
    props: ['defaultAuthor'],
    data: function(){
      return {
        author: {
          name: '',
          description: '',
          penName: '',
          birthday: '',
          birthPlace: '',
          image: [],
          books: ''
        },
        defaultBooks: [],
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
        if(this.defaultAuthor) {
          this.author = this.defaultAuthor;
          this.$set(this.author, 'books', this.defaultAuthor.books);
        }

        var self = this;
        $('.datepicker').on('dp.change', function(e){ 
          self.$set(self.author, 'birthday', e.date.format('YYYY-MM-DD'));
        })
      },
      onSubmit: function() {
        var data = new FormData();
        data.append('name', this.author.name);
        data.append('description', this.author.description);
        data.append('penName', this.author.penName);
        data.append('birthday', this.author.birthday);
        data.append('birthPlace', this.author.birthPlace);
        data.append('image', this.author.image);
        data.append('books', JSON.stringify(this.author.books));
        // var data = {
        //   name: this.author.name,
        //   description: this.author.description,
        //   penName: this.author.penName,
        //   birthday: this.author.birthday,
        //   birthPlace: this.author.birthPlace,
        //   image: this.author.image,
        //   books: this.author.books
        // }

        if(!this.defaultAuthor) {
          var method = 'POST';
          var url = '/admin/authors'
        }else {
          var method = "PUT";
          var url = `/admin/authors/${this.defaultAuthor.id}`;
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
      onBookChange: function(books) {
        this.author.books = books;
      },
      onFileInput: function(e) {  
        // var reader = new FileReader();
        
        // reader.onload = (e) => {
          // this.author.image = {
          //   name: e.target.files[0].name,
          //   size: e.target.files[0].size,
          //   base64: r.target.result 
          // }
        //   this.author.image = e.target.result;
        // }
        // reader.readAsText(e.target.files[0]);
        this.author.image = e.target.files[0];
        // reader.readAsDataURL(e.target.files[0]);
      },
      initializeProperty: function(value, property) {
        if(!value || value == undefined) {
          this.$set(this.author, property, '');
        }
      }
    }
  }
</script>
