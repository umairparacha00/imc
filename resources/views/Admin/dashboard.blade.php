@extends ('Admin.layouts.app')

@section('meta')
	<title>App Dashboard</title>
@endsection
@section('style')
	<style>
        .c-wraper {
            min-height: 130px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 2em 0;
        }

        .c-wraper h2,
        .c-wraper h2 i {
            color: #7367f0;
            font-weight: 600;
        }

        .c-wraper p {
            color: #10163a;
            font-size: 1.2rem;
            margin-left: 1.3em;
        }


        .btn-primary {
            border-color: #4839EB !important;
            background-color: #7367F0 !important;
            color: #FFF;
        }
        .user-update a {
            background-color: #FF9F43;
            color: #fff;
            padding: 10px 25px;
            width: 150px;
            text-align: center;
            text-transform: uppercase;
            font-size: 1rem;
            border-radius: 4px;
        }

        .user-update a:hover {
            box-shadow: 0 0 15px #FF9F43;
            border-width: 0;
            transition: all 0.2s;
            color: #fff;
        }
        /*.custom-page-digits {*/
        /*    padding-right: 8px;*/
        /*}*/

        .custom-page-digits>a,
        .custom-page-item>a {
            color: #9a9a9a !important;
        }

        .page-item.active .page-link {
            background-color: #FF9F43;
            border-color: #FF9F43;
            color: #ffffff !important;
        }
        .search-box {
            width: 300px;
            background-color: #ffffff;
            box-shadow: 0 0 8px #bfc4c9;
            display: flex;
            padding: 8px 12px 8px 12px;
            align-items: center;
            border-radius: 8px;
        }
        .search-dropdown{
            position: absolute;
            z-index: 99999;
            background-color: #fff;
            width: 300px;
            margin-top: 10px;
            box-shadow: 0 0 8px #bfc4c9;

        }
        .search-box > i{
            font-size: 20px;
            color: #bfc4c9;
        }
        .search-box > input{
            flex: 1;
            height: 20px;
            outline: none;
            border: none;
            font-size: 18px;
            color: #c5c9cd;
            padding-left: 10px;
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
		@role('super-admin', 'admin')
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2>
							<span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>
							0
						</h2>
						<p>Today's Investment</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>
							{{ number_format($totalMainBalance, 2, '.', ',') }}
						</h2>
						<p>Total Main Balance</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>
							{{ number_format($totalGroupBalance, 2, '.', ',') }}
						</h2>
						<p>Total Group Balance</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>
							0
						</h2>
						<p>Total Investment</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>
							{{ $partners }}
						</h2>
						<p>Total Partners</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>
							{{ $seniorDirectors }}
						</h2>
						<p>Total Senior Directors</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>
							{{ $directors }}
						</h2>
						<p>Total Directors</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>
							{{ $generalManagers }}
						</h2>
						<p>Total General Manager</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>
							{{ $seniorManagers }}
						</h2>
						<p>Total Senior Manager</p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>
							{{ $managers }}
						</h2>
						<p>Total Manager</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>
							{{ $seniorOfficers }}
						</h2>
						<p>Total Senior Officers</p>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="card">
					<div class="c-wraper">
						<h2><span><i class="fal fa-user-circle" style="font-weight: 300;"></i></span>
							{{ $officers }}
						</h2>
						<p>Total Officers</p>
					</div>
				</div>
			</div>
		
		</div>
		@endrole
		<div class="row">
			<livewire:admin.user-search/>
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
