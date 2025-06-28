@extends('layouts.admin')

@section('content')
	<div style="width: 30%" class="mx-auto mt-2">

		<div class="card mb-3">
			@if (Str::startsWith($product['img'], 'http'))
				<img src="{{ $product->img }}" class="card-img-top" alt="...">
			@else
				<img src="{{ asset('storage/' . $product->img) }}" class="card-img-top" alt="...">
			@endif

			<div class="card-body">

				<h5 class="card-title">Brand: {{ $product['brand'] }}</h5>
				<p class="card-text">Model: {{ $product['model'] }}</p>
				<p class="card-text">Price: €{{ $product['price'] }} /{{ $product['size_ml'] }}ml</p>
				<p class="card-text"><small class="text-body-secondary">{{ $product['type'] }}</small></p>
				<a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary"> <i
						class="fa-solid fa-pencil"></i></a>
			</div>

		</div>
		<a href="{{ route('admin.products.index') }}">back to the list</a>
	@endsection
