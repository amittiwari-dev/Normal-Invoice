@extends('layout.main')
@section('otherPage')
    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
    <!-- /Vertical Nav --><!-- Main Content -->
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="{{ url('index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
        <!-- Container -->
        <div class="container">
            <div class="col-xl-12">
                <div class="hk-pg-header mb-10 d-flex justify-content-between">
                    <div>
                        <h4 class="hk-pg-title">
                            <a onclick="history.back()">
                                <button class="btn btn-primary">
                                    ← Previous
                                </button>
                            </a>
                        </h4>
                    </div>
                    <div class="d-flex">
                        <a href="{{route('invoice.create')}}"><button class="btn btn-primary">Create Invoice</button></a>
                    </div>
                </div>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria
                        aria-label="Close"></button>
                </div>
            @endif
                <section class="hk-sec-wrapper">
                    @if (session('error'))
                        <p class="alert alert-danger">{{ session('error') }}</p>
                    @endif
                    <div class="d-flex justify-content-end">
                        {{-- <a href="{{url('staff-register')}}"><button class="btn btn-primary">New Staff Registration</button></a> --}}
                    </div>
                    <h5 class="hk-sec-title"> Invoice  </h5>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap
">
                                <table id="datable_main" class="table table-hover w-100 display">
                                    <thead>
                                        <tr>
                                            <th>Invoice No</th>
                                            <th>Client Name</th>

                                            <th>Client Mobile</th>
                                            <th>Invoice Date</th>

                                            <th>Amount</th>
                                            <th>Amount In Word</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->order_no }}</td>
                                                <td>{{ $invoice->client->name }}</td>
                                                <td>{{ $invoice->client->phone }}</td>


                                              <td>
    {{ $invoice->bill_date
        ? $invoice->bill_date->format('d-m-Y')
        : $invoice->created_at->format('d-m-Y') }}
</td>



                                                <td>{{ $invoice->total_rs }}</td>
                                                <td>{{ $invoice->total_in_words }}</td>
                                                <td><a href="{{ route('view.invoice',$invoice->id) }}"><button
                                                            class="btn btn-primary">View</button></a></td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Container -->
        <!-- Footer -->
       @stop



