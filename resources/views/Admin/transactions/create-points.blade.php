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
            font-size: .95rem;
            border: none;
            min-width: auto;
            font-weight: 450;
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

        .btn-primary {
            border-color: #FF9F43 !important;
            background-color: #FF9F43 !important;
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

        .new-form-container .tab-content form .btn {
            background-color: #FF9F43;
            border: 1px solid #FF9F43;
            color: #fff;
            text-transform: capitalize;
            margin: 0 auto;
            -webkit-box-shadow: 0 1px 12px 4px hsla(240, 7%, 85%, .6);
            box-shadow: 0 1px 12px 4px hsla(240, 7%, 85%, .6);
        }

        .new-form-container .tab-content form .btn:hover {
            box-shadow: 0 0 15px #FF9F43;
            transition: all 0.2s;
            color: #fff;
        }

        .tb-90 {
            table-layout: auto;
            width: 100%;
        }

        .tb-90 thead {
            background: #f1f2f7;
        }

        .tb-90 thead th {
            vertical-align: middle;
            font-weight: 600;
            color: #212529;
            border: 1px solid #e7e7e7;
        }

        .tb-90 tbody tr {
            vertical-align: middle;
        }

        .tb-90 tbody tr td {
            color: inherit;
            border: 1px solid #e7e7e7;
        }

        .inp-shadow {
            -webkit-box-shadow: 0 5px 5px 0 #ccc;
            box-shadow: 0 5px 5px 0 #ccc;
        }

        #history table.pincreate-history .btn {
            background-color: #FF9F43;
            border: 1px solid #FF9F43;
            color: #fff;
        }

        @media (max-width: 576px) {
            .amount-heading {
                background-image: url(assets/images/layer.png);
                background-repeat: repeat-x;
                background-position: 0 0;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .purchase-pin-title {
                padding: 1em 1.3em 0 1.3em;
                color: #fff;
                font-size: 1.2rem;
                text-align: center;
            }

            .purchase-pin-ammount {
                color: #fff;
                text-align: center;
                font-size: 2rem;
                float: right;
                padding: 0;
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
				<h1>Create Points</h1>
				<ul role="tablist" class="nav nav-tabs">
					<li class="nav-item">
						<a href="#transfer-balance" role="tab" data-toggle="tab" class="nav-link active"
						   aria-selected="true">
							<i class="fal fa-share-square mr-2"></i>
							Create Points
						</a>
					</li>
					<li class="nav-item">
						<a href="#history" role="tab" data-toggle="tab" class="nav-link" aria-selected="false">
							<i class="fal fa-history mr-2"></i>History
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" id="transfer-balance" class="tab-pane fade in active show">
						@if($errors->any())
							@foreach ($errors->all() as $error)
								{{! toast($error, 'error') }}
							@endforeach
						@endif
						<form method="POST" action="{{ route('create-points.post') }}"
							  id="create-points-form">
							@csrf
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="number">Points</label>
										<input type="number" id="number" name="number" class="form-control">
									</div>
								</div>
							</div>
							<button type="button" id="modal-btn" class="btn btn-default">
								Create
							</button>
						</form>
					</div>
					<div role="tabpanel" id="history" class="tab-pane fade">
						<div class="table-responsive">
							<table class="table tb-90">
								<thead>
								<tr>
									<th>ID</th>
									<th>Amount</th>
									<th>Date</th>
								</tr>
								</thead>
								<tbody>
								{{--                                @foreach ($transactions as $transaction)--}}
								{{--                                    <tr>--}}
								{{--                                        <td>{{ $transaction->id }}</td>--}}
								{{--                                        <td>{{ $transaction->transaction_amount }}</td>--}}
								{{--                                        <td>{{ $transaction->trans_date_time }}</td>--}}
								{{--                                    </tr>--}}
								{{--                                @endforeach--}}
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
        $("#create-points-form").on('keydown', (e) => {
            if (e.keyCode === 13) {
                e.preventDefault();
                Swal.fire({
                    title: 'Creating Points',
                    text: 'Are you sure you want to create points',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $("#create-points-form").submit()
                    }
                })
            }
        })
        $("#modal-btn").on('click', function () {
            Swal.fire({
                title: 'Creating Points',
                text: 'Are you sure you want to create points',
                position: "top",
                showCancelButton: true,
                confirmButtonColor: '#218838',
                cancelButtonColor: '#c82333',
                confirmButtonText: 'Proceed!'
            }).then((result) => {
                if (result.value) {
                    $("#create-points-form").submit()
                }
            })
        })
	
	</script>
@endsection