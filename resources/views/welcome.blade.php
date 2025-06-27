@extends('layouts.app')
@section('content')
	<div class="jumbotron p-5 mb-4 bg-light rounded-3">
		<div class="container mt-5">
			<h1 class="mb-4">Profumi</h1>

			<div class="row">
				@dd($products)
				<!--
						qui inizia il ciclo	($products as $product)
			<div class="col-md-4">
									<div class="card mb-4">
										<img src="{{ asset($product->img) }}" class="card-img-top" alt="{{ $product->brand }} {{ $product->model }}">
										<div class="card-body">
											<h5 class="card-title">{{ $product->brand }} - {{ $product->model }}</h5>
											<p class="card-text">{{ $product->type }}</p>
											<p class="card-text"><strong>{{ $product->size_ml }} ml</strong></p>
											<p class="card-text text-success">€ {{ number_format($product->price, 2, ',', '.') }}</p>
										</div>
									</div>
								</div>
			qui finisce
							-->
			</div>
		</div>
	</div>
@endsection
