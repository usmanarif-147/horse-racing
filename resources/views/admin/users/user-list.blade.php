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
        'title' => 'Users'
        ])
    <div class="main-content" id="panel">
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="mb-0">Users table</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('admin.create.user')}}" class="btn btn-success float-right mb-0">Create New User</a>
                                </div>
                            </div>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="tracks-list">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Name</th>
                                    <th scope="col" class="sort" data-sort="budget">Email</th>
                                    <th scope="col" class="sort" data-sort="status">Role</th>
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
                columns: [
                    {"data": "name"},
                    {"data": "email"},
                    {"data": "role"},
                    {
                        "data": function (row) {
                            let url = "{{route('admin.user.show','')}}" + '/' + row.id;
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
                },
            });
        })
    </script>
@endpush
