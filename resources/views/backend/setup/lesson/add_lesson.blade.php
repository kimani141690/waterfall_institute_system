@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Lesson</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="POST" action="{{route('store.lesson')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <!-- unit -->
                                        <div class="form-group">

                                            <h5>Unit <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="course_unit_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Unit</option>
                                                    @foreach($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->unit }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <!-- lec -->
                                        <div class="form-group">
                                            <h5>Lecturer <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="lecturer_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Lecturer</option>
                                                    @foreach($lecturers as $lecturer)
                                                    <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <!-- room  -->
                                        <div class="form-group">
                                            <h5>Room <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="room_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Room</option>
                                                    @foreach($rooms as $room)
                                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <!-- weekday -->
                                        <div class="form-group">
                                            <h5>Day of the Week <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="weekday" required="" class="form-control">
                                                    <option value="">--</option>
                                                    <option value="1">Monday</option>
                                                    <option value="2">Tuesday</option>
                                                    <option value="3">Wednesday</option>
                                                    <option value="4">Thursday</option>
                                                    <option value="5">Friday</option>
                                                    <option value="6">Saturday</option>
                                                    <option value="7">Sunday</option>
                                                </select>
                                            </div>

                                        </div>

                                        <!-- start_time -->
                                        <div class="mt-4">
                                            <h5>Start Time <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="time" id="start_time" class="block mt-1 w-full" name="start_time" :value="old('start_time')" required>
                                                @error('start_time')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- end_time -->
                                        <div class="mt-4">
                                            <h5>End Time <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="time" id="end_time" class="block mt-1 w-full" name="end_time" :value="old('end_time')" required>
                                                @error('end_time')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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