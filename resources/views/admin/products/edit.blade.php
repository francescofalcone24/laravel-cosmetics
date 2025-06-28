@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row mb-4">
			<div class="col-12">
				<h1>Edit: <h2>{{ $product->brand }} - {{ $product->model }}</h2>
				</h1>
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-12">


				<form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="my-4">
						<label for="brand">Brand:</label>
						<input style="width: 30%" type="text" id="brand" name="brand" required value="{{ $product->brand }}">
						@error('brand')
							<div>{{ $message }}</div>
						@enderror
					</div>

					<div class="my-4">
						<label for="model">Model:</label>
						<input style="width: 30%" type="text" id="model" name="model" required value="{{ $product->model }}">
						@error('model')
							<div>{{ $message }}</div>
						@enderror
					</div>

					<div class="my-4">
						<label for="price">Price: €</label>
						<input style="width: 10%" type="text" id="price" name="price" required value="{{ $product->price }}">
						@error('price')
							<div>{{ $message }}</div>
						@enderror
					</div>


					<div class="my-4">
						<select style="width: 20%" class="form-select" id="size_ml" name="size_ml" aria-label="Default select example">
							<option {{ empty($product->size_ml) ? 'selected' : '' }}>Chose the size (ml)</option>
							<option value="30"{{ $product->size_ml && $product->size_ml == '30' ? 'selected' : '' }}>30</option>
							<option value="50" {{ $product->size_ml && $product->size_ml == '50' ? 'selected' : '' }}>50</option>
							<option value="100" {{ $product->size_ml && $product->size_ml == '100' ? 'selected' : '' }}>100</option>
							<option value="200" {{ $product->size_ml && $product->size_ml == '200' ? 'selected' : '' }}>200</option>
						</select>
						@error('size_ml')
							<div>{{ $message }}</div>
						@enderror
					</div>

					<div class="my-4">
						<select style="width: 20%" class="form-select" id="type" name="type" aria-label="Default select example">
							<option {{ empty($product->type) ? 'selected' : '' }}>Chose the type</option>
							<option value="Eau de parfum"{{ $product->type && $product->type === 'Eau de parfum' ? 'selected' : '' }}>Eau
								de parfum</option>
							<option value="Eau de Toilette"{{ $product->type && $product->type === 'Eau de Toilette' ? 'selected' : '' }}>
								Eau de Toilette</option>
						</select>
						@error('type')
							<div>{{ $message }}</div>
						@enderror
					</div>

					<div class="my-4">
						<div class="d-flex" style="width:150px">
							<p class="text-nowrap">Current IMG:</p>
							@if (Str::startsWith($product->img, 'http'))
								<img class="w-100 ms-3 mb-3" src="{{ $product->img }}" alt="">
							@else
								<img class="w-100 ms-3 mb-3" src="{{ asset('/storage/' . $product->img) }}" alt="">
							@endif
						</div>
						<label for="product_img" class="form-label mb-2">Update IMG:</label>
						<input type="file" class="form-control" name="img" id="product_img" value="{{ $product->img }}"
							accept=“.png,.jpg,.jpeg,.webp,image/png” />
						<small class="text-muted">
							If there is already a current image, leave it blank to keep it.
						</small>
					</div>


					<button type="submit" class="btn btn-primary">Update</button>
				</form>

			</div>
			<a href="{{ route('admin.products.index') }}">back to the list</a>

		</div>
	</div>

@endsection
