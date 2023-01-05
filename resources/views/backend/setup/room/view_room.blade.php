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
                            <h3 class="box-title">Room List</h3>
                            <a href="{{route('room.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Room</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Name</th>
                                            <th>Capacity</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_data as $key => $room )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{ $room->name }}</td>
                                            <td> {{ $room->capacity }}</td>
                                            <td>
                                                <a href="{{ route('room.edit',$room->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('room.delete',$room->id) }}" class="btn btn-danger" id="delete">Delete</a>

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