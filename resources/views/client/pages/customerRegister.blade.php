@extends('client.layout.master')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-12 section-title-container my-auto">
			<div class="section-title text-center">Register</div>
			<div class="section-subtitle text-center">Home/Register</div>
		</div>	
	</div>
</div>

<div class="container-fluid register-main-container">
    <div class="container-fluid py-5">       

        <div class="container-fluid bg-white p-3 mb-4 contactUs-shadow" style="width: 50%">
            <div class="text-uppercase">
                <div class="text-center container p-3 col-11">
                    <form>
                        <div class="row justify-content-center pt-4 pb-2">
                            <div class="col-12 align-self-center register-column">
                                <label class="register-labels">Full name:</label>
                        	</div>
                        </div>
                        <div class="row justify-content-center">                        	
	                        <div class="col-12">
	                            <input class="form-control" type="text" required="required" name="email">
	                        </div>
	                    </div>

	                    <div class="row justify-content-center pt-4 pb-2">
                            <div class="col-12 align-self-center register-column">
                                <label class="register-labels">E-mail:</label>
                        	</div>
                        </div>
                        <div class="row justify-content-center">                        	
	                        <div class="col-12">
	                            <input class="form-control" type="text" required="required" name="email">
	                        </div>
	                    </div>

	                    <div class="row justify-content-center pt-4 pb-2">
                            <div class="col-12 align-self-center register-column">
                                <label class="register-labels">Re-type email:</label>
                        	</div>
                        </div>
                        <div class="row justify-content-center">                        	
	                        <div class="col-12">
	                            <input class="form-control" type="text" required="required" name="email">
	                        </div>
	                    </div>

	                    <div class="row justify-content-center pt-4 pb-2">
                            <div class="col-12 align-self-center register-column">
                                <label class="register-labels">Password:</label>
                        	</div>
                        </div>
                        <div class="row justify-content-center">                        	
	                        <div class="col-12">
	                            <input class="form-control" type="text" required="required" name="email">
	                        </div>
	                    </div>

	                    <div class="row justify-content-center pt-4 pb-2">
                            <div class="col-12 align-self-center register-column">
                                <label class="register-labels">Re-type password:</label>
                        	</div>
                        </div>
                        <div class="row justify-content-center">                        	
	                        <div class="col-12">
	                            <input class="form-control" type="text" required="required" name="email">
	                        </div>
	                    </div>	                 

                        <div class="container p-4 mb-2">
                            <div class="row justify-content-center">
                                <div class="col-8 text-center">
                                    <button class=" text-uppercase" type="submit">Sign Up</button>
                                </div>
                            </div>
                        </div> 
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection