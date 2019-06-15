<template>
  <div>
    <div class="row justify-content-center pt-4 pb-2">
      <div class="col-12 align-self-center register-column">
        <label class="register-labels">Addresses:</label>
        <div class="btn btn-primary" @click="onAddressClick">Add Address</div>
      </div>
    </div>
    <div class="row justify-content-center mt-2" v-for="(address, index) in addresses" :key="index">                          
      <div class="col-11">
        <input type="text" name="addresses[]" class="form-control" placeholder="Enter Address" v-model="address.address">
      </div>
      <div class="col-1">
        <i class="fa fa-remove" @click="onAddressDelete(index)"></i>
      </div>
    </div>
  </div> 
</template>

<script>
  export default{
    props: ['defaultAddresses'],
    data: function(){
      return {
        addresses: [],
        error: {
          show: false,
          message: ""
        }
      };
    },
    mounted: function() {
      if(!this.defaultAddresses) {
        this.addAddress();
        return;
      }

      this.setDefault();
    },
    methods: {
      setDefault: function() {
        this.addresses = this.defaultAddresses;
      },
      onAddressClick: function() {
        this.addAddress();
      },
      onAddressDelete: function(index) {
        if(this.addresses.length <= 1) {
          return;
        }

        this.addresses.splice(index, 1);
      },
      addAddress: function() {
        this.addresses.push({
          address: ''
        });  
      }
    }
  }
</script>