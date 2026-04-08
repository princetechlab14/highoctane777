@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            {{-- <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ url('admin') }}/leads/0">
                        <div class="card bg-primary-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-primary d-flex align-items-center justify-content-center">
                                        <i class="fa fa-chart-line text-white fs-7" title="New Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0 fw-semibold fs-7">{{ $newlead }}</h3>
                                        <h6 class="mb-0 mt-1">Total New Leads</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ url('admin') }}/leads/1">
                        <div class="card bg-warning-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-warning d-flex align-items-center justify-content-center">
                                        <i class="ti ti-loader text-white fs-7" title="Processig Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0 fw-semibold fs-7">{{ $processlead }}</h3>
                                        <h6 class="mb-0 mt-1">Total Processig Leads</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ url('admin') }}/leads/2">
                        <div class="card bg-success-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-success d-flex align-items-center justify-content-center">
                                        <i class="fa fa-check-circle text-white fs-7" title="Confirmed Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0 fw-semibold fs-7">{{ $confrimlead }}</h3>
                                        <h6 class="mb-0 mt-1">Total Confirmed Leads</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ url('admin') }}/leads/3">
                        <div class="card bg-danger-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-danger d-flex align-items-center justify-content-center">
                                        <i class="fa fa-times-circle text-white fs-7" title="Cancel Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0 fw-semibold fs-7">{{ $cancellead }}</h3>
                                        <h6 class="mb-0 mt-1">Total Cancel Leads</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ url('admin') }}/leads/0">
                        <div class="card bg-primary-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-primary d-flex align-items-center justify-content-center">
                                        <i class="fa fa-chart-line text-white fs-7" title="New Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0 fw-semibold fs-7">{{ $tnewlead }}</h3>
                                        <h6 class="mb-0 mt-1">Today New Leads</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ url('admin') }}/leads/1">
                        <div class="card bg-warning-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-warning d-flex align-items-center justify-content-center">
                                        <i class="ti ti-loader text-white fs-7" title="Processig Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0 fw-semibold fs-7">{{ $tprocessinglead }}</h3>
                                        <h6 class="mb-0 mt-1">Today Processig Leads</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ url('admin') }}/leads/2">
                        <div class="card bg-success-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-success d-flex align-items-center justify-content-center">
                                        <i class="fa fa-check-circle text-white fs-7" title="Confirmed Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0 fw-semibold fs-7">{{ $tconfirmclead }}</h3>
                                        <h6 class="mb-0 mt-1">Today Confirmed Leads</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ url('admin') }}/leads/3">
                        <div class="card bg-danger-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-danger d-flex align-items-center justify-content-center">
                                        <i class="fa fa-times-circle text-white fs-7" title="Cancel Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0 fw-semibold fs-7">{{ $tcancellead }}</h3>
                                        <h6 class="mb-0 mt-1">Today Cancel Leads</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div> --}}
            <div class="row">
                <!-- Net Revenue -->
                @if (isset($user) && $user->user_type === 'super_admin')
                    <div class="col-md-4">
                        <a href="{{ url('admin/transactions') }}">
                            <div class="card bg-warning-subtle shadow-none">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="round rounded text-bg-warning d-flex align-items-center justify-content-center">
                                            <i class="fa fa-dollar-sign text-white fs-7"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h3 class="mb-2 fw-semibold fs-7">${{ number_format($netRevenue, 2) }}</h3>
                                            <h6 class="mb-0 mt-1">Net Revenue</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Total Revenue -->
                    <div class="col-md-4">
                        <a href="{{ url('admin') }}/transactions">
                            <div class="card bg-primary-subtle shadow-none">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="round rounded text-bg-primary d-flex align-items-center justify-content-center">
                                            <i class="fa fa-dollar-sign text-white fs-7" title="New Leads"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h3 class="mb-2 fw-semibold fs-7">${{ number_format($totalRevenue, 2) }}</h3>
                                            <h6 class="mb-0 mt-1">Total Revenue</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif

                <!-- Total Withdrawals -->
                @if (isset($user) && $user->user_type === 'super_admin')
                    <div class="col-md-4">
                        <a href="{{ url('admin/withdrawals') }}">
                            <div class="card bg-danger-subtle shadow-none">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="round rounded text-bg-danger d-flex align-items-center justify-content-center">
                                            <i class="fa fa-dollar-sign text-white fs-7"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h3 class="mb-2 fw-semibold fs-7">${{ number_format($totalWithdrawals, 2) }}
                                            </h3>
                                            <h6 class="mb-0 mt-1">Total Withdrawals</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
            <div class="row">
                <!-- Total Transactions -->
                <div class="col-md-6">
                    <a href="{{ url('admin') }}/transactions">
                        <div class="card bg-success-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-success d-flex align-items-center justify-content-center">
                                        <i class="fa fa-credit-card text-white fs-7" title="New Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-2 fw-semibold fs-7">{{ $totalTransactions }}</h3>
                                        <h6 class="mb-0 mt-1">Total Transactions</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Total Customers -->
                <div class="col-md-6">
                    <a href="{{ url('admin') }}/transactions">
                        <div class="card bg-warning-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-warning d-flex align-items-center justify-content-center">
                                        <i class="fa fa-users text-white fs-7" title="New Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-2 fw-semibold fs-7">{{ $totalCustomers }}</h3>
                                        <h6 class="mb-0 mt-1">Total Customers</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <!-- Today Revenue -->
                <div class="col-md-4">
                    <a href="{{ url('admin') }}/transactions">
                        <div class="card bg-warning-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-warning d-flex align-items-center justify-content-center">
                                        <i class="fa fa-dollar-sign text-white fs-7" title="New Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-2 fw-semibold fs-7">${{ number_format($todayRevenue, 2) }}</h3>
                                        <h6 class="mb-0 mt-1">Today's Revenue</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Today Transactions -->
                <div class="col-md-4">
                    <a href="{{ url('admin') }}/transactions">
                        <div class="card bg-secondary-subtle shadow-none">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div
                                        class="round rounded text-bg-secondary d-flex align-items-center justify-content-center">
                                        <i class="fa fa-credit-card text-white fs-7" title="New Leads"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-2 fw-semibold fs-7">{{ $todayTransactionCount }}
                                        </h3>
                                        <h6 class="mb-0 mt-1">Today's Transactions</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Today Withdrawals -->
                @if (isset($user) && $user->user_type === 'super_admin')
                    <div class="col-md-4">
                        <a href="{{ url('admin') }}/withdrawals">
                            <div class="card bg-secondary-subtle shadow-none">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div
                                            class="round rounded text-bg-secondary d-flex align-items-center justify-content-center">
                                            <i class="fa fa-credit-card text-white fs-7" title="New Leads"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h3 class="mb-2 fw-semibold fs-7">${{ number_format($todayWithdrawals, 2) }}
                                            </h3>
                                            <h6 class="mb-0 mt-1">Today's Withdrawals</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>

            <!-- Shop-wise Counters (Super Admin only) -->
            @if (isset($shopRevenue) && !empty($shopRevenue))
                <div class="row">
                    <!-- Total Revenue -->
                    @foreach ($shopRevenue as $shop)
                        <div class="col-md-4">
                            <a href="{{ url('admin') }}/transactions">
                                <div class="card bg-secondary-subtle shadow-none">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="round rounded text-bg-secondary d-flex align-items-center justify-content-center">
                                                <i class="fa fa-dollar-sign text-white fs-7" title="New Leads"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h3 class="mb-2 fw-semibold fs-5">{{ $shop['store_name'] }}</h3>
                                                <p class="mb-1"><strong>Transactions: </strong>
                                                    {{ $shop['transactions'] }}</p>
                                                <p class="mb-1"><strong>Revenue: </strong>
                                                    ${{ number_format($shop['revenue'], 2) }}</p>
                                                <p class="mb-2"><strong>Withdrawals: </strong>
                                                    ${{ number_format($shop['withdrawals'], 2) }}
                                                <p class="mb-0"><strong>
                                                        Net Revenue:
                                                    </strong>${{ number_format($shop['revenue'] - $shop['withdrawals'], 2) }}
                                                    </strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection
