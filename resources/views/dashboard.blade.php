<!-- resources/views/visitors/index.blade.php -->

@extends('layouts.app') <!-- Assuming you have a master layout -->

@section('content')
    @can('admin')
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Dashboard</span>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="card mb-2">
                            <div class="card-header">
                                Total Guest Visitor Counts
                            </div>
                            <div class="card-body text-center">
                                {{$allVisitorCounts}}
 
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                            Guest Visitor Counts By Date
                            </div>
                            <div class="card-body text-center">
                                <div class="input-group date" id="datepicker_guest">
                                    <input type="text" class="form-control" id="date_guest"/>
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            Date
                                        </span>
                                    </span>
                                </div>
                                <span class="guestvisitbydate">0</span>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                Today Guest Visitor Counts
                            </div>
                            <div class="card-body text-center">
                                {{$todayVisit}}
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                Last 7 Days Guest Visitor Counts
                            </div>
                            <div class="card-body text-center">
                                {{$lastSevenDaysVisit}}
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                Last 30 Days Guest Visitor Counts
                            </div>
                            <div class="card-body text-center">
                                {{$lastThirtyDaysVisit}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="card mb-2">
                            <div class="card-header">
                                Total User Visitor Counts
                            </div>
                            <div class="card-body text-center">
                                {{$userVisitorCounts}}
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                            User Visitor Counts By Date
                            </div>
                            <div class="card-body text-center">
                                <div class="input-group date" id="datepicker_user">
                                    <input type="text" class="form-control" id="date_user"/>
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            Date
                                        </span>
                                    </span>
                                </div>
                                <span class="uservisitbydate">0</span>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                Today User Visitor Counts
                            </div>
                            <div class="card-body text-center">
                                {{$todayVisitLogged}}
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                Last 7 Days User Visitor Counts
                            </div>
                            <div class="card-body text-center">
                                {{$lastSevenDaysVisitLogged}}
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">
                                Last 30 Days User Visitor Counts
                            </div>
                            <div class="card-body text-center">
                                {{$lastThirtyDaysVisitLogged}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
jQuery(document).ready(function($) {
    //User Date Picker
    $("#datepicker_user").datepicker();
    $("#datepicker_user #date_user").change(function() {
        var selectedDate = $(this).val();
        
        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Fetch CSRF token from meta tag

        $.ajax({
            url: '/dashboard/uservisitbydate', // Replace with your actual URL
            method: 'POST',
            data: {
                sdate: selectedDate,
                _token: csrfToken
            },
            success: function(response) {
                if(response.status == "success"){
                    $(".uservisitbydate").text(response.data);
                    console.log(response);
                } else if(response.status == "error"){
                }
            },
            error: function(xhr, status, error) {
            }
        });
    });
    //Guest Date Picker
    $("#datepicker_guest").datepicker();
    $("#datepicker_guest #date_guest").change(function() {
        var selectedDate = $(this).val();
        
        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Fetch CSRF token from meta tag

        $.ajax({
            url: '/dashboard/guestvisitbydate', // Replace with your actual URL
            method: 'POST',
            data: {
                sdate: selectedDate,
                _token: csrfToken
            },
            success: function(response) {
                if(response.status == "success"){
                    $(".guestvisitbydate").text(response.data);
                    console.log(response);
                } else if(response.status == "error"){
                }
            },
            error: function(xhr, status, error) {
            }
        });
    });
});
    </script>
@endpush
