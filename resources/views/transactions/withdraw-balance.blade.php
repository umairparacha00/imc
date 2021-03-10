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

    .amount-heading {
        background-image: url(assets/images/layer.png);
        background-repeat: repeat-x;
        background-position: 0 0;
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        align-items: baseline;
    }

    .purchase-pin-title {
        padding: 1.3em;
        color: #fff;
        font-size: 1.5rem;
        text-align: center;
    }

    .purchase-pin-ammount {
        color: #fff;
        text-align: center;
        font-size: 2.125rem;
        float: right;
        padding: .95em;
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

    .wb-50 {
        table-layout: auto;
        width: 100%;
    }

    .wb-50 thead {
        background: #f1f2f7;
    }

    .wb-50 thead th {
        vertical-align: middle;
        font-weight: 600;
        color: #212529;
        border: 1px solid #e7e7e7;
    }

    .wb-50 tbody tr {
        vertical-align: middle;
    }

    .wb-50 tbody tr td {
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
            <div class="amount-heading">
                <h2 class="purchase-pin-title">Transferable Balance:</h2>
                <h2 class="purchase-pin-ammount"> 14.48 </h2>
            </div>
            <ul role="tablist" class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#withdraw-balance" role="tab" data-toggle="tab" class="nav-link active" aria-selected="true"><i class="fal fa-usd-square mr-2"></i> Withdraw
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#withdraw-history" role="tab" data-toggle="tab" class="nav-link" aria-selected="false"><i class="fal fa-history mr-2"></i> History
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" id="withdraw-balance" class="tab-pane fade in active show">
                    <form autocomplete="off" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="withdraw_amount">Amount:</label>
                                <input type="number" placeholder="e.g. 100" min="5" id="withdraw_amount" class="form-control">
                                <button type="submit" data-toggle="modal" data-target="#feeModel" class="btn btn-default mt-3">Withdraw
                                    Balance
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" id="withdraw-history" class="tab-pane fade">
                    <div class="table-responsive">
                        <table class="table wb-50">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Withdraw Pin</th>
                                    <th>Amount</th>
                                    <th>Dated</th>
                                    <th>Detail</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section ('page-script')
@endsection