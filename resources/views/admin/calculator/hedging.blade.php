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
        'title' => 'Hedging Calculator'
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
                                    <p class="display-4 text-white"> Hedging Calculator </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-contact" role="tabpanel"
                                     aria-labelledby="nav-contact-tab">
                                    <div class="row mb-3">
                                        <p>
                                            Simply fill in the boxes with your back price, stake and lay
                                            price then click the recalculate button to see how much you
                                            should lay (shown in red) at the specified price to
                                            guarantee an equal profit win or lose.
                                        </p>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-12 bg-default pt-1 pb-1 pl-1">
                                                    <span class="text-white">Bet Details - use decimal odds</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-1 pb-1 pl-1" style="background: #999">
                                                    <span class="text-white">Back price</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" id="back-price" value="3">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-1 pb-1 pl-1" style="background: #999">
                                                    <span class="text-white">Back stake</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" id="back-stake" value="100">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-1 pb-1 pl-1" style="background: #999">
                                                    <span class="text-white">Lay price</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" id="lay-price" value="2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 offset-md-2">
                                            <span class="text-white"></span>
                                            <div class="row">
                                                <div class="col-md-12 bg-default pt-1 pb-1 pl-1">
                                                    <span class="text-white">Commission</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-1 pb-1 pl-1" style="background: #999">
                                                    <span class="text-white">Back</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <select id="back" size="1" tabindex="1">
                                                        <option value="0.0" selected="">0%
                                                        </option>
                                                        <option value="7.0">7.0%</option>
                                                        <option value="6.5">6.5%</option>
                                                        <option value="6.0">6.0%</option>
                                                        <option value="5.5">5.5%</option>
                                                        <option value="5.0">5.0%</option>
                                                        <option value="4.9">4.9%</option>
                                                        <option value="4.8">4.8%</option>
                                                        <option value="4.7">4.7%</option>
                                                        <option value="4.6">4.6%</option>
                                                        <option value="4.5">4.5%</option>
                                                        <option value="4.4">4.4%</option>
                                                        <option value="4.3">4.3%</option>
                                                        <option value="4.2">4.2%</option>
                                                        <option value="4.1">4.1%</option>
                                                        <option value="4.0">4.0%</option>
                                                        <option value="3.9">3.9%</option>
                                                        <option value="3.8">3.8%</option>
                                                        <option value="3.7">3.7%</option>
                                                        <option value="3.6">3.6%</option>
                                                        <option value="3.5">3.5%</option>
                                                        <option value="3.4">3.4%</option>
                                                        <option value="3.3">3.3%</option>
                                                        <option value="3.2">3.2%</option>
                                                        <option value="3.1">3.1%</option>
                                                        <option value="3.0">3.0%</option>
                                                        <option value="2.9">2.9%</option>
                                                        <option value="2.8">2.8%</option>
                                                        <option value="2.7">2.7%</option>
                                                        <option value="2.6">2.6%</option>
                                                        <option value="2.5">2.5%</option>
                                                        <option value="2.4">2.4%</option>
                                                        <option value="2.3">2.3%</option>
                                                        <option value="2.2">2.2%</option>
                                                        <option value="2.1">2.1%</option>
                                                        <option value="2.0">2.0%</option>
                                                        <option value="1.9">1.9%</option>
                                                        <option value="1.8">1.8%</option>
                                                        <option value="1.7">1.7%</option>
                                                        <option value="1.6">1.6%</option>
                                                        <option value="1.5">1.5%</option>
                                                        <option value="1.4">1.4%</option>
                                                        <option value="1.3">1.3%</option>
                                                        <option value="1.2">1.2%</option>
                                                        <option value="1.1">1.1%</option>
                                                        <option value="1.0">1.0%</option>
                                                        <option value="0.0">0%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-1 pb-1 pl-1" style="background: #999">
                                                    <span class="text-white">Lay</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <select id="lay" size="1"
                                                            tabindex="1">
                                                        <option value="0.0">0%</option>
                                                        <option value="7.0">7.0%</option>
                                                        <option value="6.5">6.5%</option>
                                                        <option value="6.0">6.0%</option>
                                                        <option value="5.5">5.5%</option>
                                                        <option value="5.0" selected>5.0%</option>
                                                        <option value="4.9">4.9%</option>
                                                        <option value="4.8">4.8%</option>
                                                        <option value="4.7">4.7%</option>
                                                        <option value="4.6">4.6%</option>
                                                        <option value="4.5">4.5%</option>
                                                        <option value="4.4">4.4%</option>
                                                        <option value="4.3">4.3%</option>
                                                        <option value="4.2">4.2%</option>
                                                        <option value="4.1">4.1%</option>
                                                        <option value="4.0">4.0%</option>
                                                        <option value="3.9">3.9%</option>
                                                        <option value="3.8">3.8%</option>
                                                        <option value="3.7">3.7%</option>
                                                        <option value="3.6">3.6%</option>
                                                        <option value="3.5">3.5%</option>
                                                        <option value="3.4">3.4%</option>
                                                        <option value="3.3">3.3%</option>
                                                        <option value="3.2">3.2%</option>
                                                        <option value="3.1">3.1%</option>
                                                        <option value="3.0">3.0%</option>
                                                        <option value="2.9">2.9%</option>
                                                        <option value="2.8">2.8%</option>
                                                        <option value="2.7">2.7%</option>
                                                        <option value="2.6">2.6%</option>
                                                        <option value="2.5">2.5%</option>
                                                        <option value="2.4">2.4%</option>
                                                        <option value="2.3">2.3%</option>
                                                        <option value="2.2">2.2%</option>
                                                        <option value="2.1">2.1%</option>
                                                        <option value="2.0">2.0%</option>
                                                        <option value="1.9">1.9%</option>
                                                        <option value="1.8">1.8%</option>
                                                        <option value="1.7">1.7%</option>
                                                        <option value="1.6">1.6%</option>
                                                        <option value="1.5">1.5%</option>
                                                        <option value="1.4">1.4%</option>
                                                        <option value="1.3">1.3%</option>
                                                        <option value="1.2">1.2%</option>
                                                        <option value="1.1">1.1%</option>
                                                        <option value="1.0">1.0%</option>
                                                        <option value="0.0">0%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-12 bg-default pt-1 pb-1 pl-1">
                                                    <span class="text-white">You should lay</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mr-1"
                                                       style="font-size: 20px; display: inline-block; font-weight: bold">
                                                        £</p>
                                                    <input type="number" id="you-should-lay" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 offset-md-2">
                                            <span class="text-white"></span>
                                            <div class="row">
                                                <div class="col-md-12 bg-default pt-1 pb-1 pl-1">
                                                    <span class="text-white">To guarantee this profit</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mr-1"
                                                       style="font-size: 20px; display: inline-block; font-weight: bold">
                                                        £</p>
                                                    <input type="number" id="guarantee-profit" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-12 bg-default pt-1 pb-1 pl-1">
                                                    <span class="text-white">Total Staked</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mr-1"
                                                       style="font-size: 20px; display: inline-block; font-weight: bold">
                                                        £</p>
                                                    <input type="number" readonly="" id="total-stacked">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 offset-md-2">
                                            <span class="text-white"></span>
                                            <div class="row">
                                                <div class="col-md-12 bg-default pt-1 pb-1 pl-1">
                                                    <span class="text-white">Guaranteed Return</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mr-1"
                                                       style="font-size: 20px; display: inline-block; font-weight: bold">
                                                        £</p>
                                                    <input type="number" readonly="" id="guarantee-return">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-12 bg-default pt-1 pb-1 pl-1">
                                                    <span class="text-white">Wins</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-1 pb-1 pl-1" style="background: #999">
                                                    <span class="text-white">Back profit</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mr-1"
                                                       style="font-size: 20px; display: inline-block; font-weight: bold">
                                                        £</p>
                                                    <input type="number" readonly="" id="back-profit">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-1 pb-1 pl-1" style="background: #999">
                                                    <span class="text-white">Lay liability</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mr-1"
                                                       style="font-size: 20px; display: inline-block; font-weight: bold">
                                                        £</p>
                                                    <input type="number" readonly="" id="lay-liability">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 offset-md-2">
                                            <span class="text-white"></span>
                                            <div class="row">
                                                <div class="col-md-12 bg-default pt-1 pb-1 pl-1">
                                                    <span class="text-white">Losses</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-1 pb-1 pl-1" style="background: #999">
                                                    <span class="text-white">Lay profit</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mr-1"
                                                       style="font-size: 20px; display: inline-block; font-weight: bold">
                                                        £</p>
                                                    <input type="number" readonly="" id="lay-profit">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-1 pb-1 pl-1" style="background: #999">
                                                    <span class="text-white">Back liability </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mr-1"
                                                       style="font-size: 20px; display: inline-block; font-weight: bold">
                                                        £</p>
                                                    <input type="number" readonly="" id="back-liability">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-12 pt-1 pb-1 pl-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                               id="defaultCheck1">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Automatic recalculation
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-12 pt-1 pb-1 pl-1">
                                                    <button class="btn btn-success" id="recalculate"> Recalculate</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        let back_price = 0;
        let back_stake = 0;
        let lay_price = 0;
        let back_commision = 0;
        let lay_commision = 0;

        let should_lay = 0;
        let guarantee_profit = 0;
        let total_staked = 0;
        let guarantee_rerurn = 0;
        let back_profit = 0;
        let lay_liability = 0;
        let lay_profit = 0;
        let back_liability = 0;

        $(document).ready(function () {
            calculate();
        });

        $('#recalculate').on('click', function () {
            calculate();
        });

        function calculate() {
            back_price = $('#back-price').val();
            back_stake = $('#back-stake').val();
            lay_price = $('#lay-price').val();
            back_commision = $('#back').val();
            lay_commision = $('#lay').val();

            should_lay = shouldLay(parseFloat(back_price), parseFloat(back_stake),
                parseFloat(back_commision), parseFloat(lay_price), parseFloat(lay_commision));
            back_profit = backProfit(parseFloat(back_price), parseFloat(back_stake), parseFloat(back_commision));
            lay_liability = layLiability(should_lay, lay_price);
            back_liability = backLiability(back_stake);
            lay_profit = layProfit(should_lay, lay_commision);
            guarantee_profit = guaranteeProfit(back_profit, lay_liability);

            $('#you-should-lay').val(should_lay);
            $('#back-profit').val(back_profit);
            $('#lay-liability').val(lay_liability);
            $('#back-liability').val(back_liability);
            $('#lay-profit').val(lay_profit);
            $('#guarantee-profit').val(guarantee_profit);
        }

        function shouldLay(bp, bs, bc, lp, lc) {
            return Number(((bp-1) * bs * (1-bc/100) + bs) / (lp - lc/100)).toFixed(2);
        }

        function backProfit(bp, bs, bc){
            return Number(((bp-1) * bs * (1-bc/100))).toFixed(2);
        }

        function layLiability(sl, lp){
            return Number(sl * (lp - 1)).toFixed(2);
        }

        function backLiability(bs) {
            return Number(bs).toFixed(2);
        }

        function layProfit(sl, lc) {
            return Number(sl * (1 - lc/100)).toFixed(2);
        }

        function guaranteeProfit(bp, ll) {
            return Number(bp - ll).toFixed(2);
        }
    </script>
@endpush
