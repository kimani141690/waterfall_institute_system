@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Search</strong></h4>
                        </div>

                        <div class="box-body">

                    


                        </div>
                    </div>
                </div> <!-- // end first col 12 -->




                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Student List</h3>
                            <a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Student </a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                @if(!@$search)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>ID NO</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Year</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role == "admin")
                                            <th>Code</th>
                                            @endif
                                            <th width="25%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_data as $key => $value )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{$value['student']['id_no'] }}</td>
                                            <td> {{$value['student']['name'] }}</td>
                                            <td> {{$value['student_course']['name'] }}</td>
                                            <td> {{$value['student_year']['name'] }}</td>
                                            <td>
                                                <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;">
                                            </td>
                                            <td>{{$value['student']['code']}} </td>
                                            <td>
                                                <a title="Edit" href="{{ route('student.registration.edit',$value->student_id)}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>

                                                <a title="Promotion" href="{{ route('student.promotion',$value->student_id)}}" class="btn btn-primary"><i class="fa fa-check"></i></a>

                                                <a target="_blank" title="Details" href="{{ route('student.registration.details',$value->student_id)}}" class="btn btn-danger"><i class="fa fa-eye"></i></a>

                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>

                                @else

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>ID NO</th>
                                            <th>Name</th>
                                            <th>Roll</th>
                                            <th>Course</th>
                                            <th>Year</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role == "admin")
                                            <th>Code</th>
                                            @endif
                                            <th width="25%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_data as $key => $value )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{$value['student']['id_no'] }}</td>
                                            <td> {{$value['student']['name'] }}</td>
                                            <td> {{$value->roll }}</td>
                                            <td> {{$value['student_course']['name'] }}</td>
                                            <td> {{$value['student_year']['name'] }}</td>
                                            <td>
                                                <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;">
                                            </td>
                                            <td>{{$value['student']['code']}} </td>
                                            <td>
                                            <a title="Edit" href="{{ route('student.registration.edit',$value->student_id)}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>

                                                <a title="Promotion" href="{{ route('student.promotion',$value->student_id)}}" class="btn btn-primary"><i class="fa fa-check"></i></a>

                                                <a target="_blank" title="Details" href="{{ route('student.registration.details',$value->student_id)}}" class="btn btn-danger"><i class="fa fa-eye"></i></a>

                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>


                                @endif



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