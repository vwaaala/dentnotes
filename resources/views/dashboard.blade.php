<!-- resources/views/visitors/index.blade.php -->

@extends('layouts.app') <!-- Assuming you have a master layout -->

@section('content')
    @can('admin')
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Dashboard</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Guest Visitor Counts
                            </div>
                            <div class="card-body">
                                {{$allVisitorCounts}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                User Visitor Counts
                            </div>
                            <div class="card-body">
                                {{$userVisitorCounts}}
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                User Visitor Counts
                            </div>
                            <div class="card-body">
                                <div class="row">
                                  {{--  @foreach ($userVisitorCounts as $userId => $visitor)
                                    <div class="col-md-4">
                                        <div class="card m-1 p-2">
                                            <p>User's ID: {{ $userId }}</p>
                                            <p>User's Name: {{ $visitor['name'] }}</p>
                                            <p>Visit: {{ $visitor['count'] }} times</p>
                                        </div>
                                    </div>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    @endcan
@endsection
