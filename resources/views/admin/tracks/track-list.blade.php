@extends('layouts.app', ['title' => __('User Profile')])


@push('css')
    <style>
        #tracks-list_filter {
            padding-right: 20px;
        }

        #tracks-list_length {
            padding-left: 20px;
        }

        #tracks-list_info {
            padding-left: 20px;
        }

        #tracks-list_paginate {
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
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Tracks table</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="tracks-list">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Name</th>
                                    <th scope="col" class="sort" data-sort="budget">Betfair Name</th>
                                    <th scope="col" class="sort" data-sort="status">Latitude</th>
                                    <th scope="col" class="sort" data-sort="status">Longitude</th>
                                    <th scope="col" class="sort" data-sort="status">Link Info</th>
                                    <th scope="col" class="sort" data-sort="status">Comments</th>
                                    <th scope="col" class="sort" data-sort="status">Total Races</th>
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
            $('#tracks-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('admin.track.list.ajax')}}",
                    type: "GET",
                    // dataSrc: function ( json ) {
                    //     console.log(json);
                    //     return json;
                    // }
                },
                columns: [
                    {
                        "data": "name",
                        "render": function (data, type, row, meta) {
                            let url = "{{route('admin.track.show','')}}" + '/' + row.track_id;
                            data = '<a href="' + url + '">' + data + '</a>';
                            return data;
                        }
                    },
                    {"data": "betfair_name"},
                    {"data": "latitude"},
                    {"data": "longitude"},
                    {
                        "data": "link_info",
                        "render": function (data, type, row, meta) {
                            if(data){
                                return '<a target="_blank" href="' + data + '">' + data + '</a>'
                            }
                            return '---';
                        }
                    },
                    {
                        "data": "comments",
                        "render": function (data, type, row, meta) {
                            if(data){
                                return data;
                            }
                            return '---';
                        }
                    },
                    {
                        "data": "races_count",
                        searchable: false
                    },
                    {
                        "data": function (row) {
                            let url = "{{route('admin.track.show','')}}" + '/' + row.track_id;
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
                    {{--'processing': "<img style='width:50px; height:50px;' src='{{asset('1amw.gif')}}' />",--}}
                },
            });
        })
    </script>
@endpush
