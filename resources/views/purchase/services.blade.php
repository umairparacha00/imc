@extends ('layouts.app')
@section('title')
	<title>Services - Imc</title>
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

        @media (min-width: 280px) and (max-width: 575px) {
            .new-form-container h1 {
                font-size: 28px;
            }
        }
	</style>
	<style>
        label {
            margin-bottom: 0.8rem;
        }

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

        .p-m-label {
            font-size: 1.2rem;
            padding-bottom: 25px;
            font-weight: 700
        }

        .m-info {
            font-weight: 400
        }

        .m-p-748 {
            background: #fff;
            table-layout: auto;
            width: 100%
        }

        .m-p-748 > thead {
            color: #fff
        }

        .m-p-748 > tbody > tr > td:nth-child(2n) {
            background: #f5f6f9
        }

        .m-p-748 > thead > tr > th:nth-child(odd) {
            background: #7367f0;
            position: relative;
            vertical-align: middle;
            text-align: center;
            font-weight: 400;
            padding: 5px;
            font-size: 1.2rem;
        }

        .m-p-748 > thead > tr > th:nth-child(2n) {
            background: #FF9F43;
            position: relative;
            vertical-align: middle;
            text-align: center;
            font-weight: 400;
            padding: 0 5px;
            font-size: 1.2rem;
        }

        .m-p-748 > thead > tr > th {
            padding: 0
        }

        .m-p-748 > tbody > tr > th {
            color: #7367f0;
            text-align: center;
            vertical-align: middle
        }

        .m-p-748 > tbody > tr > td {
            color: #555;
            text-align: center;
            vertical-align: middle
        }

        .m-p-748 {
            border: 1px solid #dcdcdc;
            -webkit-box-shadow: 0 7px 5px 0 #ccc;
            box-shadow: 0 7px 5px 0 #ccc
        }

        @media only screen and (max-width: 600px) {

            .m-h-0897,
            .m-p-748 {
                table-layout: auto;
                width: 100%
            }
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="new-form-container">
				<h1>Services</h1>
				<ul role="tablist" class="nav nav-tabs">
					<li class="nav-item">
						<a href="#purchase" role="tab" data-toggle="tab" class="nav-link active">
							<i class="fal fa-handshake mr-2"></i> Purchase
						</a>
					</li>
					<li class="nav-item">
						<a href="#history" role="tab" data-toggle="tab" class="nav-link">
							<i class="fal fa-history mr-2"></i> History
						</a>
					</li>
				</ul>
				<div class="tab-content">
					@if($errors->any())
						@foreach ($errors->all() as $error)
							{{! toast($error, 'error') }}
						@endforeach
					@endif
					<div role="tabpanel" id="purchase" class="tab-pane fade in show active">
						<!---->
						<form method="POST" action="{{ route('purchase.services.post') }}" autocomplete="off"
							  id="servicesPurchaseForm">
							@csrf
							<div class="alert alert-info alert-dismissible fade show" role="alert">
								<strong>Notice:</strong> I have transferred the payment before purchasing.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							@livewire('payment-gateway-selector')
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
									<div class="form-group">
										<label for="memberships">
											Services
										</label>
										<select class="custom-select @error('name') is-invalid @enderror" name="service"
												id="service">
											<option selected disabled>-- Select Services --</option>
											@foreach ($services as $service)
												<option value="{{ $service->name }}">{{ $service->name .' - Price $'. $service->price }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
									<div class="form-group">
										<label>
											Link
										</label>
										<input type="text"
											   class="form-control @error('link') is-invalid @enderror"
											   name="link"
											   id="link">
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
									<div class="form-group">
										<label>
											Transaction Id
										</label>
										<input type="text"
											   class="form-control @error('transaction_id') is-invalid @enderror"
											   name="transaction_id"
											   id="transaction_id">
									</div>
								</div>
								<div class="col-sm-12 col-xl-12 col-lg-12 col-md-12">
									<div class="d-flex justify-content-between mb-3">
										<div class="position-relative">
										
										</div>
										<div class="btn-actions-pane-right">
											<button type="button" class="btn btn-lg btn-primary" id="modal-btn" >Purchase
											</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
						<div role="tabpanel" id="history" class="tab-pane fade">
							<div role="tabpanel" id="history" class="tab-pane fade active show">
								<div class="table-responsive">
									<table class="align-middle mb-0 table table-striped table-hover">
										<thead>
										<tr>
											<th>ID</th>
											<th>Service</th>
											<th>Gateway</th>
											<th>Price</th>
											<th>Status</th>
											<th>Delivery Date</th>
											<th>Created At</th>
										</tr>
										</thead>
										<tbody>
										@foreach ($orders as $order)
											<tr>
												<td>{{ $order->id }}</td>
												<td>{{ \Illuminate\Support\Str::ucfirst(str_replace('_', ' ', $order->service->name)) }}</td>
												<td>{{ $order->paymentGateway->name }}</td>
												<td>{{ $order->service->price }}</td>
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
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
				</div>
			
			</div>
		</div>
	</div>
@endsection
@section ('page-script')
	<script>
        $("#servicesPurchaseForm").on('keydown', (e) => {
            if (e.keyCode === 13) {
                e.preventDefault();
                axios.post('/getServicePrice', {
                    "service": $("#service").val(),
                    "transaction_id": $("#transaction_id").val(),
                    "link": $("#link").val(),
                    "payment_gateway_id": $("#payment_gateway_id").val()
                }).then(function (response) {
                    Swal.fire({
                        title: 'Confirm Purchase',
                        text: 'Are you sure you want to purchase ' + response.data.name + '. its prices is (' + response.data.price + '$)?',
                        position: "top",
                        showCancelButton: true,
                        confirmButtonColor: '#218838',
                        cancelButtonColor: '#c82333',
                        confirmButtonText: 'Proceed!'
                    }).then((result) => {
                        if (result.value) {
                            $("#servicesPurchaseForm").submit()
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
                        timer: 5000,
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
            axios.post('/getServicePrice', {
                "service": $("#service").val(),
                "transaction_id": $("#transaction_id").val(),
                "link": $("#link").val(),
                "payment_gateway_id": $("#payment_gateway_id").val()
            }).then(function (response) {
                Swal.fire({
					title: 'Confirm Purchase',
                    text: 'Are you sure you want to purchase ' + response.data.name + '. its prices is (' + response.data.price + '$)?',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $("#servicesPurchaseForm").submit()
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
                    timer: 5000,
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