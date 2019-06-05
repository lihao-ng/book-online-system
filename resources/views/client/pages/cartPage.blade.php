@extends('client.layout.master')

@section('content')

<div class="container-fluid">
      <div class="row cartPage-main-container justify-content-around">
        <div class="col-sm-12 col-md-6 col-lg-7">
          <div class="row">
            <div class="col-12 col-lg-3">
              <div class="form-check confirm-purchase-button">
                <input class="form-check-input position-static " type="checkbox" id="blankCheckbox" value="#">
              </div>
              <div class="text-center">
                <img src="images/popular2.jpg" class="img-thumbnail cart-image">  
              </div>
            </div>

            <div class="col-12 col-lg-9 ">
              <div class="row cartPage-title-container justify-content-between">
                <div class="col-4">
                  <div class="cartPage-title">Details:</div>
                </div>
                <div class="col-4">
                  <div class="cartPage-title">Price:</div>
                </div>
              </div>

              <div class="row">
                  <div class="col-12">
                  <div class="row">
                  <div class="col-12">
                    <div class="cartPage-detail-content">Book Name:</div>
                    <div class="cartPage-detail-content">Author:</div>
                    <div class="cartPage-detail-content">Language:</div>
                    <div class="cartPage-detail-content">Rating:</div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-12">
                      <div class="cartPage-detail-content">Description:</div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-4 col-lg-3">
          <div class="row">
            <div class="col-12">
                <div class="cartPage-title">Apply Promo Code:</div>
            </div>
          </div>
        </div>
      </div>
    </div>    
@endsection