@extends('client.layout.master')

@section('content')

<div class="container-fluid contactUs-main-container">
    <div class="container-fluid pb-4">
        <div class="container-fluid mb-4 text-center">
            <div class="contactUs-main-title font-weight-bold">
                Contact Us
            </div>
        </div>

        <div class="container-fluid contactUs-fullContent-container bg-white p-3 contactUs-shadow">
            <div class="text-uppercase">
                <div class="contactUs-form-container text-center container p-3 col-10">
                    <form>
                        <div class="row justify-content-center pt-4 pb-4">
                            <div class="col-2 align-self-center">
                                <label class="contactUs-title">Name</label>
                        </div>
                        <div class="col-10">
                            <input class="form-control" type="text" required="required">
                        </div>
                        </div>
                        <div class="row justify-content-center pb-4">
                            <div class="col-2 align-self-center">
                                <label class="contactUs-title">Email</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="text" required="required">
                            </div>
                        </div>
                        <div class="row justify-content-center pb-4">
                            <div class="col-2 align-self-center">
                                <label class="contactUs-title">Message</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control" rows="8" required="required"></textarea>
                            </div>
                        </div>
                        <div class="container p-4">
                            <div class="row justify-content-center">
                                <div class="col-8 text-center">
                                    <button class="contactUs-submit-button text-uppercase" type="submit">Submit</button>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
               <div class="row justify-content-center pt-4 pb-4">
                    <div class="col-4 offset-1 align-self-center">
                        <div class="contactUs-title font-weight-bold"> Contact Information </div>
                    </div>
                    <div class="col 9">
                        <div class="row justify-content-center contactUs-information-content">
                            <div class="col-2 text-right contactUs-icon align-self-center"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="col-8 align-self-center">57, 11/3L, Sunway University, 47100, Puchong, Selangor</div>
                        </div>
                        <div class="row justify-content-center contactUs-information-content">
                            <div class="col-2 text-right contactUs-icon align-self-center"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="col-8 align-self-center">+03 80724721</div>
                        </div>
                        <div class="row justify-content-center contactUs-information-content">
                            <div class="col-2 text-right contactUs-icon align-self-center"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="col-8 align-self-center">mail@bookie.com</div>
                        </div>
                    </div>
               </div>
            </div>  
        </div>
    </div>
</div>

@endsection