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
    </style>
@endpush

@section('content')

    @include('users.partials.header', [
        'title' => 'Race'
        ])
    <div class="main-content" id="panel">
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-3 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="card-body pt-0 pt-md-4">
                            <div class="text-center mt-3">
                                <input type="hidden" id="race-id" value="{{$race[0]->race_id}}">
                                <h3>
                                    Race: <span class="font-weight-light">{{ $race[0]->name }}</span>
                                </h3>
                                <h3>
                                    Horses: <span class="font-weight-light">{{ $race[0]->horses_count }}</span>
                                </h3>
                                <h3>
                                    Starters: <span class="font-weight-light">{{ $race[0]->starters }}</span>
                                </h3>
                                <h3>
                                    Furlongs: <span class="font-weight-light">{{ $race[0]->firlongs }}</span>
                                </h3>
                                <h3>
                                    Class: <span class="font-weight-light">{{ $race[0]->class }}</span>
                                </h3>
                                <h3>
                                    Age: <span class="font-weight-light">{{ $race[0]->age }}</span>
                                </h3>
                                <h3>
                                    Prize: <span class="font-weight-light">{{$race[0]->prize}}
                                    </span>
                                </h3>
                                <h3>
                                    <a href="{{route('admin.race.list')}}" class="btn btn-warning"> Races </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 order-xl-1">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Horses List</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="race-horse-list">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Name</th>
                                    <th scope="col" class="sort" data-sort="budget">Pedigree Name</th>
                                    <th scope="col" class="sort" data-sort="status">Country</th>
                                    <th scope="col" class="sort" data-sort="status">Dam</th>
                                    <th scope="col" class="sort" data-sort="status">Gender</th>
                                    <th scope="col" class="sort" data-sort="status">Year</th>
                                    {{--<th scope="col" class="sort" data-sort="status">Total Races</th>--}}
                                    <th scope="col" class="sort" data-sort="status">Form</th>
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
        $(document).ready(function () {
            $('#race-horse-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('admin.race.horse.list.ajax')}}",
                    type: "GET",
                    data: function (d) {
                        d.race = $('#race-id').val();
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
                            let url = "{{route('admin.horse.show','')}}" + '/' + row.horse_id;
                            data = '<a href="' + url + '">' + data + '</a>';
                            return data;
                        }
                    },
                    {"data": "pedigree_name"},
                    {"data": "country"},
                    {"data": "dam"},
                    {"data": "gender"},
                    {"data": "year"},
                    // {"data": "races_count"},
                    {
                        "data": "pivot.form"
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
