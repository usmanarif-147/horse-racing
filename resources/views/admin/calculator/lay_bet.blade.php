@extends('layouts.app', ['title' => __('User Profile')])
@push('css')
    <style>

        #race-horse-list_filter {
            padding-right: 20px;
        }

        #race-horse-list_length {
            padding-left: 20px;
        }

        #race-horse-list_info {
            padding-left: 20px;
        }

        #race-horse-list_paginate {
            padding-right: 20px;
        }

        input[type=number], select {
            width: 80%;
            padding: 6px 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
    </style>
@endpush

@section('content')

    @include('users.partials.header', [
        'title' => 'Lay Bet Calculator'
        ])
    <div class="main-content" id="panel">
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0 pt-4 pt-md-2 pb-0 pb-md-2 bg-default">
                            <div class="row">
                                <div class="col-xl-10 mt-3">
                                    <p class="display-4 text-white"> Lay Bet Calculator </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-contact" role="tabpanel"
                                     aria-labelledby="nav-contact-tab">
                                    <p>
                                        <strong>Not sure how a lay bet works? Assess your potential winnings and
                                            liability with our lay bet calculator</strong>
                                    </p>
                                    <form>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Stake (£)</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control"
                                                       id="stake" step="0.10" value="0.00">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Odds</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control"
                                                       id="odds" value="1.00" step="0.10">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Commission
                                                (%)</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control"
                                                       id="commission" step="1" value="0">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Liability:</label>
                                            <div class="col-sm-6">
                                                £<span id="liability-result">0</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Commission:</label>
                                            <div class="col-sm-6">
                                                £<span id="commission-result">0</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Profit:</label>
                                            <div class="col-sm-6">
                                                £<span id="profit-result">0</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Return:</label>
                                            <div class="col-sm-6">
                                                £<span id="return-result">0</span>
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
    </div>

@endsection

@push('js')
    <script>
        let stake = 0;
        let odds = 0;
        let commission = 0;

        let liability_result = 0;
        let profit_result = 0;
        let return_result = 0;

        $(document).on('input', '#stake, #odds, #commission', function () {
            calculate();
        });

        function calculate() {
            stake = $('#stake').val();
            odds = $('#odds').val();
            commission = $('#commission').val();

            if (stake === '') {
                stake = 0;
            }
            if (odds === '') {
                odds = 0;
            }
            if (commission === '') {
                commission = 0;
            }

            liability_result = calculateLiability(parseFloat(stake), parseFloat(odds));
            profit_result = calculateProfit(parseFloat(stake), parseFloat(commission));
            return_result = calculateReturn(parseFloat(liability_result), parseFloat(profit_result));

            $('#liability-result').html(liability_result);
            $('#profit-result').html(profit_result);
            $('#commission-result').html(commission);
            $('#return-result').html(return_result);

        }

        function calculateLiability(s, o) {
            return Number(s * (o - 1)).toFixed(2);
        }

        function calculateProfit(s, c) {
            return Number(s * (1 - c / 100)).toFixed(2);
        }

        function calculateReturn(lr, pr) {
            console.log(typeof(lr));
            return Number(lr + pr).toFixed(2);
        }

    </script>
@endpush

