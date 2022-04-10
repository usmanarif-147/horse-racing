@extends('layouts.app', ['title' => __('User Profile')])


@push('css')
    <style>

        #horse-race-list_filter {
            padding-right: 20px;
            margin-top: 10px;
        }

        #horse-race-list_length {
            padding-left: 20px;
        }

        #horse-race-list_info {
            padding-left: 20px;
        }

        #horse-race-list_paginate {
            padding-right: 20px;
        }
    </style>
@endpush

@section('content')

    @include('users.partials.header', [
        'title' => 'Horse'
        ])
    <div class="main-content" id="panel">
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1 mb-5 mb-xl-5">
                    <div class="card card-profile shadow" id="horseX">
                        <div class="card-header border-0 pt-4 pt-md-2 pb-0 pb-md-2 bg-default">
                            <div class="row">
                                <div class="col-xl-10 mt-3">
                                    <p class="display-4 text-white"> {{$horse[0]->name}} </p>
                                </div>
                                <div class="col-xl-2 mt-3">
                                    <a href="#racesX"
                                       class="btn btn-icon btn-sm btn-primary float-right m-1 bottom-scroll-down"
                                       type="button">
                                        <span class="btn-inner--icon"><i class="ni ni-bold-down"></i></span>
                                        <span class="btn-inner--text">{{ __('Races List') }}</span>
                                    </a>
                                    <a href="{{route('admin.horse.list')}}"
                                       class="btn btn-sm btn-warning float-right m-1">{{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="mt-3 row">
                                <div class="col-md-5">
                                    <input type="hidden" id="horse-id" value="{{$horse[0]->horse_id}}">
                                    <h3>
                                        Pedigree Name (breed): <span
                                                class="font-weight-light">{{ $horse[0]->pedigree_name }}</span>
                                    </h3>
                                    <h3>
                                        Country: <span class="font-weight-light">{{ $horse[0]->country }}</span>
                                    </h3>
                                    <h3>
                                        Dam (horse mother): <span class="font-weight-light">{{ $horse[0]->dam }}</span>
                                    </h3>
                                    <h3>
                                        Sire (horse father): <span
                                                class="font-weight-light">{{ $horse[0]->sire }}</span>
                                    </h3>
                                    <h3>
                                        Pedigree Dam (horse grandmother): <span
                                                class="font-weight-light">{{ $horse[0]->pedigree_dam }}</span>
                                    </h3>
                                    <h3>
                                        Pedigree Sire (horse grandfather): <span
                                                class="font-weight-light">{{ $horse[0]->pedigree_sire }}</span>
                                    </h3>
                                    <h3>
                                        Dam Sire (horse grandfather): <span
                                                class="font-weight-light">{{ $horse[0]->dam_sire }}</span>
                                    </h3>
                                    <h3>
                                        Sire Country: <span
                                                class="font-weight-light">{{ $horse[0]->sir_country }}</span>
                                    </h3>
                                    <h3>
                                        Dam Country: <span class="font-weight-light">{{ $horse[0]->dam_country }}</span>
                                    </h3>
                                    <h3>
                                        Gender: <span class="font-weight-light">{{ $horse[0]->gender }}</span>
                                    </h3>
                                    <h3>
                                        Year: <span class="font-weight-light">{{ $horse[0]->year }}</span>
                                    </h3>
                                    <h3>
                                        Last Update: <span class="font-weight-light">{{$horse[0]->last_update}}</span>
                                    </h3>
                                    <h3>
                                        Total Races: <span class="font-weight-light">{{ $horse[0]->races_count }}</span>
                                    </h3>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        {{--horse statistics--}}
                                        <div class="col-md-4">
                                            <h3>
                                                BDP: <span
                                                        class="font-weight-light">{{ $horse[0]->bdp }}</span>
                                            </h3>
                                            <h3>
                                                IDP: <span class="font-weight-light">{{ $horse[0]->idp }}</span>
                                            </h3>
                                            <h3>
                                                CDP: <span class="font-weight-light">{{ $horse[0]->cdp }}</span>
                                            </h3>
                                            <h3>
                                                SDP: <span class="font-weight-light">{{ $horse[0]->sdp }}</span>
                                            </h3>
                                            <h3>
                                                PDP: <span class="font-weight-light">{{ $horse[0]->pdp }}</span>
                                            </h3>
                                            <h3>
                                                DI: <span class="font-weight-light">{{ $horse[0]->di }}</span>
                                            </h3>
                                            <h3>
                                                CD:<span class="font-weight-light">{{$horse[0]->cd}}</span>
                                            </h3>
                                            <h3>
                                                DP SUM: <span class="font-weight-light">{{ $horse[0]->dp_sum }}</span>
                                            </h3>
                                            <h3>
                                                PATB: <span class="font-weight-light">{{ $horse[0]->patb }}</span>
                                            </h3>
                                            <h3>
                                                DI DIST:<span
                                                        class="font-weight-light">{{$horse[0]->di_dist}}</span>
                                            </h3>
                                            <h3>
                                                CD DIST:<span
                                                        class="font-weight-light">{{$horse[0]->cd_dist}}</span>
                                            </h3>
                                            <h3>
                                                MAJOR:<span class="font-weight-light">{{$horse[0]->major}}</span>
                                            </h3>
                                        </div>

                                        {{--sire statistics--}}
                                        <div class="col-md-4">
                                            <h3>
                                                Sire BDP:<span
                                                        class="font-weight-light">{{ $horse[0]->sir_bdp }}</span>
                                            </h3>
                                            <h3>
                                                Sire IDP:<span class="font-weight-light">{{ $horse[0]->sir_idp }}</span>
                                            </h3>
                                            <h3>
                                                Sire CDP: <span class="font-weight-light">{{ $horse[0]->sir_cdp }}</span>
                                            </h3>
                                            <h3>
                                                Sire SDP: <span class="font-weight-light">{{ $horse[0]->sir_sdp }}</span>
                                            </h3>
                                            <h3>
                                                Sire PDP: <span class="font-weight-light">{{ $horse[0]->sir_pdp }}</span>
                                            </h3>
                                            <h3>
                                                Sire SUM: <span class="font-weight-light">{{ $horse[0]->sir_sum }}</span>
                                            </h3>
                                        </div>

                                        {{--dam statistics--}}
                                        <div class="col-md-4">
                                            <h3>
                                               Dam BDP:<span
                                                        class="font-weight-light">{{ $horse[0]->dam_bdp }}</span>
                                            </h3>
                                            <h3>
                                                Dam IDP:<span class="font-weight-light">{{ $horse[0]->dam_idp }}</span>
                                            </h3>
                                            <h3>
                                                Dam CDP: <span class="font-weight-light">{{ $horse[0]->dam_cdp }}</span>
                                            </h3>
                                            <h3>
                                                Dam SDP: <span class="font-weight-light">{{ $horse[0]->dam_sdp }}</span>
                                            </h3>
                                            <h3>
                                               Dam PDP: <span class="font-weight-light">{{ $horse[0]->dam_pdp }}</span>
                                            </h3>
                                            <h3>
                                                Dam SUM: <span class="font-weight-light">{{ $horse[0]->dam_sum }}</span>
                                            </h3>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 order-xl-2">
                    <div class="card" id="racesX">
                        <!-- Card header -->
                        <div class="card-header border-0 pt-4 pt-md-2 pb-0 pb-md-2 bg-default">
                            <div class="row">
                                <div class="col-xl-10 mt-3">
                                    <p class="display-4 text-white"> Races </p>
                                </div>
                                <div class="col-xl-2 mt-3">
                                    <a href="#horseX"
                                       class="btn btn-icon btn-sm btn-primary float-right m-1 bottom-scroll-up"
                                       type="button">
                                        <span class="btn-inner--icon"><i class="ni ni-bold-up"></i></span>
                                        <span class="btn-inner--text">{{ __('Horse Details') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="horse-race-list">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Name</th>
                                    <th scope="col" class="sort" data-sort="budget">Starters</th>
                                    <th scope="col" class="sort" data-sort="status">Class</th>
                                    <th scope="col" class="sort" data-sort="status">Furlongs</th>
                                    <th scope="col" class="sort" data-sort="status">Age</th>
                                    <th scope="col" class="sort" data-sort="status">Prize</th>
                                    <th scope="col" class="sort" data-sort="status">Currency</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('js')
    <script>

        $(document).on('click', 'a.bottom-scroll-down', function (event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 1000, function () {
                });
                return false;
            } // End if
        });

        $(document).on('click', 'a.bottom-scroll-up', function (event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 1000, function () {
                });
                return false;
            } // End if
        });

        $(document).ready(function () {
            $('#horse-race-list').DataTable({
                processing: true,
                serverSide: true,
                bLengthChange: false,
                ajax: {
                    url: "{{route('admin.horse.race.list.ajax')}}",
                    type: "GET",
                    data: function (d) {
                        d.horse = $('#horse-id').val();
                    },
                    // dataSrc: function ( json ) {
                    //     console.log(json);
                    //     return json;
                    // }
                },
                columns: [
                    {
                        "data": "name",
                        "render": function (data, type, row, meta) {
                            let url = "{{route('admin.race.show','')}}" + '/' + row.race_id;
                            data = '<a href="' + url + '">' + data + '</a>';
                            return data;
                        }
                    },
                    {"data": "starters"},
                    {"data": "class"},
                    {"data": "furlongs"},
                    {"data": "age"},
                    {"data": "prize"},
                    {"data": "currency"},
                    {
                        "data": function (row) {
                            let url = "{{route('admin.race.show','')}}" + '/' + row.race_id;
                            return '<div class="dropdown">\n' +
                                '    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"\n' +
                                '       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +
                                '           <i class="fas fa-ellipsis-v"></i>\n' +
                                '    </a>\n' +
                                '    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">\n' +
                                '         <a class="dropdown-item" href="' + url + '">View</a>\n' +
                                '    </div>\n' +
                                ' </div>';
                        },
                        orderable: false,
                        searchable: false
                    },
                ],
                language: {
                    'paginate': {
                        'previous': '<span class="prev-icon"> <i class="fas fa-angle-left"></i> </span>',
                        'next': '<span class="next-icon"> <i class="fas fa-angle-right"></i> </span>'
                    },
                    'processing': "<img style='width:50px; height:50px;' src='{{asset('1amw.gif')}}' />",
                },
            });
        })
    </script>
@endpush
