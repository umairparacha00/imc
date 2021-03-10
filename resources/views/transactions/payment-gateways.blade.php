@extends ('layouts.app')
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
        height: 5px;
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
        font-family: Lato-Bold, sans-serif;
    }

    .new-form-container h1:after {
        display: block;
        content: "";
        height: 6px;
        background-color: #FF9F43;
        width: 106px;
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

    .select-top-spacing {
        padding-top: 1.92em;
    }

    .t_t1 thead {
        background: #f1f2f7;
    }

    .t_t1 thead th {
        color: #212529;
        border: 1px solid #e7e7e7;
    }

    .t_t1 tbody tr td {
        color: inherit;
        border: 1px solid #e7e7e7;
        font-size: 1rem;
    }

    .custom-page-digits {
        padding-right: 8px;
    }

    .custom-page-digits>a,
    .custom-page-item>a {
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
        <h1>Payments Gateways</h1>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item">
                <a href="#add_gate_area" role="tab" data-toggle="tab" class="nav-link active" aria-selected="false"><i class="fal fa-plus-hexagon mr-2"></i> Add Gateway</a>
            </li>
            <li class="nav-item">
                <a href="#added_gate_area" role="tab" data-toggle="tab" class="nav-link" aria-selected="false"><i class="fal fa-file-alt mr-2"></i> Added Gateways</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" id="add_gate_area" class="tab-pane fade show active">
                <!---->
                <div class="row">
                    <div class="col-12 mb-5">
                        <form autocomplete="off" method="post" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group">
                                        <label for="account_type" class="control-label">Payment
                                            Method</label>
                                        <select id="account_type" required="required" class="form-control custom-select-lg">
                                            <option selected disabled class="custom-option">Choose a payment method
                                            </option>
                                            <option value="1">JazzCash
                                            </option>
                                            <option value="2">EasyPaisa
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group">
                                        <label for="account_title" class="control-label">
                                            Account Title
                                        </label>
                                        <input type="text" placeholder="e.g. Muhammad Saad" id="account_title" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group">
                                        <label for="account_number" class="control-label">
                                            Account #
                                        </label>
                                        <input type="text" placeholder="e.g. 03001234567" id="account_number" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5"></div>
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="alert alert-info" style=""><span>This report range is From:
                                        <strong>2020-06-01 00:00:00</strong> To: <strong>2020-06-30
                                            23:59:59</strong></span> <button type="button" data-dismiss="alert"
                                        aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div> -->

            </div>
            <div role="tabpanel" id="added_gate_area" class="tab-pane fade show">
                <div class="table-responsive">
                    <table class="table table-bordered t_t1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Account Type</th>
                                <th>Account Title</th>
                                <th>Amount Number</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>1157182505</td>
                            <td>main_balance</td>
                            <td>Credit</td>
                            <td>$1.3072</td>
                            <td>$15.7918</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section ('page-script')
@endsection