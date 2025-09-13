@extends('layout.main')
@section('title')
    Client Register
@endsection
@section('otherPage')

    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
    <!-- /Vertical Nav --><!-- Main Content -->
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="{{ url('index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Client Registration</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <!-- Container -->
        <div class="container">
            <div class="hk-pg-header mb-10 d-flex justify-content-between">
                <div>
                    <h4 class="hk-pg-title">
                        <a href="{{ route('client.list') }}">
                            <button class="btn btn-primary">
                                ← Registered Client List
                            </button>
                        </a>
                    </h4>
                </div>
                <div class="d-flex">

                    {{-- <a href="{{url('staff-register')}}"><button class="btn btn-primary">New Staff Registration</button></a> --}}


                </div>
            </div>


            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ( $errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    {{-- <div class="d-flex justify-content-end">
                      <a href="{{url('staff-register')}}"><button class="btn btn-primary"><b class="fa fa-eye"> </b> Registered Staff List</button></a>
                    </div> --}}
                    <div class="row">
                        <div class="col-sm">
                            <form method="POST" action="{{ route('client.data') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label mb-10" for="exampleInputuname_1"> Client Name </label>
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="name" id="exampleInputuname_1"
                                            placeholder="Client Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10">Mobile Number</label>
                                    <div class="input-group">

                                        <input type="tel" class="form-control" name="mobile"
                                            placeholder="Enter Mobile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10">Address </label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="address" placeholder="Enter Address"></textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10">Any Description </label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="description" placeholder="If Need Any Description"></textarea>
                                    </div>
                                </div>




                                <button type="submit" class="btn btn-primary mr-10">Register Client</button>

                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@endsection
