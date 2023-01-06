@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Make Announcement</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="POST" action="{{ route('update.announcements',$edit_data->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <!-- dept -->
                                        <div class="form-group">
                                            <h5>Department <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="department" required="" class="form-control">
                                                    <option value="">--</option>
                                                    <option value="school">All</option>
                                                    <option value="lecturers">Lecturers</option>
                                                    <option value="finance">Finance</option>
                                                    <option value="catering">Catering</option>
                                                    <option value="admin">Administration</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- title -->
                                        <div class="form-group">
                                            <h5>Title <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="title" class="form-control" value="{{ $edit_data->title }}">
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- desc -->
                                        <div class="form-group">
                                            <h5>Announcement <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="announcement" cols="30" rows="10" class="form-control">{{ $edit_data->announcement }}</textarea>
                                                @error('announcement')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Edit">
                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
    </div>
</div>
@endsection