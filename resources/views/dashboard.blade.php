@extends ('layouts.app')

@section('title')
    <title>Dashboard - Mereow</title>
@endsection
@section('style')
    <style>
        /* Section  */
        .bg-analytics {
            background: -webkit-linear-gradient(332deg, #7367F0, rgba(115, 103, 240, .7));
            background: linear-gradient(118deg, #7367F0, rgba(115, 103, 240, .7));
        }

        #dashboard-analytics .img-left {
            max-width: 175px;
            position: absolute;
            top: 0;
            left: 0;
        }

        #dashboard-analytics .img-right {
            max-width: 175px;
            position: absolute;
            top: 0;
            right: 0;
        }

        #dashboard-analytics .bg-analytics .avatar {
            margin-bottom: 2rem;
        }

        .avatar {
            white-space: nowrap;
            background-color: #C3C3C3;
            position: relative;
            cursor: pointer;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            font-size: .75rem;
            text-align: center;
            border-radius: 50%;
            margin: 5px;
        }

        .avatar.avatar-xl .avatar-content,
        .avatar.avatar-xl img {
            height: 70px;
            width: 70px;
        }

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

        .user-inner {
            height: 246px;
        }

        .username-right-detail {
            padding-left: 1.5em;
            padding-top: 1.5em;
            margin-bottom: 14px;
        }

        .username-right-card {
            overflow: hidden;
            padding-bottom: 10px;
        }

        .label {
            float: left;
            width: 162px;
            color: #999;
            font-size: 15px;
        }

        .btn-primary {
            border-color: #4839EB !important;
            background-color: #7367F0 !important;
            color: #FFF;
        }

        .label-info {
            font-size: 15px;
            color: #555;
            padding-left: 5px;
            overflow: hidden;
        }

        .user-update {
            padding-left: 25px;
            font-size: 15px;
            color: #fff;
            margin-bottom: 1em;
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

        .user-detail-buttons.text-center {
            padding-left: 0;
        }

        .user-detail-right-section .user-detail-buttons {
            padding-right: 0;
        }

        .user-detail-buttons .btn.btn-success {
            background-color: #7367F0;
            border: 1px solid #7367F0;
        }

        .user-detail-right-section .user-detail-buttons .btn {
            font-size: 24px !important;
            padding: 12px 25px !important;
            width: 224px !important;
            margin-right: 1px !important;
            margin-bottom: 20px !important;
        }

        /*@media (min-width: 530px) {*/
        /*    .db-sm-none {*/
        /*        display: none;*/
        /*    }*/
        /*}*/

        @media (min-width: 1697px) {
            .user-inner {
                height: 220px;
            }
        }

        @media (max-width: 576px) {
            .img-right {
                width: 130px;
            }

            .img-left {
                width: 130px;
            }
        }

        @media (max-width: 1200px) {
            .user-inner {
                height: 216px;
            }
        }
    </style>
@endsection
@section ('content')
    <div class="scrollbar-container">
    </div>
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="c-wraper">
                        <h2>
                            <span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>
                            {{ number_format(current_user()->balance->main_balance, 2, '.', ',')}}
                        </h2>
                        <p>Main Points</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="c-wraper">
                        <h2><span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>
                            {{ number_format(current_user()->balance->group_balance, 2 , '.', ',') }}
                        </h2>
                        <p>Group Points</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <div class="card">
                    <div class="c-wraper">
                        <h2><span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>
{{--                            {{ number_format(current_user()->balance->mall_balance, 2, '.', ',') }}--}}
                        </h2>
                        <p>Mall Points</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="card">
                    <div class="c-wraper">
                        <h2>
                            <span><i class="fal fa-badge-dollar" style="font-weight: 300;"></i></span>
                            {{ 0 }}
                        </h2>
                        <p>Silver Pack</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="card">
                    <div class="c-wraper">
                        <h2>
                            <span>
                                <i class="fal fa-badge-dollar" style="font-weight: 300;"></i>
                            </span>
{{--                            {{ number_format($adPacksValue, 0, '.', ',') }}--}}
                        </h2>
                        <p>Gold Pack</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section ('page-script')
@endsection
