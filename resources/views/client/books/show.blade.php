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

<!------------Product outer container------------------------------------------------------->
<div class="container-fluid" style="background-color: #edf3f4">
	<div class="row justify-content-center">
		<div class="col-xl-9 col-11 mt-5 product-outer-container">
			<div class="row justify-content-center">
				<div class="col-md-5 col-12 text-center">
					<img src="{{ $book['image'] }}" class="product-image">
				</div>
				<div class="col-md-6 col-11 product-description-container">
					<div class="row">
						<div class="col-11">			
							<p class="product-title">{{ $book['title'] }}</p>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<i class="fa fa-star stars-icon d-inline-block" aria-hidden="true"></i>
							<a class="product-customer-review-word d-inline-block" href="#"> (2 customer review)</a>
							<p class="product-description">{{ $book['description'] }}</p>
							<div class="container product-details-container">
								<p class="product-price">RM {{ $book['price'] }}</p>
								<p class="product-stock-available">{{ $book['stock'] }} in stock</p>
								<a href="{{ route('books.add.cart', $book['id']) }}">
									<button class="product-add-to-cart-button">Add to cart</button>				 
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-11">
							<p class="product-categories-and-tags">Categories: 
								@php
								$lastCategory = count($book['categories']);
								@endphp

								@foreach($book['categories'] as $key => $category)
								<a class="product-categories-and-tags-link" href="#">
									{{ $category['name'] }}

									@if($key + 1 < $lastCategory)
									,
									@endif
								</a> 
								@endforeach
							</p>
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
							<th>Publisher</th>
							<td>{{ $book['publisher'] }}</td>
						</tr>
						<tr>
							<th>Language</th>
							<td>{{ $book['language'] }}</td>
						</tr>
						<tr>
							<th>ISBN</th>
							<td>{{ $book['isbn'] }}</td>
						</tr>
						<tr>
							<th>Released</th>
							<td>{{ $book['publicationDate'] }}</td>
						</tr>
					</table>
				</div>
				<div class="col-lg-6 col-11">
					<p class="product-page-section-titles">About The Author</p>
					@if(!empty($book['authors']))
					<img src="{{ $book['authors'][0]['image'] }}" class="product-author-img">
					<p class="product-author-name">{{ $book['authors'][0]['name'] }}</p>					
					<p class="product-author-bio">{{ $book['authors'][0]['description'] }}</p>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-xl-9 col-11 product-outer-container mb-5">
			<div class="row justify-content-center">
				<div class="col-11 description-review-title-container">
					<p class="product-description-title d-inline">Description</p>					
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-11 mb-3">
					<p class="product-description">{{ $book['description'] }}</p>
				</div>			
			</div>
		</div>
	</div>
</div>

<!------------products you may like------------------------------------------------------>

<div class="container-fluid">
	<div class="row recommended-books-title-display justify-content-center">
		@if(!empty($randomBooks))
		<div class="col-lg-10 col-11">
			<p class="recommended-product-title">You may also like...</p>
		</div>
	</div>
	<div class="row recommended-books-display justify-content-center pb-4">		
		@foreach($randomBooks as $randomBook)
		<div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 mx-lg-3 recommended-books-row">
			<div class="recommended-books-container">
				<img src="{{ $randomBook['image'] }}" class="recommended-books-image mt-2">
				<p class="recommended-books-name">{{ $randomBook['title'] }}</p>
				@if(!empty($randomBook['authors']))
				<i class="recommended-books-author">{{ $randomBook['authors'][0]['name'] }}</i>
				@endif
				<p class="recommended-books-price">RM {{ $randomBook['price'] }}</p>
				<div class="recommended-books-buttons-div">
					<a href="{{ route('books.show', $randomBook['id']) }}">
						<button type="button" class="btn recommended-books-detail-button">
							<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
							Detail
						</button>
					</a>
					<button type="button" class="btn recommended-books-buy-button">
						<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div>
			</div> 
		</div>	
		@endforeach	
	</div>
	@endif
</div>

<!------------Related products------------------------------------------------------>
<div class="container-fluid">
	<div class="row related-books-title-display justify-content-center">
		@if(!empty($relatedBooks))
		<div class="col-lg-10 col-11">
			<p class="related-product-title">Related products</p>
		</div>
	</div>
	<div class="row related-books-display justify-content-center pb-4">		
		@foreach($relatedBooks as $relatedBook)
		<div class="col-12 col-sm-6 col-lg-2 p-sm-1 p-2 mx-lg-3 recommended-books-row">
			<div class="recommended-books-container">
				<img src="{{ $relatedBook['image'] }}" class="recommended-books-image mt-2">
				<p class="recommended-books-name">{{ $relatedBook['title'] }}</p>
				@if(!empty($relatedBook['authors']))
				<i class="recommended-books-author">{{ $relatedBook['authors'][0]['name'] }}</i>
				@endif
				<p class="recommended-books-price">RM {{ $relatedBook['price'] }}</p>
				<div class="recommended-books-buttons-div">
					<a href="{{ route('books.show', $relatedBook['id']) }}">
						<button type="button" class="btn recommended-books-detail-button">
							<i class="fa fa-paper-plane recommended-books-buttons-icon" aria-hidden="true"></i>
							Detail
						</button>
					</a>
					<button type="button" class="btn recommended-books-buy-button">
						<i class="fa fa-shopping-cart recommended-books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div>
			</div> 
		</div>
		@endforeach
	</div>
	@endif
</div>
@endsection