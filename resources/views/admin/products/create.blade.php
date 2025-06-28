@extends('layouts.admin')

@section('content')
	<div class="p-4">
		<h1>Add new product</h1>
		<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="my-4">
				<label for="brand">Brand:</label>
				<input style="width: 30%" type="text" id="brand" name="brand" value="{{ old('brand') }}">
				@error('brand')
					<div>{{ $message }}</div>
				@enderror
			</div>


			<div class="my-4">
				<label for="model">Model:</label>
				<input style="width: 30%" type="text" id="model" name="model" value="{{ old('model') }}">
				@error('model')
					<div>{{ $message }}</div>
				@enderror
			</div>

			<div class="my-4">
				<label for="price">Price: €</label>
				<input style="width: 10%" type="text" id="price" name="price" value="{{ old('price') }}">
				@error('price')
					<div>{{ $message }}</div>
				@enderror
			</div>


			<div class="my-4">
				<select style="width: 20%" class="form-select" id="size_ml" name="size_ml" aria-label="Default select example">
					<option selected>Chose the size (ml)</option>
					<option value="30">30</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="200">200</option>
				</select>
				@error('size_ml')
					<div>{{ $message }}</div>
				@enderror
			</div>

			<div class="my-4">

				<label for="img" class="form-label">Image:</label>
				<input type="file" class="form-control" name="img" id="img" placeholder="" aria-describedby="imgHelper"
					style="width:40%" />
				<div id="imgHelper" class="form-text">Upload an image for the curret product</div>
				@error('img')
					<div class="form-text text-danger">{{ $message }}</div>
				@enderror

			</div>

			<div class="my-4">
				<select style="width: 20%" class="form-select" id="type" name="type" aria-label="Default select example">
					<option selected>Chose the type</option>
					<option value="Eau de parfum">Eau de parfum</option>
					<option value="Eau de Toilette">Eau de Toilette</option>
				</select>
				@error('type')
					<div>{{ $message }}</div>
				@enderror
			</div>


			{{-- potrebbe servire per il type --}}
			{{-- <div class="my-4">
				<label for="type_id">Type:</label>
				<select name="type_id" id="type_id">
					@foreach ($types as $type)
						<option value="{{ $type->id }}">{{ $type->name }}</option>
					@endforeach
				</select>
				@error('type_id')
					<div>{{ $message }}</div>
				@enderror
			</div> --}}

			<!-- Aggiungi qui altri campi del form se necessario -->
			<button class="my-4 bg-success" type="submit">Save new product</button>
		</form>

		<a class="mt-1" href="{{ route('admin.products.index') }}">back to the list</a>
	</div>
@endsection
