@extends ('layouts.app')
@section('title')
    <title>Transfer Balance - Mereow</title>
@endsection
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

    /* @media (max-width: 576px) and (min-width: 320px) {
            .new-form-container .nav-tabs a.nav-link {
                width: 90px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        } */

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
                    <h2 class="purchase-pin-ammount"> {{ number_format(current_user()->balance->group_balance, 2, '.', ',') }} </h2>
                </div>
                <ul role="tablist" class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#transfer-balance" role="tab" data-toggle="tab" class="nav-link active"
                           aria-selected="true">
                            <i class="fal fa-share-square mr-2"></i>
                            Transfer Balance
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
                        <div class="alert alert-info">
                            <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span>Transfer your Group Points to Main Points
                            and use them for purchases, sharing and withdrawal.</span>
                        </div>
                        <form method="POST" action="{{ '/transfer-group-balance/'. current_user()->id }}"
                              id="transfer-group-balance-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="amount">Amount:</label>
                                        <input type="number" id="amount" name="amount" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="modal-btn" class="btn btn-default">
                                Transfer Balance
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
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ number_format($transaction->transaction_amount, 2, '.', ',') }}</td>
                                        <td>{{ $transaction->trans_date_time }}</td>
                                    </tr>
                                @endforeach
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
        $("#transfer-group-balance-form").on('keydown', (e) => {
            if (e.keyCode === 13) {
                e.preventDefault();
                axios.post('/getGroupBalanceFee', {
                    "amount": $("#amount").val(),
                }).then(function (response) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Are you sure you want to Transfer $' + response.data.amount + ' the Main Balance with fee $' + response.data.fee + '!',
                        position: "top",
                        showCancelButton: true,
                        confirmButtonColor: '#218838',
                        cancelButtonColor: '#c82333',
                        confirmButtonText: 'Proceed!'
                    }).then((result) => {
                        if (result.value) {
                            $("#transfer-group-balance-form").submit()
                        }
                    })
                }).catch((error) => {
                    const errors = error.response.data.errors
                    const firstItem = Object.keys(errors)[0];
                    const firstErrorMessage = errors[firstItem][0]
                    
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: false,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    Toast.fire({
                        icon: 'error',
                        title: firstErrorMessage
                    });
                });
            }
        })
        $("#modal-btn").on('click', function () {
            axios.post('/getGroupBalanceFee', {
                "amount": $("#amount").val(),
            }).then(function (response) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Are you sure you want to Transfer $' + response.data.amount + ' the Main Balance with fee $' + response.data.fee + '!',
                    position: "top",
                    showCancelButton: true,
                    confirmButtonColor: '#218838',
                    cancelButtonColor: '#c82333',
                    confirmButtonText: 'Proceed!'
                }).then((result) => {
                    if (result.value) {
                        $("#transfer-group-balance-form").submit()
                    }
                })
            }).catch((error) => {
                const errors = error.response.data.errors
                const firstItem = Object.keys(errors)[0];
                const firstErrorMessage = errors[firstItem][0]
                
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: false,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                Toast.fire({
                    icon: 'error',
                    title: firstErrorMessage
                });
            });
        })
    
    </script>
@endsection