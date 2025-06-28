@extends('layouts.app')
@section('content')
	<div class="container mt-5">
		<h1 class="mb-4 text-center">Profumi</h1>

		<div class="row px-4">
			@foreach ($products as $product)
				<div class="col-md-3 my-2">
					<div class="card m-2 h-100">
						<img src="{{ asset($product->img) }}" class="card-img-top object-fit-cover" style="max-height: 300px" alt="">
						<div class="card-body">
							<h5 class="card-title">{{ $product->brand }} - {{ $product->model }}</h5>
							<p class="card-text">{{ $product->type }}</p>
							<p class="card-text"><strong>{{ $product->size_ml }} ml</strong></p>
							<p class="card-text text-success">€ {{ $product->price }}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>

	</div>
@endsection
