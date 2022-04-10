@extends('layouts.app', ['title' => __('User Profile')])


@push('css')
    <style>

    </style>
@endpush

@section('content')

    @include('users.partials.header', [
        'title' => 'Create New User'
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
                                    <h3 class="mb-0">Create New User</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{ route('admin.store.user') }}" autocomplete="off">
                                @csrf
                                <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="input-name"
                                                   class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Name') }}"
                                                   required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-6">
                                            <label class="form-control-label"
                                                   for="input-email">{{ __('Email') }}</label>
                                            <input type="email" name="email" id="input-email"
                                                   class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('Email') }}"
                                                   required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} col-md-6">
                                            <label class="form-control-label"
                                                   for="input-password">{{ __('New Password') }}</label>
                                            <input type="password" name="password" id="input-password"
                                                   class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   placeholder="{{ __('New Password') }}" value="" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-control-label"
                                                   for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                            <input type="password" name="password_confirmation"
                                                   id="input-password-confirmation"
                                                   class="form-control form-control-alternative"
                                                   placeholder="{{ __('Confirm New Password') }}" value="" required>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{route('admin.user.list')}}" class="btn btn-warning mt-4">{{ __('Back') }}</a>
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>

    </script>
@endpush
