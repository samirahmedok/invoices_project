@extends('layouts.master')
@section('css')
<!---Internal  Prism css-->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Internal Input tags css-->
<link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">Invioce_Details</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if (session()->has('delete'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{session()->get("delete")}}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
				<!-- row opened -->

					<div class="col-xl-12">
						<!-- div -->
						<div class="card mg-b-20" id="tabs-style2">
							<div class="card-body">
								<div class="main-content-label mg-b-20">
									Invioce_Details
								</div>
								
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-2">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li><a href="#tab4" class="nav-link active" data-toggle="tab"> (Details) تفاصيل الفاتورة</a></li>
														<li><a href="#tab5" class="nav-link" data-toggle="tab">(Payment statuses) حالات الدفع</a></li>
														<li><a href="#tab6" class="nav-link" data-toggle="tab">(Attachments) المرفقات</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab4">
														<div class="table-responsive" style="width: 100%">
                                                            <table id="example" class="table key-buttons text-md-nowrap" style="width: 100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="border-bottom-0">invoice_number</th>
                                                                        <td>{{$invoices->invoice_number}}</td>
                                                                        <th class="border-bottom-0">invoice_Date</th>
                                                                        <td>{{$invoices->invoice_Date}}</td>
                                                                        <th class="border-bottom-0">Due_date</th>
                                                                        <td>{{$invoices->Due_date}}</td>
                                                                        <th class="border-bottom-0">section</th>
                                                                        <td>{{$invoices->section->section_name}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="border-bottom-0">product</th>
                                                                        <td>{{$invoices->product}}</td>
                                                                        <th class="border-bottom-0">Amount_collection</th>
                                                                        <td>{{$invoices->Amount_collection}}</td>
                                                                        <th class="border-bottom-0">Amount_Commission</th>
                                                                        <td>{{$invoices->Amount_Commission}}</td>
                                                                        <th class="border-bottom-0">Discount</th>
                                                                        <td>{{$invoices->Discount}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="border-bottom-0">Rate_VAT</th>
                                                                        <td>{{$invoices->Rate_VAT}}</td>
                                                                        <th class="border-bottom-0">Value_VAT</th>
                                                                        <td>{{$invoices->Value_VAT}}</td>
                                                                        <th class="border-bottom-0">Total</th>
                                                                        <td>{{$invoices->Total}}</td>
                                                                        <th class="border-bottom-0">Status</th>
                                                                        <td>
                                                                            @if ($invoices->Value_Status == 'paid')
                                                                                <span class="badge badge-pill badge-success">{{$invoices->Status}}</span>
                                                                            @elseif($invoices->Value_Status == 'unpaid')
                                                                                <span class="badge badge-pill badge-danger">{{$invoices->Status}}</span>
                                                                            @else
                                                                            <span class="badge badge-pill badge-warning">{{$invoices->Status}}</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>    
                                                        </div>
													</div>
													<div class="tab-pane" id="tab5">
														<table id="example" class="table key-buttons text-md-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th class="border-bottom-0">id</th>
                                                                    <th class="border-bottom-0">invoice_number</th>
                                                                    <th class="border-bottom-0">product</th>
                                                                    <th class="border-bottom-0">section</th>
                                                                    <th class="border-bottom-0">Status</th>
                                                                    <th class="border-bottom-0">Payment_Date</th>
                                                                    <th class="border-bottom-0">note</th>
                                                                    <th class="border-bottom-0">user</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i= 0; ?>
                                                                @foreach ($details as $det)
                                                                <?php $i++ ?>
                                                                <tr>
                                                                    <td>{{$i}}</td>
                                                                    <td>{{$det->invoice_number}}</td>
                                                                    <td>{{$det->product}}</td>
                                                                    <td>{{$invoices->section->section_name}}</td>
                                                                    <td>
                                                                        @if ($det->Value_Status == 'paid')
                                                                                <span class="badge badge-pill badge-success">{{$det->Status}}</span>
                                                                        @elseif($det->Value_Status == 'unpaid')
                                                                                <span class="badge badge-pill badge-danger">{{$det->Status}}</span>
                                                                        @else
                                                                            <span class="badge badge-pill badge-warning">{{$det->Status}}</span>
                                                                        @endif

                                                                    </td>
                                                                    <td>{{$det->Payment_Date}}</td>
                                                                    <td>{{$det->note}}</td>
                                                                    <td>{{$det->user}}</td>
                                                                </tr>
                                                                @endforeach
                                                                
                                                                
                                                            </tbody>
                                                        </table>
													</div>
													<div class="tab-pane" id="tab6">
@if (session()->has('Add'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{session()->get("Add")}}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif

                                                    <div class="card-body">
                                                        @can('اضافة مرفق')
                                                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                        <h5 class="card-title">اضافة مرفقات</h5>
                                                        <form method="post" action="{{ url('/InvoiceAttachments') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="file_name" required>
                                                                <input type="hidden" id="customFile" name="invoice_number"
                                                                    value="{{ $invoices->invoice_number }}">
                                                                <input type="hidden" id="invoice_id" name="invoice_id"
                                                                    value="{{ $invoices->id }}">
                                                                <label class="custom-file-label" for="customFile">حدد
                                                                    المرفق</label>
                                                            </div><br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">تاكيد</button>
                                                        </form>
                                                        @endcan
                                                    </div>
                                                <br>
														<table id="example" class="table key-buttons text-md-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th class="border-bottom-0">id</th>
                                                                    <th class="border-bottom-0">file_name</th>
                                                                    <th class="border-bottom-0">Created_by</th>
                                                                    <th class="border-bottom-0">created_at</th>
                                                                    <th class="border-bottom-0">proccsses</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i= 0; ?>
                                                                @foreach ($attachments as $attach)
                                                                <?php $i++ ?>
                                                                <tr>
                                                                    <td>{{$i}}</td>
                                                                    <td>{{$attach->file_name}}</td>
                                                                    <td>{{$attach->Created_by}}</td>
                                                                    <td>{{$attach->created_at}}</td>
                                                                    <td>
                                                                        <a class="btn btn-outline-success btn-sm"
                                                                            href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $attach->file_name }}"
                                                                            role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                            عرض</a>

                                                                        <a class="btn btn-outline-info btn-sm"
                                                                            href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $attach->file_name }}"
                                                                            role="button"><i class="fas fa-download"></i>&nbsp;تحميل</a>

                                                                            @can('حذف المرفق')
                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attach->file_name }}"
                                                                                data-invoice_number="{{ $attach->invoice_number }}"
                                                                                data-id_file="{{ $attach->id }}"
                                                                                data-target="#delete_file"><i class="fas fa-trash"></i>&nbsp;حذف</button>
                                                                            @endcan
                                                                       
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                
                                                                
                                                            </tbody>
                                                        </table>
													</div>
 <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('file_deleting')}}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>

                        <input type="text" name="id_file" id="id_file" value="" readonly style="width: 50px;text-align:center">
                        <input type="text" name="file_name" id="file_name" value="" readonly style="text-align:center">
                        <input type="text" name="invoice_number" id="invoice_number" value="" readonly style="text-align:center">

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
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Internal Input tags js-->
<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
<!--- Tabs JS-->
<script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{URL::asset('assets/js/tabs.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>

<script>
    $('#delete_file').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var file_id = button.data('id_file')
        var file_name = button.data('file_name')
        var invoice_number = button.data('invoice_number')

        var modal = $(this)
        modal.find(".modal-body #id_file").val(file_id);
        modal.find(".modal-body #file_name").val(file_name);
        modal.find(".modal-body #invoice_number").val(invoice_number);

    })
</script>
@endsection