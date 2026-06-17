@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Total Motors</h6>
                        <h3 class="mb-0">{{ $metrics['total_motors'] }}</h3>
                    </div>
                    <div class="h1 mb-0 opacity-50">
                        <i class="fas fa-motorcycle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Total Users</h6>
                        <h3 class="mb-0">{{ $metrics['total_users'] }}</h3>
                    </div>
                    <div class="h1 mb-0 opacity-50">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Active Bookings</h6>
                        <h3 class="mb-0">{{ $metrics['active_bookings'] }}</h3>
                    </div>
                    <div class="h1 mb-0 opacity-50">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-danger text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50">Total Revenue</h6>
                        <h3 class="mb-0">Rp {{ number_format($metrics['total_revenue'], 0, ',', '.') }}</h3>
                    </div>
                    <div class="h1 mb-0 opacity-50">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Welcome to Admin Panel</h5>
            </div>
            <div class="card-body">
                <p>Welcome, {{ Auth::guard('admin')->user()->name }}! You have access to manage all system data.</p>
                <p>Please use the sidebar to navigate through the admin modules.</p>
            </div>
        </div>
    </div>
</div>
@endsection
