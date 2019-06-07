@extends('client.layout.master')
@section('content')
<!------------page title------------------------------------------------------->
<div class="container-fluid">
	<div class="row">
		<div class="col-12 section-title-container my-auto">
			<div class="section-title text-center">Bookstore</div>
			<div class="section-subtitle text-center">Home/Bookstore</div>
		</div>	
	</div>
</div>

<!------------Search bar------------------------------------------------------->
<div class="container-fluid search-bar pt-3 pb-4">
	<div class="row justify-content-center">	
    <div class="col-sm-12 col-md-3 col-lg-2 m-2 ">
	  <input type="text" class="search-bar-elements text-secondary pl-2" placeholder="Book Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
		</div>	
		<div class="dropdown col-sm-12 col-md-3 col-lg-2 m-2">
		  <button class="btn btn-secondary dropdown-toggle search-bar-elements text-secondary d-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		   	Book Category
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" href="#">Action</a>
		    <a class="dropdown-item" href="#">Another action</a>
		    <a class="dropdown-item" href="#">Something else here</a>
		  </div>
		</div>
		<div class="dropdown col-sm-12 col-md-3 col-lg-2 m-2">
		  <button class="btn btn-secondary dropdown-toggle search-bar-elements text-secondary d-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		   	Book Author
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" href="#">Action</a>
		    <a class="dropdown-item" href="#">Another action</a>
		    <a class="dropdown-item" href="#">Something else here</a>
		  </div>
		</div>
		<div class="col-sm-12 col-md-7 col-lg-2 m-2">
			<button type="button" class="btn search-bar-find-button text-light d-block">
			<i class="fa fa-search"></i>
			FIND BOOK</button>
		</div>
	</div>
</div>

<!------------Catalogue------------------------------------------------------->
<div class="container-fluid">	
	<div class="row catalogue-books-display py-5 justify-content-center">
		<!-- book catalogues -->
		<div class="col-xl-7 col-lg-8">
			<div class="row justify-content-center"> 
			  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
			  	<div class="catalogue-books-container container">
				  	<img src="images/newbook1.jpg" class="catalogue-books-image mt-2">
				  	<p class="catalogue-books-name">Destroy me</p>
				  	<i class="catalogue-books-author">Taherah Mafi</i>
				  	<p class="catalogue-books-price">$2.00</p>
				  	<div class="catalogue-books-buttons-div">
					  	<button type="button" class="btn catalogue-books-detail-button">
					  	<i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Detail</button>
					  	<button type="button" class="btn catalogue-books-buy-button">
					  	<i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Buy</button>
					</div>
			  	</div> 
			  </div>
			  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
			  	<div class="catalogue-books-container container">
				  	<img src="images/newbook2.jpg" class="catalogue-books-image mt-2">
				  	<p class="catalogue-books-name">Destroy me</p>
				  	<i class="catalogue-books-author">Taherah Mafi</i>
				  	<p class="catalogue-books-price">$2.00</p>
				  	<div class="catalogue-books-buttons-div">
					  	<button type="button" class="btn catalogue-books-detail-button">
					  	<i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Detail</button>
					  	<button type="button" class="btn catalogue-books-buy-button">
					  	<i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Buy</button>
					</div>
			  	</div> 
			  </div>			
			  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
				<div class="catalogue-books-container container"> 	
				  <img src="images/newbook3.jpg" class="catalogue-books-image mt-2">
				  <p class="catalogue-books-name">Sita</p>
				  <i class="catalogue-books-author">Amish</i>
				  <p class="catalogue-books-price">$32.00</p>
				  <div class="catalogue-books-buttons-div">
					  <button type="button" class="btn catalogue-books-detail-button">
					  <i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
					  Detail</button>
					  <button type="button" class="btn catalogue-books-buy-button">
					  <i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
					  Buy</button>
				  </div>
			    </div>
			  </div>
			</div>
			<div class="row justify-content-center"> 
			  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
			  	<div class="catalogue-books-container container">
				  	<img src="images/popular1.jpg" class="catalogue-books-image mt-2">
				  	<p class="catalogue-books-name">Destroy me</p>
				  	<i class="catalogue-books-author">Taherah Mafi</i>
				  	<p class="catalogue-books-price">$2.00</p>
				  	<div class="catalogue-books-buttons-div">
					  	<button type="button" class="btn catalogue-books-detail-button">
					  	<i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Detail</button>
					  	<button type="button" class="btn catalogue-books-buy-button">
					  	<i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Buy</button>
					</div>
			  	</div> 
			  </div>
			  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
			  	<div class="catalogue-books-container container">
				  	<img src="images/popular2.jpg" class="catalogue-books-image mt-2">
				  	<p class="catalogue-books-name">Destroy me</p>
				  	<i class="catalogue-books-author">Taherah Mafi</i>
				  	<p class="catalogue-books-price">$2.00</p>
				  	<div class="catalogue-books-buttons-div">
					  	<button type="button" class="btn catalogue-books-detail-button">
					  	<i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Detail</button>
					  	<button type="button" class="btn catalogue-books-buy-button">
					  	<i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Buy</button>
					</div>
			  	</div> 
			  </div>			
			  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
				<div class="catalogue-books-container container"> 	
				  <img src="images/popular3.jpg" class="catalogue-books-image mt-2">
				  <p class="catalogue-books-name">Sita</p>
				  <i class="catalogue-books-author">Amish</i>
				  <p class="catalogue-books-price">$32.00</p>
				  <div class="catalogue-books-buttons-div">
					  <button type="button" class="btn catalogue-books-detail-button">
					  <i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
					  Detail</button>
					  <button type="button" class="btn catalogue-books-buy-button">
					  <i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
					  Buy</button>
				  </div>
			    </div>
			  </div>
			</div>
			<div class="row justify-content-center"> 
			  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
			  	<div class="catalogue-books-container container">
				  	<img src="images/featured1.jpg" class="catalogue-books-image mt-2">
				  	<p class="catalogue-books-name">Destroy me</p>
				  	<i class="catalogue-books-author">Taherah Mafi</i>
				  	<p class="catalogue-books-price">$2.00</p>
				  	<div class="catalogue-books-buttons-div">
					  	<button type="button" class="btn catalogue-books-detail-button">
					  	<i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Detail</button>
					  	<button type="button" class="btn catalogue-books-buy-button">
					  	<i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Buy</button>
					</div>
			  	</div> 
			  </div>
			  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
			  	<div class="catalogue-books-container container">
				  	<img src="images/featured2.jpg" class="catalogue-books-image mt-2">
				  	<p class="catalogue-books-name">Destroy me</p>
				  	<i class="catalogue-books-author">Taherah Mafi</i>
				  	<p class="catalogue-books-price">$2.00</p>
				  	<div class="catalogue-books-buttons-div">
					  	<button type="button" class="btn catalogue-books-detail-button">
					  	<i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Detail</button>
					  	<button type="button" class="btn catalogue-books-buy-button">
					  	<i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
					  	Buy</button>
					</div>
			  	</div> 
			  </div>			
			  <div class="col-lg-4 col-md-2 col-sm-12 catalogue-books-row">
				<div class="catalogue-books-container container"> 	
				  <img src="images/popular4.jpg" class="catalogue-books-image mt-2">
				  <p class="catalogue-books-name">Sita</p>
				  <i class="catalogue-books-author">Amish</i>
				  <p class="catalogue-books-price">$32.00</p>
				  <div class="catalogue-books-buttons-div">
					  <button type="button" class="btn catalogue-books-detail-button">
					  <i class="fa fa-paper-plane catalogue-books-buttons-icon" aria-hidden="true"></i>
					  Detail</button>
					  <button type="button" class="btn catalogue-books-buy-button">
					  <i class="fa fa-shopping-cart catalogue-books-buttons-icon" aria-hidden="true"></i>
					  Buy</button>
				  </div>
			    </div>
			  </div>
			</div>
		</div>	
		<!-- filter, products, categories, products -->
		<div class="col-lg-2 books-row">
			<!-- product filter -->
			<div class="row">
				<div class="col">
			  		<div class="container catalogue-filter-container">
			  			<p class="right-section-title">FILTER BY PRICE</p>
			  			<button type="button" class="catalogue-filter-button">Filter</button>
			  		</div>
			  	</div>
			</div>
			<!-- Top-rated -->
			<div class="row">
				<div class="col">
			  		<div class="container catalogue-side-books-container">
			  			<p class="right-section-title">TOP RATED PRODUCTS</p>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  		</div>
			  	</div>
			</div>
			<!-- categories -->
			<div class="row justify-content-center">
				<div class="col">
			  		<div class="container book-categories-container">
			  			<p class="right-section-title">PRODUCT CATEGORIES</p>
			  			<a class="categories-button" href="#">Drama</a>
			  			<ul class="book-categories-list">
						  <li><a class="categories-button" href="#">Insipration</a></li>
						  <li><a class="categories-button" href="#">Love story</a></li>						  
						</ul>
						<a class="categories-button" href="#">Life style</a>
			  			<ul class="book-categories-list">
						  <li><a class="categories-button" href="#">Business</a></li>
						  <li><a class="categories-button" href="#">Culture</a></li>						  
						</ul>
						<a class="categories-button" href="#">Business</a>
						<a class="categories-button" href="#">Culture</a>
			  		</div>
			  	</div>
		  	</div>
		  	<!-- Products -->
		  	<div class="row">
				<div class="col">
			  		<div class="container catalogue-side-books-container">
			  			<p class="right-section-title">PRODUCTS</p>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="container-fluid book-section">
			  				<div class="row">
			  					<div class="col-lg-5 col-sm-2 col-3">
			  						<img src="images/popular4.jpg" class="book-image">
			  					</div>
			  					<div class="col-lg-7 col-sm-10 col-9 side-books-description-col">
			  						<p class="book-name">The Glassblower</p>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<i class="fa fa-star stars-icon" aria-hidden="true"></i>
			  						<p class="book-price">$20.00</p>
			  					</div>
			  				</div>
			  			</div>
			  		</div>
			  	</div>
			</div>
		</div>	
	</div>
</div>
@endsection