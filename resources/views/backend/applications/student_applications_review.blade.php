@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">





                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Student Applications List</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Result Slip</th>

                                            <th width="25%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_data as $key => $value )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{$value->first_name}}</td>
                                            <td> {{$value->last_name }}</td>
                                            <td> {{$value->email }}</td>
                                            <td>
                                                <a href="{{ asset('upload/result_slip_applications/'.$value->result_slip) }}">View the result slip</a>
                                            </td>
                                            <td>
                                                <a href="{{route('applicant.details',$value->id)}}" class="btn btn-dark">Details</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>





                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>





@endsection