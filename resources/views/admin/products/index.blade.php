@extends('layouts.admin')

@section('content')
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
							<img class="rounded p-2" style="height: 4rem; transition:transform 0.3s ease" src="{{ $item['img'] }}"
								onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'">
						@else
							<img class="rounded p-2" style="height: 4rem; transition:transform 0.3s ease"
								src="{{ asset('/storage/' . $item->img) }}" onmouseover="this.style.transform='scale(1.2)'"
								onmouseout="this.style.transform='scale(1)'">
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
