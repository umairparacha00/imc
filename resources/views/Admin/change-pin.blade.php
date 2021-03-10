@extends ('Admin.layouts.app')
@section('style')
	<style type="text/css">
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
@endsection
@section ('content')
	<div class="scrollbar-container">
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="new-form-container">
				<h1>Change Pin </h1>
				<div class="tab-content">
					<div>
						@if($errors->any())
							@foreach ($errors->all() as $error)
								<div class="alert alert-danger w-100" role="alert">
									{{ $error }}
								</div>
							@endforeach
						@endif
						<form autocomplete="off" method="post" action="{{ '/admin/change-pin' }}">
							@csrf
							<div class="col">
								<div class="row">
									<div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-6"><label for="p-pin">Current
											Personal Pin</label>
										<input id="p-pin" placeholder="Enter Current Personal Pin" type="password"
											   name="current-pin" class="form-control">
									</div>
									<div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-6"><label for="p-pin">New
											Personal Pin</label>
										<input id="p-pin" placeholder="Enter New Personal Pin" type="password"
											   name="new-pin" class="form-control">
									</div>
								</div>
							</div>
							<div class="col">
								<div class="row">
									<div class="col-xl-12 col-sm-12">
										<button type="submit" class="btn btn-default">Change Pin
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section ('page-script')
@endsection
