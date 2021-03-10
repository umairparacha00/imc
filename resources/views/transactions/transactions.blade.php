@extends ('layouts.app')
@section('title')
    <title>Transactions - Mereow</title>
@endsection
@section('style')
    <style type="text/css">
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
            padding-top: 2.4em;
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
        
        .custom-page-digits>a,
        .custom-page-item>a {
            color: #9a9a9a !important;
        }
        
        .page-item.active .page-link {
            background-color: #FF9F43;
            border-color: #FF9F43;
            color: #ffffff !important;
        }
       
        @media (min-width: 280px) and (max-width: 575px) {
            .new-form-container h1 {
                font-size: 28px;
            }
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
            <h1>Transactions</h1>
            <div class="tab-content">
                <div>
                    <!---->
                    <div class="table-responsive">
                        <table class="table table-bordered t_t1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>CR/DR</th>
                                <th>Amount</th>
                                <th>Old Balance</th>
                                <th>New Balance</th>
                                <th style="width: 330px;">Detail</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->balance_field }}</td>
                                    <td>{{ $transaction->credit_debit }}</td>
                                    <td>{{ number_format($transaction->transaction_amount, 2, '.', ',') }}</td>
                                    <td>{{ number_format($transaction->old_balance, 2, '.', ',') }}</td>
                                    <td>{{ number_format($transaction->new_balance, 2, '.', ',') }}</td>
                                    <td style="width: 100px;">{{ $transaction->transactions_details }}
                                    </td>
                                    <td>{{ $transaction->trans_date_time }}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $transactions->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section ('page-script')
@endsection