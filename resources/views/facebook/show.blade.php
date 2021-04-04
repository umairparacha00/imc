@extends ('layouts.app')
@section('title')
	<title>Profile Link - Amlaen</title>
@endsection
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

        form .form-group label {
            font-size: 1.5rem;
            color: #464646;
        }

        form .form-group label.btn-bs-file {
            font-size: 14px;
            color: #fff;
        }

        .btn-bs-file {
            border-color: #4839EB !important;
            background-color: #7367F0 !important;
        }

        .btn-bs-file input[type=file] {
            position: absolute;
            top: -9999999;
            filter: alpha(opacity=0);
            opacity: 0;
            width: 0;
            height: 0;
            outline: none;
            cursor: pointer;
        }

        .clip {
            background: url({{ asset('assets/images/clip_24.webp') }}) no-repeat;
            padding-left: 26px;
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
			<h1>Follow Profile</h1>
			<div class="tab-content">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<div class="col-sm-12">
								<ul>
									<li>Click button below and open Facebook</li>
									<li>Click Follow button and confirm</li>
									<li>Take Screenshot (max 2Mb)</li>
									<li>Upload it here and click submit</li>
								</ul>
							</div>
							<div class="col-sm-12">
								@if($errors->any())
									@foreach ($errors->all() as $error)
										{{! toast($error, 'error') }}
									@endforeach
								@endif
								<form action="{{ route('facebook.page.store', $link->id) }}" method="POST"
									  enctype="multipart/form-data">
									@csrf
									<div class="form-group" id="ct2">
										<label class="mb-2 font-size-xlg"
											   for="u-cnic">Screen Shoot
										</label>
										<br>
										<label class="btn-bs-file btn btn-lg btn-info">
											Choose File
											<input type="file"
												   id="page-pic"
												   name="image"
												   class="form-control"
											>
										</label>
									</div>
									<div class="d-flex justify-content-between mb-3">
										<div>
											<a class="btn btn-primary" href="{{ $link->link }}" target="_blank">Facebook
												Page
											</a>
										</div>
										<div>
											<button type="submit" class="btn btn-success">Submit
											</button>
										</div>
									</div>
								</form>
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
        $(document).ready(function () {
            $('#page-pic').change(function (e) {
                let fileName = e.target.files[0].name;
                let myElement = document.getElementById('clip3');
                if (myElement) {
                    myElement.remove();
                    let clipDiv = document.createElement('div');
                    clipDiv.id = 'clip3';
                    clipDiv.classList.add('clip3');
                    document.getElementById("ct2").appendChild(clipDiv);
                    document.getElementById('clip3').innerHTML +=
                        "<strong>Attached</strong>" + " " + fileName;
                } else {
                    let clipDiv = document.createElement('div');
                    clipDiv.id = 'clip3';
                    clipDiv.classList.add('clip3');
                    document.getElementById("ct2").appendChild(clipDiv);
                    document.getElementById("clip3").innerHTML +=
                        "<strong>Attached</strong>" + " " + fileName;
                }
            });
        });
	</script>
@endsection