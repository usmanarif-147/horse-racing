@extends('layouts.app', ['title' => __('User Profile')])


@push('css')
    <style>
        #horse-list_filter {
            padding-right: 20px;
        }

        #horse-list_length {
            padding-left: 20px;
        }

        #horse-list_info {
            padding-left: 20px;
        }

        #horse-list_paginate {
            padding-right: 20px;
        }
    </style>
@endpush

@section('content')

    @include('users.partials.header', [
        'title' => 'Horses'
        ])
    <div class="main-content" id="panel">
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Horses table</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="horse-list">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Name</th>
                                    <th scope="col" class="sort" data-sort="budget">Pedigree Name</th>
                                    <th scope="col" class="sort" data-sort="status">Country</th>
                                    <th scope="col" class="sort" data-sort="status">Dam</th>
                                    <th scope="col" class="sort" data-sort="status">Gender</th>
                                    <th scope="col" class="sort" data-sort="status">Year</th>
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
            $('#horse-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('admin.horse.list.ajax')}}",
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
                    {"data": "races_count"},
                    {"data": "last_update"},
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
