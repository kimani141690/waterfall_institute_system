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
				  <h3 class="box-title">Assigned Unit Mark List</h3>
	<a href="{{route('assign.unit.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Assign Unit Mark</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Year</th> 
				<th>Course</th> 
				<th>Unit</th> 
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($all_data as $key => $assign )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $assign->year_id }}</td>				 
				<td> {{ $assign->course_id }}</td>				 
				<td>
<a href = "" class="btn btn-info">Edit</a>
<a href="" class="btn btn-primary">Details</a>

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