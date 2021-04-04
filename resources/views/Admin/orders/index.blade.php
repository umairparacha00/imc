@extends ('Admin.layouts.app')
@section('style')
	<style>
        .btn-primary {
            border-color: #4839EB !important;
            background-color: #7367F0 !important;
            color: #FFF;
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container"></div>
	<section id="dashboard-analytics">
		<div class="row">
			<div class="col-md-12">
				<div class="d-flex justify-content-between mb-3">
					<div class="position-relative">
					</div>
				</div>
				<div class="main-card mb-3 card">
					<div class="card-header">
						Orders
					</div>
					<div class="table-responsive">
						<table id="ordersTable" class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th>ID</th>
								<th>Service</th>
								<th>Gateway</th>
								<th>Price</th>
								<th>Transaction ID</th>
								<th>Status</th>
								<th>Delivery Date</th>
								<th>Created At</th>
								<th class="text-center" style="width:40px;padding-right: 25px">Actions</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($orders as $order)
								<tr>
									<td>{{ $order->id }}</td>
									<td>{{ \Illuminate\Support\Str::ucfirst(str_replace('_', ' ', $order->service->name)) }}</td>
									<td>{{ $order->paymentGateway->name }}</td>
									<td>{{ $order->service->price }}</td>
									<td>{{ $order->transaction_id }}</td>
									<td>
										<div class="badge
													@if ($order->status === 0)
												badge-info
@elseif($order->status === 1)
												badge-success
@endif"
										>
											@if ($order->status === 0)
												Pending
											@elseif($order->status === 2)
												Approved
											@elseif($order->status === 3)
												Under Working
											@elseif($order->status === 1)
												Completed
											@endif
										</div>
									</td>
									<td>{{ Carbon\Carbon::parse($order->delivery_date)->format('d M Y') }}</td>
									<td>{{ Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
									<td class="text-center">
										<div class="d-flex justify-content-around align-items-center">
											<a href="{{ route('orders.show', $order->id) }}" class="text-muted">
												<i class="fal fa-window-frame-open"></i>
											</a>
											<a href="{{ route('orders.edit', $order->id) }}" class="text-muted">
												<i class="fal fa-edit"></i>
											</a>
										</div>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						{{ $orders->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section ('page-script')
	<script>
        $("#ordersTable").on('click', '.destroy', function () {

            let $tr = $(this).closest('tr');

            let data = $tr.children('td').map(function () {
                return $(this).text();
            }).get();
            axios.post('/admin/getLinkDetailsForDestroying', {
                "id": data[0],
            }).then(function (response) {
                Swal.fire({
                    title: response.data.link_type,
                    text: 'Are you sure, you want to delete link with ID ' + response.data.id + ' !',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $('#' + data[0]).submit()
                    }
                })
            }).catch((error) => {
                const errors = error.response.data.errors
                const firstItem = Object.keys(errors)[0];
                const firstErrorMessage = errors[firstItem][0]

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: false,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                Toast.fire({
                    icon: 'error',
                    title: firstErrorMessage
                });
            });
        })
	
	</script>
@endsection