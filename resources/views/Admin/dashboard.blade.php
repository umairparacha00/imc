@extends ('Admin.layouts.app')

@section('meta')
	<title>App Dashboard</title>
@endsection
@section('style')
	<style>
        .text-primary {
            color: #7367F0 !important;
        }
        .widget-content .widget-content-left .widget-subheading1 {
            opacity: 0.5;
            color: #4839EB;
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<section id="dashboard-analytics">
		{{--		<div class="row">--}}
		{{--			<div class="col-md-6 col-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2>--}}
		{{--							<span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>--}}
		{{--							0--}}
		{{--						</h2>--}}
		{{--						<p>Today's Investment</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-md-6 col-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>--}}
		{{--							{{ number_format($totalMainBalance, 2, '.', ',') }}--}}
		{{--						</h2>--}}
		{{--						<p>Total Main Balance</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-md-6 col-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>--}}
		{{--							{{ number_format($totalGroupBalance, 2, '.', ',') }}--}}
		{{--						</h2>--}}
		{{--						<p>Total Group Balance</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-md-6 col-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>--}}
		{{--							0--}}
		{{--						</h2>--}}
		{{--						<p>Total Investment</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-md-6 col-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>--}}
		{{--							{{ $partners }}--}}
		{{--						</h2>--}}
		{{--						<p>Total Partners</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-md-6 col-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>--}}
		{{--							{{ $seniorDirectors }}--}}
		{{--						</h2>--}}
		{{--						<p>Total Senior Directors</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>--}}
		{{--							{{ $directors }}--}}
		{{--						</h2>--}}
		{{--						<p>Total Directors</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>--}}
		{{--							{{ $generalManagers }}--}}
		{{--						</h2>--}}
		{{--						<p>Total General Manager</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>--}}
		{{--							{{ $seniorManagers }}--}}
		{{--						</h2>--}}
		{{--						<p>Total Senior Manager</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>--}}
		{{--							{{ $managers }}--}}
		{{--						</h2>--}}
		{{--						<p>Total Manager</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>--}}
		{{--							{{ $seniorOfficers }}--}}
		{{--						</h2>--}}
		{{--						<p>Total Senior Officers</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">--}}
		{{--				<div class="card">--}}
		{{--					<div class="c-wraper">--}}
		{{--						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>--}}
		{{--							{{ $officers }}--}}
		{{--						</h2>--}}
		{{--						<p>Total Officers</p>--}}
		{{--					</div>--}}
		{{--				</div>--}}
		{{--			</div>--}}
		{{--		--}}
		{{--		</div>--}}
		<div class="row">
			@role('super-admin', 'admin')
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Earning Balance
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalMainBalance, 2, '.', ',') }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Group Earning
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalGroupBalance, 2, '.', ',') }}</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-badge-dollar fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Direct Members
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
							</div>
							<div class="col-auto">
								<i class="fal fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Indirect
									Members
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
							</div>
							<div class="col-auto">
								<i class="fal fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Videos I
									watched
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">475</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-film fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card border-left-primary shadow py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Channels I
									Subscribed
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-film fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endrole
		</div>
	</section>
@endsection
@section ('page-script')
	<script>
        $("#destroy").on('click', function () {
            axios.post('/admin/resources/getUserDetailsForDestroying', {
                "id": $("#id").val(),
            }).then(function (response) {
                Swal.fire({
                    title: response.data.name,
                    text: 'Are you sure, you want to delete ' + response.data.username + ' !',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $("#destroy-user").submit()
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
