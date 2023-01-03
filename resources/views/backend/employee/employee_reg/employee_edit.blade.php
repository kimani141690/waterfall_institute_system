@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Employee </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="POST" action="{{ route('update.employee.registration',$edit_data->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">



                                        <div class="row"> <!-- 1st Row -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Employee Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required="" value="{{ $edit_data->name }}">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Father's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="fname" class="form-control" required="" value="{{ $edit_data->fname }}">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->



                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mname" class="form-control" required="" value="{{ $edit_data->mname }}">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->


                                        </div> <!-- End 1stRow -->






                                        <div class="row"> <!-- 2nd Row -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Mobile Number <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile" class="form-control" required="" value="{{ $edit_data->mobile }}">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" class="form-control" required="" value="{{ $edit_data->address }}">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->



                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="gender" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select Gender</option>
                                                            <option value="male" {{ ($edit_data->gender == 'male')? 'selected':''}}>Male</option>
                                                            <option value="female" {{ ($edit_data->gender == 'female')? 'selected':''}}>Female</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->


                                        </div> <!-- End 2nd Row -->



                                        <div class="row"> <!-- 3rd Row -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Religion <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="religion" id="religion" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select Religion</option>
                                                            <option value="Islam" {{ ($edit_data->religion == 'Islam')? 'selected':''}}>Islam</option>
                                                            <option value="Hindu" {{ ($edit_data->religion == 'Hindu')? 'selected':''}}>Hindu</option>
                                                            <option value="Christian" {{ ($edit_data->religion == 'Christian')? 'selected':''}}>Christan</option>
                                                            <option value="Pagan" {{ ($edit_data->religion == 'Pagan')? 'selected':''}}>Pagan</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->




                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Date of Birth <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="dob" class="form-control" required="" value="{{ $edit_data->dob }}">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Designation <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="designation_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select Designation</option>
                                                            @foreach($designation as $desi)
                                                            <option value="{{ $desi->id }}" {{ ($edit_data->designation_id== $desi->id)? 'selected':''}}>{{ $desi->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->


                                        </div> <!-- End 3rd Row -->




                                        <div class="row"> <!-- 4TH Row -->
                                            @if(!$edit_data)

                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <h5>Salary <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="salary" class="form-control" required="" value="{{ $edit_data->salary }}">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->
                                            @endif
                                            @if(!$edit_data)
                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <h5>Join Date<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="join_date" class="form-control" required="" value="{{ $edit_data->join_date }}">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->
                                            @endif

                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" class="form-control" id="image">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->



                                            <div class="col-md-3">


                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="show_image" src="{{ (!empty($edit_data->image))? url('upload/employee_images/'.$edit_data->image):url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;" style="width: 100px; width: 100px; border: 1px solid #000000;">

                                                    </div>

                                                </div> <!-- End Col md 4 -->




                                            </div> <!-- End 4TH Row -->




                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" style="margin: 20px;">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>



@endsection