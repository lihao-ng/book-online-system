<template>
  <div class="row pb-4">
    <div class="col-12">
      <label class="contactUs-title pr-2">Address</label> 
      <div class="contactUs-addbtn btn p-1" @click="onAddressClick">Add</div>
    </div>
    <div class="col-12">
      <div class="row mt-2" v-for="(address, index) in addresses" :key="index">
        <div class="col-11">
          <input type="text" name="addresses[]" class="form-control" placeholder="Enter Address" v-model="address.address">
        </div>
        <div class="col-1">
          <i class="fa fa-remove" @click="onAddressDelete(index)"></i>
        </div>
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