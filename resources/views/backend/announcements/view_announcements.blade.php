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
                            <h3 class="box-title">Annoucements</h3>
                            @can('adminView', App\Models\User::class)
                            <a href="{{route('announcements.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Announcement</a>
                            @endcan

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if(count($announcements))
                            @foreach($announcements as $key => $announcement )
                            <div class="col-md-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">{{$announcement->title}}</h4>
                                        <span>Posted : {{ $announcement->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="box-body">
                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;">
                                            <div class="inner-content-div" style="overflow: hidden; width: auto; height: 200px;">
                                                <p>{{$announcement->announcement}}</p>
                                            </div>
                                            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 126.984px;"></div>
                                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                        </div>
                                    </div>
                                    @can('adminView', App\Models\User::class)
                                    <div>
                                        <a href="{{ route('announcements.edit',$announcement->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('announcements.delete',$announcement->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                    </div>
                                    @endcan
                                </div>
                            </div>
                            @endforeach

                            @else
                            <div>
                                <p>No Announcements Available</p>
                            </div>

                            @endif

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