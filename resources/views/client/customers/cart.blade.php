@extends('client.layout.master')

@section('content')

<div class="container-fluid cartPage-main-container">
  <div class="container-fluid">
    <div class="cartPage-mycart-title font-weight-bold text-center mb-4">
      My Cart
    </div>
  </div>

  <div class="row justify-content-center cartPage-font">
    <!--cart-->
    <div class="cartPage-cart-section row">
      <div>
        <!--first cart -->
        <div class=" col-12 pb-3 mb-4 bg-white cartPage-shadow">
          <div class="row">
            <div class="col-12 col-lg-3">
              <div class="text-center">
                <img src="images/popular2.jpg" class="img-thumbnail cart-image">
              </div>
            </div>

            <div class="col-12 col-lg-9">
              <div class="row cartPage-title-container justify-content-between mr-0 ml-0">
                <div class="cartPage-title-detail-container col-6">
                  <div class="cartPage-title">Details:</div>
                </div>
                <div class="cartPage-title-price-container col-6 col-sm-5">
                  <div class="cartPage-title">Price: RM40.00</div>
                </div>
              </div>

              <div class="row cartPage-detail-content-container">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <span class="cartPage-detail-title">Book Name:</span>
                      Soul<br>
                      <span class="cartPage-detail-title">Author:</span>
                      Sony<br>
                      <span class="cartPage-detail-title">Language:</span>
                      English<br>
                      <span class="cartPage-detail-title">Rating:</span>
                      5/5<br>
                      <span class="cartPage-detail-title">Description:</span> 
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
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

        <!--second cart-->
        <div class="col-12 pb-3 mb-4 bg-white cartPage-shadow">
          <div class="row">
            <div class="col-12 col-lg-3">
              <div class="text-center">
                <img src="images/popular1.jpg" class="img-thumbnail cart-image">
              </div>
            </div>

            <div class="col-12 col-lg-9">
              <div class="row cartPage-title-container justify-content-between mr-0 ml-0">
                <div class="cartPage-title-detail-container col-6">
                  <div class="cartPage-title">Details:</div>
                </div>
                <div class="cartPage-title-price-container col-6 col-sm-5">
                  <div class="cartPage-title">Price: RM48.00</div>
                </div>
              </div>

              <div class="row cartPage-detail-content-container">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <span class="cartPage-detail-title">Book Name:</span>
                      Destroy Me<br>
                      <span class="cartPage-detail-title">Author:</span>
                      Tahereh Mafi<br>
                      <span class="cartPage-detail-title">Language:</span>
                      English<br>
                      <span class="cartPage-detail-title">Rating:</span>
                      5/5<br>
                      <span class="cartPage-detail-title">Description:</span> 
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                      <br>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row mt-3">
                <div class="col-12 cartPage-garbage-numOfOrderBar-container">
                  <input class="cartPage-numOfOrderBar mr-4" type="number" value="1" min="1">
                  <button class="cartPage-garbage-button"><i class=" fa fa-trash" aria-hidden="true"></i></button>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
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
            RM88
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

        <form>
          <div class="pt-3">
            <!--address-->
            <div class="row justify-content-between">
              <div class="col-8"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Address:</div>
                TTDI Plaza, C-2-8 & C-2-9, Jalan Wan Kadir 3, Taman Tun Dr Ismail, 60000 Kuala Lumpur, Wilayah Perseketuan Kuala Lumpur
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
                            <tr>
                              <th scope="row">Liew Wai Xing</th>
                              <td>TTDI PLAZA, C-2-8 & C-2-9, JALAN WAN KADIR 3, TAMAN TUN DR ISMAIL, 60000 KUALA LUMPUR, WILAYAH PERSEKETUAN KUALA LUMPUR</td>
                              <td>01234556789</td>
                              <td>DEFAULT SHIPPING & BILLING ADDRESS</td>
                              <td><label class="align-middle"><input type="radio" name="addressChoosed" checked value="#"></label></td>
                            </tr>
                            <tr>
                              <th scope="row">Liew Wai Xing</th>
                              <td>NO.5 LORONG TEKNOLOGI B, NOUVELLE INDUSTRIAL PARK, TAMAN SAINS SELANGOR 1, PETALING JAYA, KOTA DAMANSARA, 47301 PETALING JAYA, SELANGOR</td>
                              <td>01234556789</td>
                              <td></td>
                              <td> <label><input type="radio" name="addressChoosed" value="#"></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="container p-4">
                        <div class="row justify-content-center">
                          <div class="col-4 text-center">
                            <button class="cartPage-modal-button" type="button" data-dismiss="modal">Cancel</button>
                          </div>
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
              <div class="modal fade" id="createAddress">
                <div class="modal-dialog modal-dialog-centered modal-xl">

                  <div class="modal-content text-uppercase">
                    <div class="container p-4 text-left cartPage-popUp-title">
                      <div class="font-weight-bold">shipping & billing detail</div>
                    </div>

                    <div class="container p-4 col-8">
                      <form>
                        <div class="row justify-content-center mb-4">
                          <div class="col-2 align-self-center">
                            <label>Full Name</label>
                          </div>
                          <div class="col-10">
                            <input class="form-control" type="text" required="required">
                          </div>
                        </div>
                        <div class="row justify-content-center mb-4">
                          <div class="col-2 align-self-center">
                            <label>Telephone</label>
                          </div>
                          <div class="col-10">
                            <input class="form-control" type="text" required="required">
                          </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                          <div class="col-2 align-self-center">
                            <label>Address</label>
                          </div>
                          <div class="col-10">
                            <textarea class="form-control" row="5" required="required"></textarea>
                          </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                          <div class="col-5 offset-2">
                            <select class="form-control">
                              <option selected>City</option>
                              <option value="#">Sample 1</option>
                              <option value="#">Sample 2</option>
                              <option value="#">Sample 3</option>
                            </select>
                          </div>
                          <div class="col-5">
                            <input class="form-control" type="text" required="required" placeholder="Zip Code">
                          </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                          <div class="col-5 offset-2">
                            <select class="form-control">
                              <option selected>State</option>
                              <option value="#">Sample 1</option>
                              <option value="#">Sample 2</option>
                              <option value="#">Sample 3</option>
                            </select>
                          </div>
                          <div class="col-5">
                            <select class="form-control">
                              <option selected>Country</option>
                              <option value="#">Sample 1</option>
                              <option value="#">Sample 2</option>
                              <option value="#">Sample 3</option>
                            </select>
                          </div>
                        </div>
                        <div class="container p-4">
                          <div class="row justify-content-center">
                            <div class="col-6 text-center">
                              <button class="cartPage-modal-button" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6 text-center">
                              <button class="cartPage-modal-button" type="submit" data-dismiss="modal">Save</button>
                            </div>
                          </div>
                        </div>  
                      </form>
                    </div>
                  </div>  
                </div>
              </div>              

            </div>  
            <hr>  
            <!--contact-->
            <div class="row justify-content-between">
              <div class="col-8"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Contact:</div>
                0123753638
              </div>
              <div class="col-4 cartPage-pointer-cursor text-right align-self-center" data-toggle="modal" href="#editContact">
                Edit
              </div>   

              <!-- Edit Contact Modal -->
              <div class="modal fade" id="editContact">
                <div class="modal-dialog modal-dialog-centered modal-xl">

                  <div class="modal-content text-uppercase">
                    <div class="container p-4 text-left cartPage-popUp-title">
                      <div class="font-weight-bold">edit contact</div>
                    </div>

                    <div class="container p-4 col-8">
                      <form>
                        <div class="row justify-content-center mb-4">
                          <div class="col-2 align-self-center">
                            <label>Contact</label>
                          </div>
                          <div class="col-10">
                            <input class="form-control" type="text" required="required">
                          </div>
                        </div>
                        <div class="container p-4">
                          <div class="row justify-content-center">
                            <div class="col-6 text-center">
                              <button class="cartPage-modal-button" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6 text-center">
                              <button class="cartPage-modal-button" type="submit" data-dismiss="modal">Save</button>
                            </div>
                          </div>
                        </div>  
                      </form>
                    </div>
                  </div>  
                </div>
              </div>  

            </div>  
            <hr>  
            <!--Email-->
            <div class="row justify-content-between">
              <div class="col-8"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Email:</div>
                cincaiuser@gmail.com
              </div>
              <div class="col-4 cartPage-pointer-cursor text-right align-self-center" data-toggle="modal" href="#editEmail">
                Edit
              </div>  

              <!-- Edit Email Modal -->
              <div class="modal fade" id="editEmail">
                <div class="modal-dialog modal-dialog-centered modal-xl">

                  <div class="modal-content text-uppercase">
                    <div class="container p-4 text-left cartPage-popUp-title">
                      <div class="font-weight-bold">edit email</div>
                    </div>

                    <div class="container p-4 col-8">
                      <form>
                        <div class="row justify-content-center mb-4">
                          <div class="col-2 align-self-center">
                            <label>email</label>
                          </div>
                          <div class="col-10">
                            <input class="form-control" type="text" required="required">
                          </div>
                        </div>
                        <div class="container p-4">
                          <div class="row justify-content-center">
                            <div class="col-6 text-center">
                              <button class="cartPage-modal-button" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6 text-center">
                              <button class="cartPage-modal-button" type="submit" data-dismiss="modal">Save</button>
                            </div>
                          </div>
                        </div>  
                      </form>
                    </div>
                  </div>  
                </div>
              </div>  
            </div>  
            <hr>
            <!--Remark-->
            <div class="row">
              <div class="col-12"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Remarks:</div>
                <input type="text" class="cartPage-remark-input">
              </div>
            </div>  
          </div>

          <!--collection-->
          <div class="pt-4">
            <div class="row">
              <div class="col-12"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Collection</div>
                <div class="cartPage-select">
                  <select id="collectionType" class="form-control">
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
                TTDI Plaza, C-2-8 & C-2-9, Jalan Wan Kadir 3, Taman Tun Dr Ismail, 60000 Kuala Lumpur, Wilayah Perseketuan Kuala Lumpur
                <div class="cartPage-section-title-container text-uppercase font-weight-bold pt-3">Contact:</div>
                0123753638
              </div>
            </div> 
          </div>

          <!--payment method-->
          <div class="pt-4 pb-1">
            <div class="row">
              <div class="col-12"> 
                <div class="cartPage-section-title-container text-uppercase font-weight-bold">Payment Method</div>
                <div class="cartPage-select">
                  <select class="form-control">
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
                RM88.00
              </div>
            </div> 
          </div>

          <!--checkoutButton-->
          <div class="row pt-2 pb-2">
            <div class="col-12">
              <button class="cartPage-promoCode-button p-3" type="submit">Checkout</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
