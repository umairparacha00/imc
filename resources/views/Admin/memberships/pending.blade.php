@extends ('Admin.layouts.app')
@section('style')
	<style type="text/css">
        .new-form-container .tab-content {
            padding: 36px 30px;
        }

        .new-form-container {
            background-color: #ffffff;
            -webkit-box-shadow: 8px 5px 17px -7px #ccc;
            box-shadow: 8px 5px 17px -7px #ccc;
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
            font-family: Lato-Bold, sans-serif;
        }

        .new-form-container h1:after {
            display: block;
            content: "";
            height: 6px;
            background-color: #FF9F43;
            width: inherit;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            bottom: 0;
        }

        .new-form-container .tab-content form .btn {
            padding: .58rem .75rem;
            color: #fff;
            text-transform: capitalize;
            margin: 0 auto;
            border-radius: 0.25rem;
        }

        .new-form-container .tab-content form .btn:hover {
            transition: all 0.2s;
            color: #fff;
        }

        .t_t1 thead {
            background: #f1f2f7;
        }

        .t_t1 thead th {
            color: #212529;
            border: 1px solid #e7e7e7;
        }

        .t_t1 tbody tr td {
            vertical-align: top;
            color: inherit;
            letter-spacing: .7px;
            border: 1px solid #e7e7e7;
            font-size: .86rem;
        }

        .custom-page-digits {
            padding-right: 8px;
        }

        .custom-page-digits > a,
        .custom-page-item > a {
            color: #9a9a9a !important;
        }

        .page-item.active .page-link {
            background-color: #FF9F43;
            border-color: #FF9F43;
            color: #ffffff !important;
        }

        @media (max-width: 575.98px) and (min-width: 320px) {
            .new-form-container .tab-content form .btn {
                font-size: 14px;
                padding: 8px 10px;
            }
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div class="new-form-container row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pr-0 pl-0">
			<h1>Pending Memberships</h1>
			<div class="tab-content">
				<div>
					<!---->
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">User ID</th>
								<th class="text-center">MemberShip Name</th>
								<th class="text-center">Payment Method</th>
								<th class="text-center">Account Number</th>
								<th class="text-center">Price</th>
								<th class="text-center">Transaction ID</th>
								<th class="text-center" style="width:40px;padding-right: 25px">Actions</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($pendingMemberships as $pendingMembership)
								<tr>
									<td class="text-center text-muted">{{ $pendingMembership->id }}</td>
									<td class="text-center text-muted">{{ $pendingMembership->user->id }}</td>
									<td class="text-center">{{ $pendingMembership->membership->name }}</td>
									<td class="text-center">{{ $pendingMembership->paymentGateway->name }}</td>
									<td class="text-center">{{ $pendingMembership->paymentGateway->account_iban }}</td>
									<td class="text-center">{{ $pendingMembership->transaction_amount }}</td>
									<td class="text-center">{{ $pendingMembership->transaction_id }}</td>
									<td class="text-center">
										<div class="d-flex justify-content-around align-items-center">
												<form action="{{ route('memberships.approve', $pendingMembership->id) }}" method="POST">
													@csrf
													@method('PUT')
													<button type="submit" class="btn btn-success"><i class="fal fa-check"></i></button>
												</form>
												<form action="{{ route('memberships.approve', $pendingMembership->id) }}" method="POST">
													@csrf
													@method('PUT')
													<button type="submit" class="btn btn-danger"><i class="fal fa-times"></i></button>
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
	</div>
@endsection