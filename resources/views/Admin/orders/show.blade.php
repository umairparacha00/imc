@extends ('Admin.layouts.app')
@section('style')
	<style>
        h3 {
            color: black;
        }

        .profile-outer {
            background-color: white;
            margin-left: 0;
            margin-right: 0;
            padding: 26px;
        }

        .column-name {
            color: #8d9196;
        }

        .column-data {
            color: #3b3b3c;
        }

        .main {
            padding-top: 1.25em;
            padding-bottom: .8em;
            border-bottom: 1px solid #e3e7eb;
        }

        .destroy {
            padding: 3px 13px 3px 13px;
            background-color: #ff9f43;
            border-radius: 3px;
            font-size: 1.4rem;
            cursor: pointer;
            color: white !important;
        }

        .destroy:hover {
            box-shadow: 0 0 10px #FF9F43;
            border-width: 0;
            transition: all 0.2s;
            color: #fff;
        }

        .edit {
            padding: 3px 11px 3px 13px;
            background-color: #645bd3;
            border-radius: 3px;
            font-size: 1.4rem;
            cursor: pointer;
            color: white;
        }

        .back {
            padding: 3px 11px 3px 13px;
            background-color: #d92550;
            border-radius: 3px;
            font-size: 1.4rem;
            cursor: pointer;
            color: white;
        }

        .back:hover {
            box-shadow: 0 0 10px #a91232;
            border-width: 0;
            transition: all 0.2s ease;
            color: #fff;
        }

        .edit:hover {
            box-shadow: 0 0 10px #574dcf;
            border-width: 0;
            transition: all 0.2s;
            color: #fff;
        }
	</style>
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div>
		<div>
			<div class="d-flex justify-content-between align-items-center pb-2">
				<div><h3>Order</h3></div>
				<div>
					<div class="d-flex justify-content-around align-items-center mr-5">
						<a class="destroy mr-4">
							<form action="{{ route('orders.destroy', $order->id) }}" method="POST"
								  id="{{ $order->id }}">
								@csrf
								@method('DELETE')
							</form>
							<i class="fal fa-trash-alt"></i>
						</a>
						<a href="{{ route('orders.index') }}" class="back mr-4">
							<i class="fal fa-backward"></i>
						</a>
						<a href="{{ route('orders.edit', $order->id) }}" class="edit">
							<i class="fal fa-edit"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="profile-outer">
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>ID</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $order->id }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Service Name</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $order->service->name }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Payment Gateway</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $order->paymentGateway->name }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Price</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $order->service->price }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="profile-outer">
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Status</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
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
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Delivery Date</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ Carbon\Carbon::parse($order->delivery_date)->format('d M Y') }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Created At</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</h6>
							</div>
						</div>
					</div>
					<div class="row main">
						<div class="col-lg-4">
							<div class="profile-inner column-name">
								<h6>Price</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="profile-inner column-data">
								<h6>{{ $order->service->price }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection