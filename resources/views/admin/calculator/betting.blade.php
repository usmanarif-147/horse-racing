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

        input[type=text] {
            width: 50%;
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
        'title' => 'Betting Calculator'
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
                                    <p class="display-4 text-white"> Betting Calculator </p>
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
                                </div>

                                <form id="bet-form">
                                    <div class="row bg-success p-0 text-white">
                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center my-auto">
                                                <label for="colFormLabel"
                                                       class="col-sm-2 col-form-label">Stake: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" id="stake" class="number-separator">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check">
                                                <input type="checkbox"
                                                       style="height:20px; width:20px; vertical-align: middle;"
                                                       id="check-each-way">
                                                <label class="form-check-label " for="exampleCheck1">Each way</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               name="options" id="single-radio" class="radio-option"
                                                               value="1">
                                                        <label class="form-check-label">Single</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="radio" name="options"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               id="double-radio" class="radio-option" value="1">
                                                        <label class="form-check-label">Double</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="treble-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               type="radio" class="radio-option" value="1">
                                                        <label class="form-check-label">Treble</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="accumulator-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               type="radio" class="radio-option" value="1">
                                                        <label class="form-check-label">Accumulator (4+)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="trixie-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               type="radio" class="radio-option" value="4">
                                                        <label class="form-check-label">Trixie</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="patent-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               type="radio" class="radio-option" value="7">
                                                        <label class="form-check-label">Patent</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="yankee-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               class="radio-option"
                                                               type="radio" value="11">
                                                        <label class="form-check-label">Yankee</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="l-15-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               class="radio-option"
                                                               type="radio" value="15">
                                                        <label class="form-check-label">Lucky 15</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="canadian-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               class="radio-option"
                                                               type="radio" value="26">
                                                        <label class="form-check-label">Canadian</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="l-31-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               class="radio-option"
                                                               type="radio" value="31">
                                                        <label class="form-check-label">Lucky 31</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="heinz-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               class="radio-option"
                                                               type="radio" value="57">
                                                        <label class="form-check-label">Heinz</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input name="options" id="l-63-radio"
                                                               style="height:20px; width:20px; vertical-align: middle;"
                                                               class="radio-option"
                                                               type="radio" value="63">
                                                        <label class="form-check-label">Lucky 63</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col" style="width: 75px" class="text-white text-center">
                                                        Format
                                                    </th>
                                                    <th scope="col" style="width: 280px" class="text-white text-center">
                                                        Fraction
                                                    </th>
                                                    <th scope="col" style="width: 280px" class="text-white text-center">
                                                        Decimal
                                                    </th>
                                                    <th scope="col" style="width: 280px" class="text-white text-center">
                                                        Each Way
                                                    </th>
                                                    <th scope="col" style="width: 75px" class="text-white text-center">
                                                        1st
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th scope="col" style="width: 75px"></th>
                                                    <th scope="col" style="width: 280px" class="text-center">
                                                        <input type="radio" class="radio-choose" name="choose"
                                                               id="fraction"
                                                               style="height:30px; width:30px; vertical-align: middle;">
                                                    </th>
                                                    <th scope="col" style="width: 280px" class="text-center">
                                                        <input type="radio" class="radio-choose" name="choose"
                                                               id="decimal"
                                                               style="height:30px; width:30px; vertical-align: middle;">
                                                    </th>
                                                    <th scope="col" style="width: 280px"></th>
                                                    <th scope="col" style="width: 75px"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td style="width: 75px" class="text-center">Bet 1</td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" maxlength="5"> <span>/</span> <input
                                                                type="text" maxlength="5">
                                                    </td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" maxlength="5"
                                                               class="number-separator"
                                                               name="decimal[]">
                                                    </td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" class="text-center" maxlength="5"> / <input
                                                                type="text" maxlength="5">
                                                    </td>
                                                    <td style="width: 75px" class="text-center">
                                                        <input type="checkbox"
                                                               style="height:30px; width:30px; vertical-align: middle;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 75px" class="text-center">Bet 1</td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" maxlength="5"> <span>/</span> <input
                                                                type="text" maxlength="5">
                                                    </td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" maxlength="5"
                                                               class="number-separator"
                                                               name="decimal[]">
                                                    </td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" class="text-center" maxlength="5"> / <input
                                                                type="text" maxlength="5">
                                                    </td>
                                                    <td style="width: 75px" class="text-center">
                                                        <input type="checkbox"
                                                               style="height:30px; width:30px; vertical-align: middle;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 75px" class="text-center">Bet 1</td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" maxlength="5"> <span>/</span> <input
                                                                type="text" maxlength="5">
                                                    </td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" maxlength="5"
                                                               class="number-separator"
                                                               name="decimal[]">
                                                    </td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" class="text-center" maxlength="5"> / <input
                                                                type="text" maxlength="5">
                                                    </td>
                                                    <td style="width: 75px" class="text-center">
                                                        <input type="checkbox"
                                                               style="height:30px; width:30px; vertical-align: middle;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 75px" class="text-center">Bet 1</td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" maxlength="5"> <span>/</span> <input
                                                                type="text" maxlength="5">
                                                    </td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" maxlength="5"
                                                               class="number-separator"
                                                               name="decimal[]">
                                                    </td>
                                                    <td style="width: 280px" class="text-center">
                                                        <input type="text" class="text-center" maxlength="5"> / <input
                                                                type="text" maxlength="5">
                                                    </td>
                                                    <td style="width: 75px" class="text-center">
                                                        <input type="checkbox"
                                                               style="height:30px; width:30px; vertical-align: middle;">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <button class="btn btn-warning"> Reset</button>
                                            <button class="btn btn-default" type="submit" id="calculate"> Calculate
                                            </button>
                                        </div>
                                    </div>
                                </form>


                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="colFormLabel"
                                                   class="col-sm-3 bg-default text-white col-form-label">Outlay
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" id="outlay" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="colFormLabel"
                                                   class="col-sm-3 bg-default text-white col-form-label">Stake
                                                (£)</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="stake" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="colFormLabel"
                                                   class="col-sm-3 bg-default text-white col-form-label">Stake
                                                (£)</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="stake" readonly>
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

        let choose = '';
        let stake = '';
        let radio_option = 1;

        $(document).ready(function () {
            // Currency Separator
            var commaCounter = 10;

            function numberSeparator(Number) {
                Number += '';

                for (var i = 0; i < commaCounter; i++) {
                    Number = Number.replace(',', '');
                }

                x = Number.split('.');
                y = x[0];
                z = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;

                while (rgx.test(y)) {
                    y = y.replace(rgx, '$1' + ',' + '$2');
                }
                commaCounter++;
                return y + z;
            }

            // Set Currency Separator to input fields
            $(document).on('keypress , paste', '.number-separator', function (e) {
                if (/^-?\d*[,.]?(\d{0,3},)*(\d{3},)?\d{0,3}$/.test(e.key)) {
                    $('.number-separator').on('input', function () {
                        e.target.value = numberSeparator(e.target.value);
                    });
                } else {
                    e.preventDefault();
                    return false;
                }
            });
        })

        $(".radio-option").change(function () {
            if ($(this).is(":checked")) {
                let radio_option = parseInt($(this).val());
                // $('#outlay').val(parseInt(radio_option) * parseFloat($('#stake').val()));
            }
        });

        $(".radio-choose").change(function () {
            choose = $(this).attr('id');
        });

        $('#calculate').on('click', function (e) {
            e.preventDefault();
            if ($('#stake').val() === '') {
                alert("please enter valid stake")
            } else {
                stake = parseFloat($('#stake').val().replace(/,/g, ''));
            }

            if (choose !== '') {
                if (choose === 'decimal') {
                    alert("decimal selected")
                }
                if (choose === 'fraction') {
                    alert("fraction selected")
                }
            }

            // if(r)

            // e.preventDefault();
            // let formData = new FormData(this);
            // let decimal_array = [];
            //
            // for (let pair of formData.entries()) {
            //     if (pair[1] === '') {
            //         decimal_array.push(0)
            //     }
            //     else {
            //         decimal_array.push(parseInt(pair[1]))
            //     }
            // }
        });

        // $('#bet-form').on('submit', function (e) {
        //
        //     if($('#stake').val() === ''){
        //         alert("Please enter valid stake")
        //     }
        //
        //     e.preventDefault();
        //     let formData = new FormData(this);
        //     let decimal_array = [];
        //
        //     for (let pair of formData.entries()) {
        //         if (pair[1] === '') {
        //             decimal_array.push(0)
        //         }
        //         else {
        //             decimal_array.push(parseInt(pair[1]))
        //         }
        //     }
        // });

    </script>
@endpush

