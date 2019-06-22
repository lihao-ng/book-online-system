<template>
  <div class="container-fluid cartPage-main-container">
    <div class="container-fluid ">
      <div class="cartPage-mycart-title font-weight-bold text-center mb-4">
        My Cart
      </div>

      <div class="alert alert-danger" role="alert" v-if="error.show">
        {{ error.message[0] }}
      </div>
    </div>

    <div class="row justify-content-center cartPage-font">
      <div class="cartPage-cart-section">
        <paginate name="itemPagination" :list="items" :per="3" v-if="items.length">
          <display-cart-items-component v-for="(item, index) in paginated('itemPagination')" :default-item="item" :index="index" :key="item.id" @onItemChanged="onItemChange" @onItemDeleted="onItemDelete"></display-cart-items-component>
        </paginate>
        <paginate-links for="itemPagination" :limit="5" :show-step-links="true" :step-links="{ next: 'Next', prev: 'Previous' }" v-if="items.length"></paginate-links>
      </div>

      <!--checkout -->
      <div class="cartPage-checkout-section col-10 col-lg-3 offset-lg-1 mb-4">
        <!-- first page of checkout-->      
        <div id="CheckoutCollapse" class="p-3 bg-white text-uppercase cartPage-section-title-container cartPage-shadow collapse show">
          <div class="row">
            <div class="col-12">
              Apply Promo Code:
            </div>
          </div>
          <div class="row cartPage-promoCode-container justify-content-center ">
            <div class="col-6 pl-3 pr-1">
              <input class="cartPage-promoCode-inputfield" type="text" placeholder="BOOKISGOOD">
            </div>
            <div class="col-6 pl-1 pr-3">
              <button class="cartPage-promoCode-button" type="button">Apply</button>
            </div>
          </div>
          <div class="row mt-4 mb-4">
            <div class="col-6">
              Total incl. gst
            </div>
            <div class="col-6 text-right font-weight-bold">
              RM {{ totalPrice }}
            </div>
          </div>
          <div class="row cartPage-promoCode-container">
            <div class="col-12">
              <button class=" cartPage-promoCode-button" type="button" data-toggle="collapse" href="#CheckoutCollapse">Checkout</button>
            </div>
          </div>
        </div>

        <!--second page of checkout-->
        <div id="CheckoutCollapse" class= "p-3 bg-white cartPage-promoCode-title-container cartPage-shadow collapse">
          <div class="w-100 pb-3 ml-0 mr-0 text-center text-uppercase cartPage-backButton-container">
            <div class="cartPage-backButton" data-toggle="collapse" href="#CheckoutCollapse" ><i class="fa fa-angle-left"></i></div>
            <div class="cartPage-section-title-container font-weight-bold">Billing Address</div>
          </div>

          <div class="pt-3">
            <!--address-->
            <div class="row justify-content-between">
              <div class="col-8"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Address:</div>
                <span class="text-uppercase">{{ addressPicked }}</span>
              </div>
              <div class="cartPage-pointer-cursor col-4 text-right align-self-center" data-toggle="modal" href="#editAddress">
                Edit
              </div>

              <!-- Change Address Modal -->
              <div class="modal fade" id="editAddress">
                <div class="modal-dialog modal-dialog-centered modal-xl">

                  <div class="modal-content text-uppercase">
                    <div class="container p-4">
                      <div class="row justify-content-between cartPage-popUp-title">
                        <div class="col-5 font-weight-bold">shipping & billing detail</div>
                        <div class="cartPage-pointer-cursor col-5 text-right font-weight-bold" data-toggle="modal" data-target="#createAddress" data-dismiss="modal">add new address</div>
                      </div>
                    </div> 

                    <form>
                      <div class="table-responsive">
                        <table class="table text-center">
                          <thead class="cartPage-table-head">
                            <tr>
                              <th scope="col" style="width: 15%">full name</th>
                              <th scope="col" style="width: 40%">Address</th>
                              <th scope="col" style="width: 15%">Phone Number</th>
                              <th scope="col" style="width: 20%"></th>
                              <th scope="col" style="width: 10%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(address, index) in addresses" :key="address.id">
                              <th scope="row">{{ customer.name }}</th>
                              <td>{{ address.address }}</td>
                              <td>{{ customer.mobile }}</td>
                              <td v-if="index == 0">DEFAULT SHIPPING & BILLING ADDRESS</td>
                              <td v-else></td>
                              <td><label class="align-middle"><input type="radio" name="addressChoosed" :checked="index == 0" @change="onAddressChange(index)"></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="container p-4">
                        <div class="row justify-content-center">
                          <div class="col-4 text-center">
                            <button class="cartPage-modal-button" type="submit" data-dismiss="modal">Save</button>
                          </div>
                        </div>
                      </div>  
                    </form>   
                  </div>
                </div>
              </div>

              <!-- Create Address Modal -->
              <create-address-component @onAddressAdded="onAddressAdd"></create-address-component>                        
            </div>  
            <hr>  
            <!--contact-->
            <div class="row justify-content-between">
              <div class="col-8"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Contact:</div>
                {{ customer.mobile }}
              </div>
              <div class="col-4 cartPage-pointer-cursor text-right align-self-center" data-toggle="modal" href="#editContact">
                Edit
              </div>   

              <!-- Edit Contact Modal -->
              <edit-contact-component :contact="customer.mobile" @onContactChanged="onContactChange"></edit-contact-component>
            </div>  
            <hr>  
            <!--Email-->
            <div class="row justify-content-between">
              <div class="col-8"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Email:</div>
                {{ customer.email }}
              </div>
              <div class="col-4 cartPage-pointer-cursor text-right align-self-center" data-toggle="modal" href="#editEmail">
                Edit
              </div>  

              <edit-email-component :default-email="customer.email"></edit-email-component>
            </div>  
            <hr>
            <!--Remark-->
            <div class="row">
              <div class="col-12"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Remarks:</div>
                <input type="text" class="cartPage-remark-input" v-model="remarks">
              </div>
            </div>  
          </div>

          <!--collection-->
          <div class="pt-4">
            <div class="row">
              <div class="col-12"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Collection</div>
                <div class="cartPage-select">
                  <select id="collectionMethod" class="form-control">
                    <option value="selfCollection" selected>Self-Collection</option>
                    <option value="delivery">Delivery</option>
                  </select>
                </div>
              </div>
            </div> 
          </div>
          <div id="selfCollectionSelected" class="pt-4 pb-4 cartPage-selfCollection-container">
            <div class="row">
              <div class="col-12"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Address:</div>
                <span class="text-uppercase">{{ addressPicked }}</span>
                <div class="cartPage-section-title-container text-uppercase font-weight-bold pt-3">Contact:</div>
                {{ customer.mobile }}
              </div>
            </div> 
          </div>

          <!--payment method-->
          <div class="pt-4 pb-1">
            <div class="row">
              <div class="col-12"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Payment Method</div>
                <div class="cartPage-select">
                  <select id="paymentMethod" class="form-control">
                    <option value="creditCard" selected>Credit Card</option>
                    <option value="onlineBanking">Online Banking</option>
                    <option value="cash">Cash</option>
                    <option value="instalment">Instalment</option>
                  </select>
                </div>
              </div>
            </div> 
          </div>

          <!--totalPrice-->
          <div class="pt-4 pb-2">
            <div class="row justify-content-between cartPage-totalPrice-container font-weight-bold">
              <div class="col-2"> 
                TOTAL
              </div>
              <div class="col-6 text-right"> 
                RM{{ totalPrice }}
              </div>
            </div> 
          </div>

          <!--checkoutButton-->
          <div class="row pt-2 pb-2">
            <div class="col-12">
              <button class="cartPage-promoCode-button p-3" type="submit" @click="onSubmit">Checkout</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default{
    props: ['defaultCustomer'],
    data: function(){
      return {
        customer: {},
        items: [],
        addresses: [],
        addressPicked: 0,
        remarks: '',
        totalPrice: 0,
        paginate: ['itemPagination'],
        error: {
          show: false,
          message: ''
        }
      };
    },
    mounted: function() {
      this.setDefault();
    },
    methods: {
      setDefault: function() {
        this.items = this.defaultCustomer.books;
        this.customer = this.defaultCustomer;
        this.addresses = this.defaultCustomer.addresses;
        this.addressPicked = this.addresses[0].address;
        this.calPrice();
      },
      calPrice: function() {
        this.totalPrice = 0;

        this.items.forEach((item) => {
          var amount = item.amount;
          var bookPrice = item.book.price;
          this.totalPrice += amount * bookPrice;
        });
      },
      onItemChange: function(item, index) {
        var data = {
          book: item.book.id,
          amount: item.amount
        }

        axios.post('/cart-update', data)
        .then(({data}) => {
          this.items[index] = item;
          this.calPrice();
        }, (error) => {});
      },
      onItemDelete: function(item, index) {
        axios.post('/cart-delete', {book: item.book.id})
        .then(({data}) => {
          this.items.splice(index, 1);
          this.calPrice();
        }, (error) => {});
      },
      onAddressAdd: function(addresses) {
        this.addresses = addresses;
      },
      onAddressChange: function(index) {
        this.addressPicked = this.addresses[index].address;
      },
      onContactChange: function(mobile) {
        this.customer.mobile = mobile;
      },
      onSubmit: function() {
        var collection = $('#collectionMethod').val();
        var payment = $('#paymentMethod').val();
        var data = {
          address: this.addressPicked,
          items: this.items,
          remark: this.remarks,
          collection: collection,
          payment: payment
        }

        axios.post('/checkout', data, {responseType: 'arraybuffer'})
        .then(({data}) => {
          this.items = [];
          let blob = new Blob([data], { type: 'application/pdf' });
          let link = document.createElement('a');
          link.href = window.URL.createObjectURL(blob);
          link.download = 'invoice.pdf';
          link.click();

          swal.fire(
            'Great!',
            'Your items have been checkout and is being prepared!',
            'success'
            )
        }, (error) => {
          this.error.show = true;
          var errors = JSON.parse(Buffer.from(error.response.data).toString('utf8'));
          var errorObj =  _.values(errors)[0];
          this.error.message = errorObj[Object.keys(errorObj)[0]];
          $(window).scrollTop(0);
        });
      }
    }
  }
</script>
