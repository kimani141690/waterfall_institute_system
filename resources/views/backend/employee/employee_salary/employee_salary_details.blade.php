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
                            <h3>Employee Salary Details</h3>
                            <h5><strong>Name: </strong>{{ $details->name}}</h5>
                            <h6><b>ID NO: </b>{{ $details->id_no}}</h6>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Previous Salary</th>
                                            <th>Increment Salary</th>
                                            <th>Present Salary</th>
                                            <th>Effected Date</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($salary_log as $key => $log )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{ $log->previous_salary }}</td>
                                            <td> {{ $log->increment_salary }}</td>
                                            <td> {{ $log->present_salary }}</td>
                                            <td> {{ $log->effected_salary }}</td>
                                           
                                         

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