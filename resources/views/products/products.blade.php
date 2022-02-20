@extends('layouts.master')
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
							<h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">Products</span>
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
	@if (session()->has('edit'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{session()->get("edit")}}</strong>
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
				<!-- row -->
				<div class="row">
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<!--scale modal -->
								@can('اضافة منتج')
								<div class="col-sm-6 col-md-4 col-xl-3">
									<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">Add Product</a>
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
												<th class="border-bottom-0">Product Name</th>
												<th class="border-bottom-0">Section Name</th>
												<th class="border-bottom-0">Descriptions</th>
												<th class="border-bottom-0">Processes</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 0; ?>
											@foreach ($products as $pro)
											<?php $i++ ?>
											<tr>
												<td>{{$i}}</td>
												<td>{{$pro->product_name}}</td>
												<td>{{$pro->section->section_name}}</td>
												<td>{{$pro->description}}</td>
												<td>
													@can('تعديل منتج')
													<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
													data-pro_id = "{{$pro->id}}" data-name = "{{$pro->product_name}}" 
													data-section_name ="{{$pro->section->section_name}}"
													 data-description="{{$pro->description}}" data-toggle="modal" href="#edit_product"
													 title="edit"><i class="las la-pen"></i></a>
													 @endcan
													@can('حذف منتج')
													 <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
													data-pro_id = "{{$pro->id}}" data-name = "{{$pro->product_name}}"
													 data-toggle="modal" href="#delete_product"
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
						<!-- add -->
						<div class="modal fade" id="modaldemo8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modaldemo8Label">Add Product</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
										<form action="{{route('products.store')}}" method="post">
										{{csrf_field()}}
										<div class="modal-body">
											<div class="form-group">
												<label for="exampleInputEmail1">Product Name</label>
												<input type="text" class="form-control" id="product_name" name="product_name" required >
	
											</div>
	
											<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sections</label>
											<select name="section_id" id="section_id" class="form-control">
												<option value="" selected disabled> --Select Section--</option>
												@foreach ($sections as $section)
													<option value="{{ $section->id }}">{{ $section->section_name }}</option>
												@endforeach
											</select>
	
											<div class="form-group">
												<label for="exampleFormControlTextarea1">Notifications</label>
												<textarea class="form-control" id="description" name="description" rows="3"></textarea>
											</div>
	
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Confirm</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<!-- edit -->
						<div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modaldemo8Label">edit Product</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
										<form action="products/update" method="post" autocomplete="off">
											{{method_field('patch')}}
										{{csrf_field()}}
										<div class="modal-body">
											<div class="form-group">
												<input type="hidden" name="pro_id" id="pro_id" value="">
												<label for="exampleInputEmail1">Product Name</label>
												<input type="text" class="form-control" id="product_name" name="product_name" required >
	
											</div>
	
											<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sections</label>
											<select name="section_name" id="section_name" class="form-control" required>
												<option value="" selected disabled> --Select Section--</option>
												@foreach ($sections as $section)
                                   				 <option>{{ $section->section_name }}</option>
                               					@endforeach
											</select>
	
											<div class="form-group">
												<label for="exampleFormControlTextarea1">Notifications</label>
												<textarea class="form-control" id="description" name="description" rows="3"></textarea>
											</div>
	
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Confirm</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--end edit -->
						<!--Delete-->
						<div class="modal fade" id="delete_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modaldemo8Label">Delete Product</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
										<form action="products/destroy" method="post" autocomplete="off">
											{{method_field('delete')}}
										{{csrf_field()}}
										<div class="modal-body">
											<div class="form-group">
												<input type="hidden" name="pro_id" id="pro_id" value="">
												<label for="exampleInputEmail1">Product Name</label>
												<input type="text" class="form-control" id="product_name" name="product_name" readonly >
	
											</div>
	
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-danger">Confirm</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--end Delete-->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
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

<script>
	$('#edit_product').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var pro_id = button.data('pro_id')
		var product_name = button.data('name')
		var section_name = button.data('section_name')
		var description = button.data('description')
		var modal = $(this)
		modal.find('.modal-body #pro_id').val(pro_id);
		modal.find('.modal-body #product_name').val(product_name);
		modal.find('.modal-body #section_name').val(section_name);
		modal.find('.modal-body #description').val(description);
	})
</script>
<script>
	$("#delete_product").on("show.bs.modal" , function(event){
		var button = $(event.relatedTarget)
		var pro_id = button.data('pro_id')
		var product_name = button.data("name")
		var modal = $(this)
		modal.find(".modal-body #pro_id").val(pro_id);
		modal.find(".modal-body #product_name").val(product_name);
	})
</script>
@endsection