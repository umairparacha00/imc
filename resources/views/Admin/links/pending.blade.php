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
	<div class="scrollbar-container">
	</div>
	<section id="dashboard-analytics">
		<div class="row">
			<div class="col-md-8">
				<div class="d-flex justify-content-between mb-3">
					<div class="position-relative">
					</div>
				
				</div>
				<div class="main-card mb-3 card">
					<div class="card-header">
						Pending Links
					</div>
					<div class="table-responsive">
						<table id="linksTable"
							   class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th>ID</th>
								<th>Link Type</th>
								<th>User Id</th>
								<th class="text-center">Link</th>
								<th>Image</th>
								<th>Image</th>
								<th class="text-center" style="width:40px;padding-right: 25px">Actions</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($links as $link)
								<tr>
									<td class="text-muted">{{ $link->id }}</td>
									<td class="text-muted">{{ $link->link->link_type }}</td>
									<td class="text-muted">{{ $link->user_id }}</td>
									<td class="text-center text-muted">{{ $link->link_id }}</td>
									<td class="text-center">
										<div class="widget-content p-0">
											<div class="widget-content-wrapper">
												<div class="widget-content-left mr-3">
													<div class="widget-content-left">
														<img class="rounded-circle"
															 src="{{ env('AWS_URL') . $link->image }}"
															 alt="image"
															 height="40" width="40">
													</div>
												</div>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="widget-content p-0">
											<div class="widget-content-wrapper">
												<div class="widget-content-left mr-3">
													<div class="widget-content-left">
														<img class="rounded-circle"
															 src="{{ env('AWS_URL') . $link->image }}"
															 alt="image"
															 height="40" width="40">
													</div>
												</div>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="d-flex justify-content-around align-items-center">
											<form action="{{ route('links.approve', $link->id) }}" method="POST">
												@csrf
												@method('PUT')
												<button type="submit" class="btn btn-success"><i class="fal fa-check"></i></button>
											</form>
											<form action="{{ route('links.approve', $link->id) }}" method="POST">
												@csrf
												@method('PUT')
												<button type="submit" class="btn btn-danger ml-2"><i class="fal fa-times"></i></button>
											</form>
										
										</div>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section ('page-script')
	<script>
        $("#linksTable").on('click', '.destroy', function () {

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