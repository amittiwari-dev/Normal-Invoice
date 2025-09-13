@extends('layout.main')
@section('title')
List Client
@endsection
@section('otherPage')
    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
    <!-- /Vertical Nav --><!-- Main Content -->
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="{{ url('index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registered Client List</li>
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

                         <a href="{{route('client')}}"><button class="btn btn-primary">New Client Registration</button></a>


                    </div>
                </div>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

                <section class="hk-sec-wrapper">

                    @if (session('error'))
                        <p class="alert alert-danger">{{ session('error') }}</p>
                    @endif
                    <div class="d-flex justify-content-end">
                      {{-- <a href="{{url('staff-register')}}"><button class="btn btn-primary">New Staff Registration</button></a> --}}
                    </div>
                    <h5 class="hk-sec-title"> Registered Client List  </h5>

                    <div class="row">

                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_main" class="table table-hover w-100 display">
                                    <thead>
                                        <tr>
                                            <th> Name</th>
                                            <th>Mobile Number</th>
                                            <th>Address</th>
                                            <th>Description</th>

                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $item)

                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->msg}}</td>


                                            <td>
                                                <a href="{{route('client.edit',$item->id)}}" class="mr-25 btn btn-primary" data-toggle="tooltip"
                                                    data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                <a hidden="" href="#" class="mr-25 btn btn-warning" data-toggle="tooltip"
                                                    data-original-title="View">
                                                    <i class="icon-eye"></i>

                                                </a>
                                            </td>
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
    </div>
@endsection
