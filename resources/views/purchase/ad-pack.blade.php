@extends ('layouts.app')
@section('title')
	<title>Ad Pack - Mereow</title>
@endsection
@section('style')
	<style type="text/css">
        .nav.nav-tabs {
            border: none;
            margin-bottom: 1rem;
            border-radius: 0;
        }

        .nav.nav-tabs,
        .nav.nav-tabs .nav-item {
            position: relative;
        }

        .nav.nav-tabs .nav-item .nav-link {
            color: #626262;
            font-size: 1rem;
            border: none;
            min-width: auto;
            font-weight: 500;
            padding: .61rem .635rem;
            border-radius: 0;
        }

        .nav.nav-tabs .nav-item .nav-link.active {
            border: none;
            position: relative;
            color: #7367F0;
            -webkit-transition: all .2s ease;
            transition: all .2s ease;
            background-color: transparent;
        }

        .nav.nav-tabs .nav-item .nav-link.active:after {
            content: attr(data-before);
            height: 2px;
            width: 100%;
            left: 0;
            position: absolute;
            bottom: 0;
            top: 100%;
            background: -webkit-linear-gradient(60deg, #7367F0, rgba(115, 103, 240, .5)) !important;
            background: linear-gradient(30deg, #7367F0, rgba(115, 103, 240, .5)) !important;
            box-shadow: 0 0 8px 0 rgba(115, 103, 240, .5) !important;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
            -webkit-transition: all .2s linear;
            transition: all .2s linear;
        }

        .new-form-container .tab-content form .form-control {
            height: 36px;
            font-size: 13px;
            border-radius: 0;
        }

        .btn-primary {
            border-color: #4839EB !important;
            background-color: #7367F0 !important;
            color: #FFF;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .content-area {
            min-height: 450px;
            padding: 40px 0;
        }

        .new-form-container .tab-content {
            padding: 36px 30px;
        }

        .new-form-container {
            background-color: #ffffff;
            -webkit-box-shadow: 8px 5px 17px -7px #ccc;
            box-shadow: 8px 5px 17px -7px #ccc;
        }

        .new-form-container .nav-tabs.nav {
            padding: 1.5em 1.5em 0 1.5em;
        }

        .new-form-container h1 {
            margin-left: 0;
            margin-bottom: 0;
            text-align: center;
            background-color: #7367F0;
            color: #fff;
            font-size: 38px;
            padding: 16px 0 15px;
            position: relative;
        }

        .new-form-container h1:after {
            display: block;
            content: "";
            height: 6px;
            background-color: #FF9F43;
            width: auto;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            bottom: 0;
        }

        .new-form-container .tab-content form .btn {
            background-color: #FF9F43;
            padding: .58rem .75rem;
            border: 1px solid #FF9F43;
            color: #fff;
            text-transform: capitalize;
            margin: 0 auto;
            border-radius: 0.25rem;
        }

        .new-form-container .tab-content form .btn:hover {
            box-shadow: 0 0 15px #FF9F43;
            transition: all 0.2s;
            color: #fff;
        }
	</style>
	<style>
        .m-h-0897 {
            table-layout: fixed;
            width: 100%
        }

        .m-h-0897 > thead {
            background: #f1f2f7
        }

        .m-h-0897 > tbody {
            background: #fff
        }

        .m-h-0897 > tbody > tr > td,
        .m-h-0897 > thead > tr > th {
            color: #555;
            border: 1px solid #e7e7e7;
            vertical-align: middle
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="new-form-container">
				<h1>AdPower</h1>
				<ul role="tablist" class="nav nav-tabs">
					<li class="nav-item"><a href="#investment" role="tab" data-toggle="tab" class="nav-link active"
											aria-selected="true"><i class="fal fa-shopping-basket mr-2"></i>Create Pack</a>
					</li>
					<li class="nav-item"><a href="#history" role="tab" data-toggle="tab" class="nav-link"
											aria-selected="false"><i class="fal fa-history mr-2"></i>
							History</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" id="investment" class="tab-pane fade in active show">
						<form autocomplete="off" method="POST" action="{{ route('ad_packs.post') }}" id="adPackPurchaseForm">
							@csrf
							<div class="row justify-content-center align-items-center">
								<div class="col-sm-12 col-md-4 col-xl-4 col-lg-4">
									<div class="form-group"><label for="sel2">Purchase:</label>
										<select class="custom-select" name="number" id="number">
											<option selected disabled>-- Select Option --</option>
											@if (current_user()->membershipId->membership_id === 1)
												@for ($i = 1; $i <= 5; $i++)
													<option value="{{ $i }}">No of AdPack {{ $i }}</option>
												@endfor
											@elseif (current_user()->membershipId->membership_id === 2)
												@for ($i = 1; $i <= 20; $i++)
													<option value="{{ $i }}">No of AdPack {{ $i }}</option>
												@endfor
											@elseif (current_user()->membershipId->membership_id === 3)
												@for ($i = 1; $i <= 50; $i++)
													<option value="{{ $i }}">No of AdPack {{ $i }}</option>
												@endfor
											@elseif (current_user()->membershipId->membership_id === 4)
												@for ($i = 1; $i <= 100; $i++)
													<option value="{{ $i }}">No of AdPack {{ $i }}</option>
												@endfor
											@elseif (current_user()->membershipId->membership_id === 5)
												@for ($i = 1; $i <= 200; $i++)
													<option value="{{ $i }}">No of AdPack {{ $i }}</option>
												@endfor
											@elseif (current_user()->membershipId->membership_id === 6)
												@for ($i = 1; $i <= 400; $i++)
													<option value="{{ $i }}">No of AdPack {{ $i }}</option>
												@endfor
											@elseif (current_user()->membershipId->membership_id === 7)
												@for ($i = 1; $i <= 2000; $i++)
													<option value="{{ $i }}">No of AdPack {{ $i }}</option>
												@endfor
											@elseif (current_user()->membershipId->membership_id === 8)
												@for ($i = 1; $i <= 4000; $i++)
													<option value="{{ $i }}">No of AdPack {{ $i }}</option>
												@endfor
											@endif
										</select>
									</div>
								</div>
								<div class="ol-sm-12 col-md-4 col-xl-4 col-lg-4">
									<div class="form-group"><label for="usr">Enter Pin:</label>
										<input type="text" id="pin" name="pin" class="form-control" value="{{ old('pin') }}">
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12"></div>
								<div class="col-sm-12 col-md-4">
									<div class="d-flex justify-content-between">
										<div>
											<button type="button" id="modal-btn2" style="display:none"
													class="btn btn-default">
												Create
											</button>
										</div>
										<div class="btn-actions-pane-right">
											<button type="button" id="modal-btn" class="btn btn-default">
												Create
											</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div role="tabpanel" id="history" class="tab-pane fade">
						<div class="table-responsive">
							<table class="table table-bordered t_t1">
								<thead>
								<tr>
									<th>Pack Type</th>
									<th>Total Purchased</th>
									<th>Amount</th>
									<th>Invested</th>
									<th>Start Date</th>
									<th>Expiry Date</th>
									<th>Status</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($adPacks as $data)
									
									<tr>
										<td>{{ strtoupper($data->name) }}</td>
										<td>{{ $data->number_of_ad_packs }}</td>
										<td>{{ $data->price }}</td>
										<td>{{ $data->amount }}</td>
										<td>{{ $data->created_at }}</td>
										<td>{{ $data->expires_at }}</td>
										<td>
											<div class="badge
                                                @if ($data->status === 1))
                                                    badge-success">Active
												@else
													badge-danger">Expired
												@endif
											</div>
										</td>
									</tr>
								@endforeach
								<!---->
								<!---->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section ('page-script')
	<script>
        $("#adPackPurchaseForm").on('keydown', (e) => {
            if (e.keyCode === 13) {
                e.preventDefault();
                axios.post('/purchase/getAdPackValidation', {
                    "number": $("#number").val(),
                    "pin": $("#pin").val()
                }).then(function (response) {
                    Swal.fire({
                        text: 'Are you sure you want to purchase ' + response.data.number + ' AdPacks?',
                        position: "top",
                        showCancelButton: true,
                        confirmButtonColor: '#218838',
                        cancelButtonColor: '#c82333',
                        confirmButtonText: 'Proceed!'
                    }).then((result) => {
                        if (result.value) {
                            $("#adPackPurchaseForm").submit()
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
                        timer: 3000,
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
            }
        })
        $("#modal-btn").on('click', function () {
            axios.post('/purchase/getAdPackValidation', {
                "number": $("#number").val(),
                "pin": $("#pin").val()
            }).then(function (response) {
                Swal.fire({
                    text: 'Are you sure you want to purchase ' + response.data.number + ' AdPacks?',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $("#adPackPurchaseForm").submit()
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
                    timer: 3000,
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