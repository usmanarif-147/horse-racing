@extends('layouts.app', ['title' => __('User Profile')])


@push('css')
    <style>

        #track-race-list_filter {
            padding-right: 20px;
        }

        #track-race-list_length {
            padding-left: 20px;
        }

        #track-race-list_info {
            padding-left: 20px;
        }

        #track-race-list_paginate {
            padding-right: 20px;
        }
    </style>
@endpush

@section('content')

    @include('users.partials.header', [
        'title' => 'Tracks'
        ])
    <div class="main-content" id="panel">
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-3 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="card-body pt-0 pt-md-4">
                            <div class="text-center mt-3">
                                <input type="hidden" id="track-id" value="{{$track[0]->track_id}}">
                                <h3>
                                    Track: <span class="font-weight-light">{{ $track[0]->name }}</span>
                                </h3>
                                <h3>
                                    Races: <span class="font-weight-light">{{ $track[0]->races_count }}</span>
                                </h3>
                                <h3>
                                    Betfair Name: <span class="font-weight-light">{{ $track[0]->betfair_name }}</span>
                                </h3>
                                <h3>
                                    Latitude: <span class="font-weight-light">{{ $track[0]->latitude }}</span>
                                </h3>
                                <h3>
                                    Longitude: <span class="font-weight-light">{{ $track[0]->longitude }}</span>
                                </h3>
                                <h3>
                                    Link Info: <span class="font-weight-light">
                                        <a target="_blank" href="{{ $track[0]->link_info }}">{{ $track[0]->link_info }}</a>
                                    </span>
                                </h3>
                                <h3>
                                    Comments: <span class="font-weight-light">{{ empty($track[0]->comments) ? 'No comments' : $track[0]->comments}}
                                    </span>
                                </h3>
                                <h3>
                                    <a href="{{route('admin.track.list')}}" class="btn btn-warning"> Tracks </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 order-xl-1">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Races List</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="track-race-list">
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
        $(document).ready(function () {
            // let track = $('#track-id').val();
            $('#track-race-list').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                scrollY: true,
                ajax: {
                    url: "{{route('admin.track.race.list.ajax')}}",
                    type: "GET",
                    data: function (d) {
                        d.track = $('#track-id').val();
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
                    // {
                    //     "data": "name",
                    // },
                    {"data": "starters"},
                    {"data": "class"},
                    {"data": "furlongs"},
                    {"data": "age"},
                    {"data": "prize"},
                    {"data": "currency"},
                    {"data": "currency"},
                    {{--{--}}
                    {{--"data": function (row) {--}}
                    {{--let url = "{{route('admin.track.show','')}}" + '/' + row.track_id;--}}
                    {{--return '<div class="dropdown">\n' +--}}
                    {{--'    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"\n' +--}}
                    {{--'       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +--}}
                    {{--'           <i class="fas fa-ellipsis-v"></i>\n' +--}}
                    {{--'    </a>\n' +--}}
                    {{--'    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">\n' +--}}
                    {{--'         <a class="dropdown-item" href="' + url + '">View</a>\n' +--}}
                    {{--'    </div>\n' +--}}
                    {{--' </div>';--}}
                    {{--},--}}
                    {{--orderable: false,--}}
                    {{--searchable: false--}}
                    {{--},--}}
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
