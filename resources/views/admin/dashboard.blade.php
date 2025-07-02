@extends('layouts.admin')

@section('content')
	<div class="container-fluid mt-4">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="text-center card-header">{{ __('Dashboard') }}</div>

					<div class="card-body p-0">

						<img style="width: 100%" src="{{ asset('/img/dashboard.webp') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
