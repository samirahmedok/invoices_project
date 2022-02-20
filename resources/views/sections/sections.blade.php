@extends('layouts.master')
@section('title')
    Sections Menu
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Sections</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		@if (session()->has('add'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{session()->get("add")}}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	@if (session()->has('delete'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{session()->get("delete")}}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif 

	@if (session()->has('edit'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{session()->get("edit")}}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
				<!-- row -->
				<div class="row">

					
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<!--scale modal -->
								@can('اضافة قسم')
								<div class="col-sm-6 col-md-4 col-xl-3">
									<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">Add Section</a>
								</div>
								@endcan
								<!--end scale modal-->
								<div class="d-flex justify-content-between">
									
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn more</a></p>
							</div>
							<div class="card-body">
								<div class="table-responsive" style="width: 100%">
									<table id="example" class="table key-buttons text-md-nowrap" style="width: 100%">
										
										
										<thead>
											
											<tr>
												<th class="border-bottom-0">id</th>
												<th class="border-bottom-0">Section Name</th>
												<th class="border-bottom-0">Descriptions</th>
												<th class="border-bottom-0">Processes</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=0; ?>
											@foreach ($sections as $sec)
											<?php $i++ ?>
											<tr>
												<td>{{$i}}</td>
												<td>{{$sec->section_name}}</td>
												<td>{{$sec->description}}</td>
												<td>
													@can('تعديل قسم')
													<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
													data-id = "{{$sec->id}}" data-section_name ="{{$sec->section_name}}"
													 data-description="{{$sec->description}}" data-toggle="modal" href="#exampleModal2"
													 title="edit"><i class="las la-pen"></i></a>
													 @endcan
													@can('حذف قسم')
													 <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
													data-id = "{{$sec->id}}" data-section_name ="{{$sec->section_name}}"
													 data-toggle="modal" href="#modaldemo9"
													 title="delete"><i class="las la-trash"></i></a>
													 @endcan
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
											
										
								</div>
							</div>
							
						</div>
						<!-- Modal effects -->
		<div class="modal" id="modaldemo8">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Adding Sections</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form action="{{route('sections.store')}}" method="POST">
							{{csrf_field()}}
							<div class="form-group">
							  <label for="exampleInputEmail">Section Name:</label>
							  <input type="text" class="form-control" id="section_name" placeholder="Enter Section Name" name="section_name" >
							</div>
							<label for="exampleFormControlTextarea">Notifications:</label>
							  <textarea class="form-control" id="description" placeholder="Type here" name="description" ></textarea>
							</div>
							<div class="modal-footer">
								<button class="btn ripple btn btn-success" type="submit">Confirm</button>
								<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
							</div>
						</form>
					</div>	
				</div>
			
			</div>
		</div>
		<!-- End Modal effects-->
					</div>
					
					<!--/div-->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
		<!-- edit -->
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
	   <div class="modal-dialog" role="document">
		   <div class="modal-content">
			   <div class="modal-header">
				   <h5 class="modal-title" id="exampleModalLabel">section edit</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					   <span aria-hidden="true">&times;</span>
				   </button>
			   </div>
			   <div class="modal-body">

				   <form action="sections/update" method="post" autocomplete="off">
					   {{method_field('patch')}}
					   {{csrf_field()}}
					   <div class="form-group">
						   <input type="hidden" name="id" id="id" value="">
						   <label for="recipient-name" class="col-form-label">section_name:</label>
						   <input class="form-control" name="section_name" id="section_name" type="text">
					   </div>
					   <div class="form-group">
						   <label for="message-text" class="col-form-label">description:</label>
						   <textarea class="form-control" id="description" name="description"></textarea>
					   </div>
			   </div>
			   <div class="modal-footer">
				   <button type="submit" class="btn btn-primary">confirm</button>
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
			   </div>
			   </form>
		   </div>
	   </div>
   </div>

   <!-- delete -->
   <div class="modal" id="modaldemo9">
	   <div class="modal-dialog modal-dialog-centered" role="document">
		   <div class="modal-content modal-content-demo">
			   <div class="modal-header">
				   <h6 class="modal-title">section delete</h6><button aria-label="Close" class="close" data-dismiss="modal"
						type="button"><span aria-hidden="true">&times;</span></button>
			   </div>
			   <form action="sections/destroy" method="post">
				   {{method_field('delete')}}
				   {{csrf_field()}}
				   <div class="modal-body">
					   <p>Are you sure of deleting process?</p><br>
					   <input type="hidden" name="id" id="id" value="">
					   <input class="form-control" name="section_name" id="section_name" type="text" readonly>
				   </div>
				   <div class="modal-footer">
					   <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
					   <button type="submit" class="btn btn-danger">confirm</button>
				   </div>
		   </div>
		   </form>
	   </div>
   </div>
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
	$('#exampleModal2').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var section_name = button.data('section_name')
		var description = button.data('description')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #section_name').val(section_name);
		modal.find('.modal-body #description').val(description);
	})
</script>
<script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
        })
    </script>
	
@endsection