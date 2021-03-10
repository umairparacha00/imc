@extends ('layouts.app')
@section('style')
    <style type="text/css">
        .card-content h1 {
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
        .card-content h1:after {
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
        .btn-primary {
            border-color: #FF9F43 !important;
            background-color: #FF9F43 !important;
            color: #FFF;
        }

        .btn-primary:hover {
            box-shadow: 0 0 15px #FF9F43;
            border-width: 0;
            transition: all 0.2s;
            color: #fff;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            color: #464646;
            margin-bottom: 0.5em;
            padding-left: .2em;
        }

        #documents form .form-group label {
            font-size: 1.5rem;
            color: #464646;
        }

        #documents form .form-group label.btn-bs-file {
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
    </style>
@endsection
@section ('content')
    <div class="scrollbar-container">
    </div>
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <h1 class="mb-3">Documents</h1>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="form-container">
                            <!-- users edit document form start -->
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ '/profile/'. current_user()->id .'/files' }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        @if(current_user()->user_file !== null)
                                            <div class="alert alert-success">Profile pic uploaded.</div>
                                        @else
                                        @endif
                                        <div class="form-group" id="ct2">
                                            <label class="mb-2 font-size-xlg"
                                                   for="u-cnic">Profile Pic
                                            </label>
                                            <br>
                                            <label class="btn-bs-file btn btn-lg btn-info">
                                                Choose File
                                                <input type="file"
                                                       id="u-pic"
                                                       name="user_file"
                                                       class="form-control"
                                                >
                                            </label>
                                        </div>
                                        @if(current_user()->cnic_file !== null)
                                            @if('approved' === current_user()->cnic_file_status)
                                                <div class="alert alert-success">Your CNIC document is approved.</div>
                                            @elseif ('rejected' === current_user()->cnic_file_status)
                                                <div class="alert alert-danger">Your document is rejected. Upload it
                                                    again.
                                                </div>
                                            @elseif(current_user()->cnic_file  && 'pending' === current_user()->cnic_file_status)
                                                <div class="alert alert-info">Your document is submitted for approval.
                                                </div>
                                            @else
                                            @endif
                                        @endif

                                        <div class="form-group" id="ct">
                                            <label class="mb-2 font-size-xlg"
                                                   for="u-cnic">CNIC</label>
                                            <br>
                                            <label class="btn-bs-file btn btn-lg btn-info">
                                                Choose File
                                                <input @if (current_user()->cnic_file  && 'pending' === current_user()->cnic_file_status)
                                                       disabled
                                                       @elseif (current_user()->cnic_file  && 'approved' === current_user()->cnic_file_status)
                                                       @else
                                                       @endif
                                                       type="file" id="u-cnic" name="cnic_file" class="form-control">
                                            </label>
                                        </div>
                                        @if(current_user()->bank_file !== null)
                                            @if('approved' === current_user()->bank_file_status)
                                                <div class="alert alert-success">Your document is approved.</div>
                                            @elseif ('rejected' === current_user()->bank_file_status)
                                                <div class="alert alert-danger">Your document is rejected. Upload it
                                                    again.
                                                </div>
                                            @elseif(current_user()->bank_file  && 'pending' === current_user()->bank_file_status)
                                                <div class="alert alert-info">Your document is submitted for approval.
                                                </div>
                                            @else
                                            @endif
                                        @endif
                                        <div class="form-group" id="ct1">
                                            <label class="mb-2 font-size-xlg" for="u-bill">Recent Bank statement</label>
                                            <br>
                                            <label class="btn-bs-file btn btn-lg btn-info">
                                                Choose File
                                                <input @if (current_user()->bank_file  && 'pending' === current_user()->bank_file_status)
                                                       disabled
                                                       @elseif (current_user()->bank_file  && 'approved' === current_user()->bank_file_status)
                                                       @else
                                                       @endif
                                                       type="file" id="u-bill" name="bank_file"
                                                       class="form-control">
                                            </label>
                                        </div>
                                        <div class="d-flex flex-sm-row flex-column">
                                            <button type="submit" class="btn btn-primary mr-2">Update
                                            </button>
                                            <a href="{{ route('profile') }}" class="btn btn-danger">Back
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- users edit document form ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section ('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#u-pic').change(function (e) {
                var fileName = e.target.files[0].name;
                var myElement = document.getElementById('clip3');
                if (myElement) {
                    myElement.remove();
                    var clipDiv = document.createElement('div');
                    clipDiv.id = 'clip3';
                    clipDiv.classList.add('clip3');
                    document.getElementById("ct2").appendChild(clipDiv);
                    document.getElementById('clip3').innerHTML +=
                        "<strong>Attached</strong>" + " " + fileName;
                } else {
                    var clipDiv = document.createElement('div');
                    clipDiv.id = 'clip3';
                    clipDiv.classList.add('clip3');
                    document.getElementById("ct2").appendChild(clipDiv);
                    document.getElementById("clip3").innerHTML +=
                        "<strong>Attached</strong>" + " " + fileName;
                }
            });
        });
        $(document).ready(function () {
            $('#u-cnic').change(function (e) {
                var fileName = e.target.files[0].name;
                var myElement = document.getElementById('clip');
                if (myElement) {
                    myElement.remove();
                    var clipDiv = document.createElement('div');
                    clipDiv.id = 'clip';
                    clipDiv.classList.add('clip');
                    document.getElementById("ct").appendChild(clipDiv);
                    document.getElementById('clip').innerHTML +=
                        "<strong>Attached</strong>" + " " + fileName;
                } else {
                    var clipDiv = document.createElement('div');
                    clipDiv.id = 'clip';
                    clipDiv.classList.add('clip');
                    document.getElementById("ct").appendChild(clipDiv);
                    document.getElementById("clip").innerHTML +=
                        "<strong>Attached</strong>" + " " + fileName;
                }
            });
        });
        $(document).ready(function () {
            $('#u-bill').change(function (e) {
                var fileName = e.target.files[0].name;
                var myElement = document.getElementById('clip1');
                if (myElement) {
                    myElement.remove();
                    var clipDiv = document.createElement('div');
                    clipDiv.id = 'clip1';
                    clipDiv.classList.add('clip');
                    document.getElementById("ct1").appendChild(clipDiv);
                    document.getElementById('clip1').innerHTML +=
                        "<strong>Attached</strong>" + " " + fileName;
                } else {
                    var clipDiv = document.createElement('div');
                    clipDiv.id = 'clip1';
                    clipDiv.classList.add('clip');
                    document.getElementById("ct1").appendChild(clipDiv);
                    document.getElementById("clip1").innerHTML +=
                        "<strong>Attached</strong>" + " " + fileName;
                }
            });
        });
    </script>
@endsection