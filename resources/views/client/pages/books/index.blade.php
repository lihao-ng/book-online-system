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

<catalog-search-component :top-rated-books="{{ json_encode($ratingBooks) }}" :bestseller-books="{{ json_encode($bestsellerBooks) }}"></catalog-search-component>

<!------------Catalogue------------------------------------------------------->
@endsection