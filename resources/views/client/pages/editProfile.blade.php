@extends('client.layout.master')

@section('content')

<div class="container-fluid editProfile-main-container">
    <div class="container-fluid pb-4">
        <div class="container-fluid mb-4 text-center">
            <div class="editProfile-main-title font-weight-bold">
                Edit Profile
            </div>
        </div>

        <div class="container-fluid editProfile-fullContent-container bg-white p-3 editProfile-shadow">
            <div class="text-uppercase">
                <div class="container">
                    <div class="justify-content-center pt-3 pb-5">
                        <div class="editProfile-profilePic mx-auto">
                        </div>
                    </div>
                    <input type="file" name="file" class="editProfile-inputProfilePic"/>
                    <div class="row  pt-4 pb-3">
                        <div class="col-12">
                                <label class="contactUs-title">Name</label>
                        </div>
                        <div class="col-12">
                            <input class="form-control" name="name" type="text" required="required" placeholder="Liew Wai Xing">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-12">
                                <label class="contactUs-title">Email</label>
                        </div>
                        <div class="col-12">
                            <input class="form-control" name="email" type="text" required="required" placeholder="lwx@gmail.com">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-12">
                                <label class="contactUs-title">Password</label>
                        </div>
                        <div class="col-12">
                            <input class="form-control" name="password" type="text" required="required" placeholder="1234567890Abc">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-12">
                                <label class="contactUs-title">Mobile No</label>
                        </div>
                        <div class="col-12">
                            <input class="form-control" name="mobileNo" type="text" required="required" placeholder="0121535753">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-12">
                            <label class="contactUs-title pr-2">Address</label> 
                            <button class="contactUs-addbtn btn p-1">Add</button>
                        </div>
                        <div class="col-12">
                            <input class="form-control" name="address[]" type="text" required="required" placeholder="16, Jalan USJ 21, Batu 5, 47100, Puchong, Selangor">
                        </div>
                    </div>
                    <div class="container p-4">
                        <div class="row justify-content-center">
                            <div class="col-8 text-center">
                                <button class="contactUs-submit-button text-uppercase" type="submit">Submit</button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection