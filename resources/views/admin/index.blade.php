@extends('Admin.master')
@section('title', 'Dashbord | Admin')

@section('content')
    <style>
        .row {
            flex-wrap: nowrap !important;
        }

        .bg-info {
            background-color: #53B1A3 !important;
        }

        .bg-success {
            background-color: #1D3867 !important;
        }

        .bg-warning {
            background-color: #BDCB3E !important;
        }
    </style>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $s_count }}</h3>

                    <p>{{ __('site.Service') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.service.index') }}" class="small-box-footer">{{ __('More info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>

        </div>
        <!-- ./col -->
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $p_count }}<sup style="font-size: 20px"></sup></h3>

                    <p>{{ __('site.Product') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('admin.product.index') }}" class="small-box-footer">{{ __('More info') }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>

        </div>
        <!-- ./col -->
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $ip_count }}</h3>

                    <p>{{ __('site.Category') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('admin.category.index') }}" class="small-box-footer">{{ __('More info') }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $po_count }}</h3>

                    <p>{{ __('site.Post') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('admin.post.index') }}" class="small-box-footer">{{ __('More info') }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="col-sm-12">
        <div id="chart"></div>
    </div>
@stop
