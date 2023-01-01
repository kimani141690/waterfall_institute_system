@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Course</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="POST" action="{{route('update.student.course',$edit_data->id)}} ">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Course Name <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" value="{{ $edit_data->name }}" > 
	 @error('name')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
	</div>

		<div class="form-group">
		<h5>Course Code <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="course_code" class="form-control" value="{{ $edit_data->course_code }}" > 
	 @error('course_code')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
	</div>
 
	  
  
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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