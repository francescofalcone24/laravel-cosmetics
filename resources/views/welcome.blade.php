@extends('layouts.app')
@section('content')
	{{-- jumbo --}}
	<div class="container-fluid m-0 p-0">
		<img style="width: 100% ; height:41rem; object-fit:cover" src="{{ asset('/img/jumbo-profumi.jpg') }}" alt="">
	</div>
	{{-- Prodotti --}}
	<div class="container my-5">
		<h1 class="mb-4 text-center">Profumi</h1>

		<div class="row px-4">
			@foreach ($products as $product)
				<div class="col-md-3 my-2">
					<div class="card m-2 h-100">
						@if (Str::startsWith($product->img, 'http'))
							<img src="{{ $product->img }}" class="card-img-top" alt="..." style="transition:transform 0.3s ease;"
								onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
						@else
							<img src="{{ asset('storage/' . $product->img) }}" class="card-img-top" alt="..."
								style="transition:transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'"
								onmouseout="this.style.transform='scale(1)'">
						@endif
						{{-- <img src="{{ asset($product->img) }}" class="card-img-top object-fit-cover" style="max-height: 300px" alt=""> --}}
						<div class="card-body pb-0 pt-4">
							<h5 class="card-title">{{ $product->brand }} - {{ $product->model }}</h5>
							<p class="card-text">{{ $product->type }}</p>
							<p class="card-text"><strong>{{ $product->size_ml }} ml</strong></p>
							<p class="card-text text-success">€ {{ $product->price }}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row my-4 text-center">
			{{ $products->links() }}
		</div>

	</div>
	{{-- footer --}}
	<footer>
		<div class="w-100 m-0 border-top py-3 mySalmon-bg text-light">
			<div class="container d-flex justify-content-between">
				<div>
					<p class="mb-3 fs-6 fw-bold">LINKS</p>
					<p class="text-secondary fs-6 m-0">CONTACT</p>
					<p class="text-secondary fs-6 m-0">ABOUT US</p>
					<p class="text-secondary fs-6 m-0">TERMS OF SERVICE</p>
				</div>
				<div class="w-25">
					<p class="text-center">Get exlusive deals and updates by subscribing to our newsletter - plus 10% off your first
						order <i class="fa-solid fa-up-right-from-square"></i></p>
				</div>
				<div>
					<i class="fa-brands fa-square-instagram fs-1 mx-2"></i>
					<i class="fa-brands fa-square-facebook fs-1 mx-2"></i>
				</div>

			</div>
		</div>
	</footer>
@endsection
