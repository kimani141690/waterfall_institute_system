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
                            <h3 class="box-title">Lessons List</h3>
                            <a href="{{route('lesson.course.select')}}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Lesson</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Unit</th>
                                            <th>Lecturer</th>
                                            <th>Room</th>
                                            <th>Weekday</th>
                                            <th>Time</th>
                                            <th width="25%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_data as $key => $lesson )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{$lesson->unit_name}}</td>
                                            <td> {{$lesson->lecturer_name}}</td>
                                            <td> {{$lesson->room_name}}</td>
                                            <td> {{$lesson->weekday}}</td>
                                            <td> {{$lesson->start_time}} - {{$lesson->end_time}}</td>
                                            <td>
                                                <a href="{{route('lesson.edit',$lesson->id)}}" class="btn btn-info">Edit</a>

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