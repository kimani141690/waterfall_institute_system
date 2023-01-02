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
				  <h3 class="box-title"> Unit Details</h3>
	<a href="{{ route('student.unit.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Unit</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">

<h4><strong>Course : {{ $details_data['0']['course']['name'] }}</strong> ({{ $details_data['0']['course']['course_code'] }}) </h4>					
					<div class="table-responsive">
					  <table class="table table-bordered table-striped">
						<thead class="thead-light">
			<tr>
				<th width="5%">SL</th>  
				<th width="25%">Year Name</th> 
				<th>Unit</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($details_data as $key => $detail )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $detail['year']['name'] }}</td>				 
				<td> {{ $detail->unit }}</td>
				 
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