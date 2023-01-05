@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black">
                            <h3 class="widget-user-username">Full Name : {{ $applicant->first_name }} {{ $applicant->last_name }}</h3>
                            <h6 class="widget-user-desc">Applicant Email : {{ $applicant->email }}</h6>
                            <h6 class="widget-user-desc">Applied : {{ $applicant->created_at->diffForHumans() }}</h6>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Mobile No</h5>
                                        <span class="description-text">{{ $applicant->mobile }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">Result Slip</h5>
                                        <a href="{{ asset('upload/result_slip_applications/'.$applicant->result_slip) }}" class="btn btn-rounded btn-success mb-5"> View result Slip</a>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                    <!-- "{{route('user.email.acceptance',$applicant->id)}}" -->
                                    
                                        <a href="{{route('user.email.acceptance',$applicant->id)}}" class="btn btn-rounded btn-outline-info mb-5"> Send Acceptance Letter </a>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>







                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>





@endsection