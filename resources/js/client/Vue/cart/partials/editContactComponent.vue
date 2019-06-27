<template>
  <div class="modal fade" id="editContact">
    <div class="modal-dialog modal-dialog-centered modal-xl">

      <div class="modal-content text-uppercase">
        <div class="container p-4 text-left cartPage-popUp-title">
          <div class="font-weight-bold">edit contact</div>
        </div>

        <div class="container p-4 col-8">
          <div class="alert alert-danger" role="alert" v-if="error.show">
            <p class="alert-description">{{ error.message }}</p>
          </div>
          <div class="row justify-content-center mb-4">
            <div class="col-2 align-self-center">
              <label>Contact</label>
            </div>
            <div class="col-10">
              <input class="form-control" type="text" required="required" v-model="mobile">
            </div>
          </div>
          <div class="container p-4">
            <div class="row justify-content-center">
              <div class="col-6 text-center">
                <button class="cartPage-modal-button" type="button" data-dismiss="modal">Cancel</button>
              </div>
              <div class="col-6 text-center">
                <button class="cartPage-modal-button" type="submit" @click="onSubmit">Save</button>
              </div>
            </div>
          </div>  
        </div>
      </div>  
    </div>
  </div>    
</template>

<script>
  export default{
    props: ['contact'],
    data: function(){
      return {
        mobile: "",
        error: {
          show: false,
          message: "The contact you entered is invalid or it already exists!"
        }
      };
    },
    mounted: function() {
      this.mobile = this.contact;
    },
    watch: {
      contact: function(newVal) {
        this.mobile = newVal;
      }
    },
    methods: {
      onSubmit: function(e) {
        e.preventDefault();

        axios.post('customer/mobile', {mobile: this.mobile})
        .then(({data}) => {
          if(!this.error.show) {
            this.error.show = false;
          }
          this.mobile = data;          
          $('#editContact').modal('hide');
          this.$emit('onContactChanged', this.mobile);
        }, (error) => {
          this.error.show = true;
        });
      }
    }
  }
</script>