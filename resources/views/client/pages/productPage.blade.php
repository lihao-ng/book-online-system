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

<!------------Product outer container------------------------------------------------------->
<div class="container-fluid" style="background-color: #edf3f4">
	<div class="row justify-content-center">
		<div class="col-xl-9 col-11 mt-5 product-outer-container">
			<div class="row justify-content-center">
				<div class="col-md-5 col-12 text-center">
					<img src="images/newbook1.jpg" class="product-image">
				</div>
				<div class="col-md-6 col-11 product-description-container">
					<div class="row">
						<div class="col-11">			
							<p class="product-title"> Lyrics of the Lalala Musical</p>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<a class="product-customer-review-word d-inline-block" href="#"> (2 customer review)</a>
							<p class="product-description">What can you do to save money with online shopping? You may be wondering if finding coupons and sales is time consuming. If you aren’t into that, there are other options. You simply need to heed the tips in this piece and act on them.</p>
							<div class="container product-details-container">
								<p class="product-price">$2.00</p>
								<p class="product-stock-available">280 in stock</p>
								<input type="text" class="product-quantity" step="1" min="1" max="260" name="quantity" value="1" inputmode="numeric" title="Qty">
								<button class="product-add-to-cart-button">Add to cart</button>				 
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-11">
							<p class="product-categories-and-tags">Categories: <a class="product-categories-and-tags-link" href="#">Culture</a> <a class="product-categories-and-tags-link" href="#">Life Style</a></p>
							<p class="product-categories-and-tags">Tags: <a class="product-categories-and-tags-link" href="#">Dream</a> <a class="product-categories-and-tags-link" href="#">Music</a> <a class="product-categories-and-tags-link" href="#">Sound</a></p>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-xl-9 col-11 product-outer-container">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-11 mb-4">
					<p class="product-page-section-titles">Book Details</p>
					<table class="product-details-table">
						<tr>
							<th>Pages</th>
							<td>133 Pages</td>
						</tr>
						<tr>
							<th>Cover Design</th>
							<td>Rebecca L.</td>
						</tr>
						<tr>
							<th>Publisher</th>
							<td>Spartan S & S</td>
						</tr>
						<tr>
							<th>Language</th>
							<td>English</td>
						</tr>
						<tr>
							<th>ISBN</th>
							<td>7787555</td>
						</tr>
						<tr>
							<th>Released</th>
							<td>July 2013</td>
						</tr>
					</table>
				</div>
				<div class="col-lg-6 col-11 mt-5">
					<p class="product-page-section-titles">About The Author</p>
					<img src="images/author1.jpg" class="product-author-img">
					<p class="product-author-name">Saifudin A.</p>					
					<p class="product-author-bio">How to Build a Successful Blog Business is a straight forward guide to building a publishing business online that covers everything from choosing a niche to hiring staff, registering a business to selling it. Finding traffic to monetizing it whether you are interested in creating an additional income stream or building a fully-fledged business, this is an essential read for web entrepreneurs and online publishers.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-xl-9 col-11 product-outer-container mb-5">
			<div class="row justify-content-center">
				<div class="col-11 description-review-title-container">
					<p class="product-description-title d-inline">Description</p>
					<a class="product-review-title d-inline" href="#">Reviews(2)</a>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-11 mb-3">
					<p class="product-description">If you want to buy books online, you’ll get a better deal if you get them used. Depending on the condition you get them in, you may just end up paying a few cents plus shipping. Make sure you read through the description of the book to see if there are any damages you should be aware of.</p>

					<p class="product-description">Be sure to read everything about the item that you want to buy. A picture of a product can be deceiving. They can make products look much smaller or bigger that they really are. Reading the description will allow you to be confident in the item you are purchasing.</p>

					<p class="product-description">Look into online shopping clubs. Sites like ebates.com have some tremendous offers. You not only find out about sales going on at different sites, but they pay you a percentage of your purchase when you buy from those sites. It is a great way to get a bonus check every four months and get the things you need.</p>

					<p class="product-description">Be aware of shipping order laws for online merchants. The company is supposed to send your order within the time frame listed in its ad. By law, they have 30 days to send you your order or give you an option to cancel your order. If you do not receive your order within this time frame, call the company to let them know.</p>
				</div>			
			</div>
		</div>
	</div>
</div>

<!------------products you may like------------------------------------------------------>
<div class="container-fluid">
	<div class="row recommended-books-title-display justify-content-center">
	  <div class="col-lg-10 col-11">
	  	<p class="recommended-product-title">You may also like...</p>
	  </div>
	</div>
	<div class="row recommended-books-display justify-content-center pb-4">		
	  <div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 mr-lg-3 recommended-books-row">
	  	<div class="recommended-books-container">
		  	<img src="images/popular1.jpg" class="recommended-books-image mt-2">
		  	<p class="recommended-books-name">Destroy me</p>
		  	<i class="recommended-books-author">Taherah Mafi</i>
		  	<p class="recommended-books-price">$2.00</p>
		  	<div class="recommended-books-buttons-div">
			  	<button type="button" class="btn recommended-books-detail-button">
			  	<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
			  	<a href="{{ route('productPage') }}">Detail</a>
			  	</button>
			  	<button type="button" class="btn recommended-books-buy-button">
			  	<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Buy</button>
			</div>
	  	</div> 
	  </div>
	 	<div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 mx-lg-3 recommended-books-row">	  
	 		<div class="recommended-books-container">
		  	<img src="images/popular2.jpg" class="recommended-books-image mt-2">
		  	<p class="recommended-books-name">Soul</p>
		  	<i class="recommended-books-author">Whoever</i>
		  	<p class="recommended-books-price">$23.00</p>
		  	<div class="recommended-books-buttons-div">
			  	<button type="button" class="btn recommended-books-detail-button">
			  	<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Detail</button>
			  	<button type="button" class="btn recommended-books-buy-button">
			  	<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Buy</button>
			</div>
		  </div>
	  </div>
	  <div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 mx-lg-3 recommended-books-row">
	  	<div class="recommended-books-container"> 	
		  	<img src="images/popular3.jpg" class="recommended-books-image mt-2">
		  	<p class="recommended-books-name">Sita</p>
		  	<i class="recommended-books-author">Amish</i>
		  	<p class="recommended-books-price">$32.00</p>
		  	<div class="recommended-books-buttons-div">
			  	<button type="button" class="btn recommended-books-detail-button">
			  	<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Detail</button>
			  	<button type="button" class="btn recommended-books-buy-button">
			  	<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Buy</button>
			</div>
		  </div>
	  </div>
	  <div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 ml-lg-3 recommended-books-row">
	  	<div class="recommended-books-container">
		  	<img src="images/popular4.jpg" class="recommended-books-image mt-2	">
		  	<p class="recommended-books-name">Soaring</p>
		  	<i class="recommended-books-author">Kristen Ashley</i>
		  	<p class="recommended-books-price">$12.00</p>
		  	<div class="recommended-books-buttons-div">
			  	<button type="button" class="btn recommended-books-detail-button">
			  	<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Detail</button>
			  	<button type="button" class="btn recommended-books-buy-button">
			  	<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Buy</button>
			</div>
		  </div>
	  </div>		
	</div>
</div>

<!------------Related products------------------------------------------------------>
<div class="container-fluid">
	<div class="row related-books-title-display justify-content-center">
	  <div class="col-lg-10 col-11">
	  	<p class="related-product-title">Related products</p>
	  </div>
	</div>
	<div class="row related-books-display justify-content-center pb-4">		
	  <div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 mr-lg-3 recommended-books-row">
	  	<div class="recommended-books-container">
		  	<img src="images/popular1.jpg" class="recommended-books-image mt-2">
		  	<p class="recommended-books-name">Destroy me</p>
		  	<i class="recommended-books-author">Taherah Mafi</i>
		  	<p class="recommended-books-price">$2.00</p>
		  	<div class="recommended-books-buttons-div">
			  	<button type="button" class="btn recommended-books-detail-button">
			  	<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
			  	<a href="{{ route('productPage') }}">Detail</a>
			  	</button>
			  	<button type="button" class="btn recommended-books-buy-button">
			  	<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Buy</button>
			</div>
	  	</div> 
	  </div>
	 	<div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 mx-lg-3 recommended-books-row">	  
	 		<div class="recommended-books-container">
		  	<img src="images/popular2.jpg" class="recommended-books-image mt-2">
		  	<p class="recommended-books-name">Soul</p>
		  	<i class="recommended-books-author">Whoever</i>
		  	<p class="recommended-books-price">$23.00</p>
		  	<div class="recommended-books-buttons-div">
			  	<button type="button" class="btn recommended-books-detail-button">
			  	<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Detail</button>
			  	<button type="button" class="btn recommended-books-buy-button">
			  	<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Buy</button>
			</div>
		  </div>
	  </div>
	  <div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 mx-lg-3 recommended-books-row">
	  	<div class="recommended-books-container"> 	
		  	<img src="images/popular3.jpg" class="recommended-books-image mt-2">
		  	<p class="recommended-books-name">Sita</p>
		  	<i class="recommended-books-author">Amish</i>
		  	<p class="recommended-books-price">$32.00</p>
		  	<div class="recommended-books-buttons-div">
			  	<button type="button" class="btn recommended-books-detail-button">
			  	<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Detail</button>
			  	<button type="button" class="btn recommended-books-buy-button">
			  	<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Buy</button>
			</div>
		  </div>
	  </div>
	  <div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 ml-lg-3 recommended-books-row">
	  	<div class="recommended-books-container">
		  	<img src="images/popular4.jpg" class="recommended-books-image mt-2	">
		  	<p class="recommended-books-name">Soaring</p>
		  	<i class="recommended-books-author">Kristen Ashley</i>
		  	<p class="recommended-books-price">$12.00</p>
		  	<div class="recommended-books-buttons-div">
			  	<button type="button" class="btn recommended-books-detail-button">
			  	<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Detail</button>
			  	<button type="button" class="btn recommended-books-buy-button">
			  	<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
			  	Buy</button>
			</div>
		  </div>
	  </div>		
	</div>
</div>
@endsection