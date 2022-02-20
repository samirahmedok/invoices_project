@extends('layouts.master')
@section('title')
    Invoices Menu
@endsection
@section('css')
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				
@endsection
@section('content')

@if (session()->has('invoice_delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
	@if (session()->has('payment_edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تغيير حالة الدفع بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
				<!-- row -->
				<div class="row">
						<!-- row opened -->
				
					

					<!--div-->
					

					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">Invoices Table</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<a href="invoices/create" class="modal-effect btn btn-sm btn-primary" style="color: white;width: 200px;">
									<i class="fas fa-plus"></i>&nbsp;Add bill</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap" style= "width:1150px">
										<thead>
											<tr>
												<th class="border-bottom-0">id</th>
												<th class="border-bottom-0">bill number</th>
												<th class="border-bottom-0">bill date</th>
												<th class="border-bottom-0">due date</th>
												<th class="border-bottom-0">product</th>
												<th class="border-bottom-0">section</th>
												<th class="border-bottom-0">discount</th>
												<th class="border-bottom-0">tax rate</th>
												<th class="border-bottom-0">tax value</th>
												<th class="border-bottom-0">total</th>
												<th class="border-bottom-0">status</th>
												<th class="border-bottom-0">notifications</th>
												<th class="border-bottom-0">proccesses</th>
											</tr>
										</thead>
										<tbody>
											<?php $i= 0; ?>
											@foreach ($invoices as $inv)
											<?php $i++ ?>
											<tr>
												<td>{{$i}}</td>
												<td>{{$inv->invoice_number}}</td>
												<td>{{$inv->invoice_Date}}</td>
												<td>{{$inv->Due_date}}</td>
												<td>{{$inv->product}}</td>
												<td>
													<a href="{{url("InvoicesDetails")}}/{{$inv->section_id}}">
														{{$inv->section->section_name}}
													</a>
													
												</td>
												<td>{{$inv->Discount}}</td>
												<td>{{$inv->Rate_VAT}}</td>
												<td>{{$inv->Value_VAT}}</td>
												<td>{{$inv->Total}}</td>
												<td>
													@if ($inv->Value_Status == 'paid')
														<span class="text-success">{{$inv->Status}}</span>
													@elseif($inv->Value_Status == 'unpaid')
														<span class="text-danger">{{$inv->Status}}</span>
													@else
														<span class="text-warning">{{$inv->Status}}</span>
													@endif
												</td>
												<td>{{$inv->note}}</td>
												<td>
													<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
															data-toggle="dropdown" id="dropdownMenuButton" type="button">updates&nbsp;<i class="fas fa-caret-down ml-1"></i></button>
															<div  class="dropdown-menu tx-13">
																<a class="dropdown-item" href="{{url('edit_invoice')}}/{{$inv->id}}"><i class="text-success fas fa-pen-alt"></i>&nbsp;edit</a>
																<a class="dropdown-item" href="#" data-invoice_id="{{$inv->id}}"
																	data-toggle="modal" data-target="#delete_invoice"><i class="text-danger fas fa-trash-alt"></i>&nbsp;delete</a>
																	<a class="dropdown-item" href="{{url::route('status_show' , [$inv->id] )}}"><i class="text-warning fab fa-amazon-pay"></i>&nbsp;payment status</a>
															</div>
													</div>
												</td>
												
											</tr>
											@endforeach
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

					<div class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('invoices.destroy' , 'test')}}" method="post">
					{{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>

                        <input type="hidden" name="invoice_id" id="invoice_id" value="" readonly style="width: 50px;text-align:center">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
											</div>
										</div>
									</div>
									
										</div>
									</div>
									<!---Prism Pre code-->
								</div>
								<!-- /div -->
							</div>
						</div>
					</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

					
				</div>
				<!-- /row -->
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
<!--Internal  Notify js -->
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<script>
	$("#delete_invoice").on("show.bs.modal" , function(event){
		$button = $(event.relatedTarget);
		$invoice_id = $button.data("invoice_id");
		$modal = $(this);
		$modal.find(".modal-body #invoice_id").val($invoice_id);
	})
</script>
@endsection