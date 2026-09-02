@extends('layouts.appbar')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6 text-end">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- Orders Box -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $orders->count() }}</h3>
                            <p>Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- Invoices Box -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $invoices->count() }}</h3>
                            <p>Invoices</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('invoices.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- Users Box (Admin only) -->
                @if(Auth::user()->is_admin())
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $users->count() }}</h3>
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('admin.users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- Enquiries Box -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $enquiries->count() }}</h3>
                            <p>Enquiries</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('notifications.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- New Metrics Section -->
            <div class="row">
                <!-- Total Revenue -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ number_format($totalRevenue, 2) }} KES</h3>
                            <p>Total Revenue</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-social-usd"></i>
                        </div>
                    </div>
                </div>
                <!-- Recent Orders -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $recentOrders }}</h3>
                            <p>Recent Orders (Last 7 days)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- New Users -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $newUsers }}</h3>
                            <p>New Users (Last 30 days)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- Active Users -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $users->where('last_login_at', '>=', now()->subDay())->count() }}</h3>
                            <p>Active Users (Last 24 hours)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Recent Activities Section -->
            <div class="row">
                <div class="col-lg-7 connectedSortable">
                    <h4>Recent Activities</h4>
                    <ul>
                        @foreach($recentActivities as $activity)
                            <li>{{ $activity->description }} - <small>{{ $activity->created_at->diffForHumans() }}</small></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Quick Actions -->
                <div class="col-lg-5 connectedSortable">
                    <h4>Quick Actions</h4>
                    <ul>
                        <li><a href="{{ route('invoices.create') }}"><i class="fas fa-plus"></i> Add New Invoice</a></li>
                        <li><a href="{{ url('admin/users') }}"><i class="fas fa-users"></i> Manage Users</a></li>
                        <li><a href="{{ url('products') }}"><i class="fas fa-cogs"></i> Manage Products</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
