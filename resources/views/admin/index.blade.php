@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Students</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$students}} <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Courses</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$courses}} <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Units</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$units}} <small class="text-danger"><i class="fa fa-caret-down"></i> -0.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Lecturers</p>
                                <h3 class="text-white mb-0 font-weight-500">{{$lecturers}} <small class="text-danger"><i class="fa fa-caret-up"></i> -1.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>

              
         
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                New Students
                                <small class="subtitle">More than 10+ new students</small>
                            </h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">

                               
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>ID NO</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Image</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                         
                                            <td>
                                                <img src="">
                                            </td>
                                            

                                        </tr>
                                    

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>

                              
                                


                              



                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection