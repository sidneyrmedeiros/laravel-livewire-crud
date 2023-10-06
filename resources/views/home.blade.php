@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><span class="text-center fa fa-home"></span> @yield('title')</h5>
                    </div>
                    <div class="card-body">
                        <h5>Hi <strong>{{ Auth::user()->name }},</strong>
                            {{ __('You are logged in to ') }}{{ config('app.name', 'Laravel') }}</h5>
                        </br>
                        <hr>

                        <div class="row w-100">
                            <div class="col-md-3">
                                <div class="card border-info mx-sm-1 p-3">
                                    <div class="card border-info text-info p-3"><span class="text-center fa fa-list-check"
                                            aria-hidden="true"></span></div>
                                    <div class="text-info text-center mt-3">
                                        <h4>Tasks</h4>
                                    </div>
                                    <div class="text-info text-center mt-2">
                                        <h1>{{ $tasks->count() }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-success mx-sm-1 p-3">
                                    <div class="card border-success text-success p-3 my-card"><span
                                            class="text-center fa fa-diagram-project" aria-hidden="true"></span></div>
                                    <div class="text-success text-center mt-3">
                                        <h4>Projects</h4>
                                    </div>
                                    <div class="text-success text-center mt-2">
                                        <h1>0</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-warning mx-sm-1 p-3">
                                    <div class="card border-warning text-warning p-3 my-card"><span
                                            class="text-center fa fa-users" aria-hidden="true"></span></div>
                                    <div class="text-warning text-center mt-3">
                                        <h4>Users</h4>
                                    </div>
                                    <div class="text-warning text-center mt-2">
                                        <h1>{{ Auth::user()->count() }}</h1>
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
