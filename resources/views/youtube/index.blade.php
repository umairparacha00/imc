@extends ('layouts.app')
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
			<h1>Channels List</h1>
			<div class="tab-content">
				@if (current_user_membership(current_user()->id) === 'Starter')
				
				@else
					<div>
						<!---->
						<div class="table-responsive">
							<table class="align-middle mb-0 table table-borderless table-striped table-hover">
								<thead>
								<tr>
									<th class="text-center">ID</th>
									<th>Channel Link</th>
									<th class="text-center" style="width:40px;padding-right: 25px">Actions</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($links as $link)
									@if (link_checker($link->id) == true)
										<tr>
											<td class="text-center text-muted">{{ $link->id }}</td>
											<td class="text-muted">{{ $link->link }}</td>
											<td class="text-center">
												<a href="{{ route('youtube.channels.show', $link->id) }}"
												   class="btn btn-lg btn-success">Subscribe!</a>
											</td>
										</tr>
									@endif
								@endforeach
								</tbody>
							</table>
						</div>
						<div class="mt-3">{{ $links->links('vendor.pagination.bootstrap-4') }}</div>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection