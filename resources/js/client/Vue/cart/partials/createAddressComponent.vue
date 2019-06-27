<template>
  <div class="modal fade" id="createAddress">
    <div class="modal-dialog modal-dialog-centered modal-xl">

      <div class="modal-content text-uppercase">
        <div class="container p-4 text-left cartPage-popUp-title">
          <div class="font-weight-bold">shipping & billing detail</div>
        </div>

        <div class="container p-4 col-8">
          <div class="alert alert-danger" role="alert" v-if="error.show">
            <p class="alert-description">{{ error.message }}</p>
          </div>
          
          <div class="row justify-content-center mb-3">
            <div class="col-2 align-self-center">
              <label>Address</label>
            </div>
            <div class="col-10">
              <textarea class="form-control" row="5" required="required" v-model="createAddress"></textarea>
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
    data: function(){
      return {
        createAddress: "",
        error: {
          show: false,
          message: "The address you entered is invalid or it already exists!"
        }
      };
    },
    methods: {
      onSubmit: function(e) {
        e.preventDefault();

        axios.post('customer/address', {address: this.createAddress})
        .then(({data}) => {
          if(!this.error.show) {
            this.error.show = false;
          }       
          $('#createAddress').modal('hide');
          this.createAddress = "";
          this.$emit('onAddressAdded', data);
        }, (error) => {
          this.error.show = true;
        });
      }
    }
  }
</script>