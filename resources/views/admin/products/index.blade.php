@extends('layouts.admin')

@section('content')
	{{-- <div class="d-flex justify-content-center flex-wrap">
		@foreach ($products as $product)
			<div class="card m-2 p-2 text-center" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Product: {{ $product->brand }}</h5>
					<p>Model: {{ $product->model }}</p>
					<a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-primary">more details</a>
					<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
						data-bs-target="#modal-{{ $product->id }}">
						<i class="fa-solid fa-trash-can"></i>
					</button>
					<!-- Modal Body -->
					<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
					<div class="modal fade" id="modal-{{ $product->id }}" tabindex="-1" data-bs-backdrop="static"
						data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $product->id }}" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalTitle-{{ $product->id }}">
										Delete current product
									</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									Deleting {{ $product->brand }}-{{ $product->model }}
									⚠️ you cannot undo this operation
								</div>
								<div class="modal-footer justify-content-center">
									{{-- CREO FORM PER CANCELLARE UN FUMETTO DAL DATABASE GLI DO LA ROTTA DESTROY E IL METODO POST POI SOTTO LO CAMBIO NEL METODO DELETE --}}
	{{-- <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
										@csrf
										@method('DELETE')
										<button type="submit" href="" class="btn btn-outline-danger my-2" data-bs-dismiss="modal">
											<i class="fa-solid fa-trash-can"></i>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div> --}}
	<table class="styled-table w-100">
		<thead class="">

			<th>IMAGE</th>
			<th>BRAND</th>
			<th>MODEL</th>
			<th class="text-center">TYPE</th>
			<th class="text-center">SIZE/ml</th>
			<th class="action-width text-end">ACTION</th>
		</thead>
		<tbody>
			@foreach ($products as $item)
				<tr>
					<td>
						@if (Str::startsWith($item->img, 'http'))
							<img class="rounded p-2" style="height: 2rem" src="{{ $item['img'] }}">
						@else
							<img class="rounded p-2" style="height: 4rem" src="{{ asset('/storage/' . $item->img) }}">
						@endif
					</td>

					<td> {{ $item->brand }} </td>
					<td> {{ $item->model }} </td>

					<td class=" text-center">{{ $item->type }}</td>
					<td class=" text-center">{{ $item->size_ml }}</td>


					<td class="action text-end">
						<a class="btn btn-warning" href="{{ route('admin.products.edit', $item->id) }}"><i class="fa fa-edit"
								aria-hidden="true"></i></a>

						<a class="btn btn-primary" href="{{ route('admin.products.show', $item->id) }}"><i
								class="fa-solid fa-magnifying-glass"></i></a>


						<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $item->id }}">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
						<div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" data-bs-backdrop="static"
							data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $item->id }}" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
								<div class="modal-content bg-dark">
									<div class="modal-header">
										<h3 class="modal-title text-white" id="modalTitle-{{ $item->id }}">
											Delete product "{{ $item->brand }}"
										</h3>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>

									<div class="modal-body text-center m-3">
										<span class="text-white fs-5">
											Are you sure you want to delete
											<br>
											<strong>
												{{ $item->brand }}-{{ $item->model }}?
											</strong>
										</span>
										<br>
										<span class="text-danger fs-5">
											You cannot undo this operation
										</span>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
											Close
										</button>

										<form action="{{ route('admin.products.destroy', $item->id) }}" method="post">
											@csrf
											@method('DELETE')

											<button type="submit" class="btn btn-danger">
												Delete
											</button>

										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
