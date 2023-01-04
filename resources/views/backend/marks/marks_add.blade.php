@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Marks Entry</strong></h4>
                        </div>

                        <div class="box-body">

                            <form method="POST" action="{{ route('marks.entry.store')}}">
                                @csrf

                                <div class="row">


                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Course <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="course_id" id="course_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Course</option>
                                                    @foreach($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->

                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Year <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->
                                    
                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Unit <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="assign_unit_id" id="assign_unit_id" required="" class="form-control">
                                                    <option selected="" >Select Unit</option>
                                                   

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->



                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Exam Type<span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="exam_type_id" id="exam_type_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Exam type</option>
                                                    @foreach($exam_types as $exam)
                                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->



                                    <div class="col-md-3" >

                                        <a id="search" class="btn btn-primary" name="search">Search</a>
                                    </div> <!-- End Col md 3 -->

                                </div><!--  end row -->

                                <!--\\\\\\\\\\\\\\\\\\\\ MARKS ENTRY TABLE ///////////////////// -->




                                <div class="row d-none" id="marks-entry">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>ID NO</th>
                                                <th>Student Name</th>
                                                <th>Father Name</th>
                                                <th>Gender</th>
                                                <th>Marks</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody id="marks-entry-tr">

                                        </tbody>

                                        </table>
                                        <input type="submit" class="btn btn-rounded btn-primary" value="Submit">

                                    </div><!--  end row d-none -->


                                </div><!--  end col-md-12 -->


                            </form>









                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var course_id = $('#course_id').val();
    var assign_unit_id = $('#assign_unit_id').val();
    var exam_type_id = $('#exam_type_id').val();
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {'year_id':year_id,'course_id':course_id},
      success: function (data) {
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="marks[]" ></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });
</script>


<!--   // for getting atudent unit  -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#course_id',function(){
      var course_id = $('#course_id').val();
      $.ajax({
        url:"{{ route('marks.getunit') }}",
        type:"GET",
        data:{course_id:course_id},
        success:function(data){
          var html = '<option value="">Select Unit</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.student_unit.unit+'</option>';
          });
          $('#assign_unit_id').html(html);
        }
      });
    });
  });
</script>






@endsection