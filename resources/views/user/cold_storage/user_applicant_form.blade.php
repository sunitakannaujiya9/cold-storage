<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>PMC || User Dashboard </title>

    <!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ url('/') }}/assets/images/PMC-logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/assets/images/PMC-logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/assets/images/PMC-logo.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    
    <!-- Toaster Message -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    
</head>
<style>
    input,
    input::placeholder {
        font: 14px/3 ;
    }
</style>
<body>
    
    <div class="col-12" style="padding-top:20px; padding-bottom:20px;">
        <div class="align-items-center">

            <div class="min-height-200px">
                
				<div class="page-header" style="border: 1px solid #000000;">
					<div class="row">
					    
					    <div class="col-sm-2 col-xs-12 text-right d-flex justify-content-center d-block d-sm-none mb-4">
							<div class="user-info-dropdown">
                				<div class="dropdown">
                					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                						<span class="user-icon">
                							<img src="{{ url('/') }}/assets/images/PMC-logo.png" alt="">
                						</span>
                						<span class="user-name">
                						    {{ Auth::guard('meatregistereduser')->user()->name }} 
                						</span>
                					</a>
                					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                						<a class="dropdown-item" href="{{ url('/user/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                						    <i class="dw dw-logout"></i> Log Out
                						</a>
                						<form id="logout-form" action="{{ url('/user/logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                					</div>
                				</div>
                			</div>
						</div>
						
						<div class="col-sm-10 col-xs-12 d-flex flex-column align-items-center align-items-sm-start">
							<div class="title">
								<h4>PMC Cold Storage Application</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
									<!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
									<li class="breadcrumb-item active" aria-current="page">All PMC Cold Storage Application List</li>
								</ol>
							</nav>
						</div>
						
						<div class="col-sm-2 col-xs-12 text-right d-none d-sm-block">
						    <div class="user-info-dropdown">
                				<div class="dropdown">
                					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                						<span class="user-icon">
                							<img src="{{ url('/') }}/assets/images/PMC-logo.png" alt="">
                						</span>
                						<span class="user-name">
                						    {{ Auth::guard('meatregistereduser')->user()->name }} 
                						</span>
                					</a>
                					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" >
                						<a class="dropdown-item" href="{{ url('/user/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                						    <i class="dw dw-logout"></i> Log Out
                						</a>
                						<form id="logout-form" action="{{ url('/user/logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                					</div>
                				</div>
                			</div>
						</div>
						
					</div>
				</div>
				
				
				<!-- Export Datatable start -->
    			<div class="card-box mb-30" style="border: 1px solid #000000;">
    					<div class="pd-20">
    						<h4 class="text-blue h4">PMC Cold Storage Application List</h4>
    					</div>
    					<div class="pb-20">
    						<table class="table hover multiple-select-row data-table-export nowrap">
    							<thead>
    								<tr>
    									<th>Sr. No.</th>
                                        <th>Cold Storage no.</th>
                                        <th>Applicant Full Name</th>
                                        <th>Email</th>
                                        <th>Mobile number</th>
                                        <th>Name of business</th>
                                        <th>Address of business</th>
        								<!-- <th>Application Status</th> -->
                                        <th>Hod Status</th>
        								<th>Admin Status</th>
                                        <th>Final Status</th>
                                        @if($meat_license_status == '2')
        								<th>Reasons for Rejection</th>
        								@endif
        								@if($meat_license_status == 1)
        								<th class="no-export">Cold Storage License Certificate</th>
        								@endif
                                        <th>Action</th>
    								</tr>
    							</thead>
    							<tbody>
    								@foreach ($user_list as $key => $value)
                                        <tr>
                                            <td><b>{{ $key+1 }}</b></td>
                                            <td><b>{{ $value->cold_storage_aplication_no }}</b></td>
                                            <td>{{ $value->applicant_fname }} {{ $value->applicant_mname }} {{ $value->applicant_lname }}</td>
                                          
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->mobile_number }}</td>
                                            <td>{{ $value->business_name }}</td>
                                            <td>{{ $value->business_address }}</td>                   

                                            @if($value->hod_status == 0)
                                            <td><span class="badge badge-primary p-1">Pending</span></td>
                							@elseif($value->hod_status == 1)
                                            <td><span class="badge badge-success p-1">Approved</span></td>
                                            @elseif($value->hod_status == 2)
                                            <td><span class="badge badge-danger p-1">Rejected</span></td>
                                            @endif
                                            @if($value->status == 0)
                                            <td><span class="badge badge-primary p-1">Pending</span></td>
                							@elseif($value->status == 1)
                                            <td><span class="badge badge-success p-1">Approved</span></td>
                                            @elseif($value->status == 2)
                                            <td><span class="badge badge-danger p-1">Rejected</span></td>
                                            @endif
                                            @if($value->final_approve == 0)
                                            <td><span class="badge badge-primary p-1">Pending</span></td>
                                            @elseif($value->final_approve == 1)
                                            <td><span class="badge badge-success p-1">Approved</span></td>
                                            @elseif($value->final_approve == 2)
                                            <td><span class="badge badge-danger p-1">Rejected</span></td>
                                            @endif

                                            <?php 
                                            if(($value->final_approve == '2')||($value->hod_status == '2')){ ?>
                                             <td>{{ $value->final_reason_for_rejection }}</td>  
                                                
                                            <?php }elseif(($value->status == '2')){?>
                                              <td>{{ $value->reason_for_rejection }}</td>  
                                            <?php }   ?>
            								
            								 @if($meat_license_status == 1)
                                            
                                            <td style="display:flex;">
                                            
                                              <a href='{{ url("/user/self_affadevit_pdf/{$value->id}") }}' class="btn btn-success btn-sm">
                                               Affidavit
                                             </a>
                                               &nbsp;&nbsp;
                                              <a href='{{ url("/user/generate_english_coldstorage_license_pdf/{$value->id}") }}' class="btn btn-danger btn-sm">
                                               English 
                                             </a>
                                              &nbsp;&nbsp;
                                              <a href='{{ url("/user/generate_marathi_coldstorage_license_pdf/{$value->id}") }}' class="btn btn-danger btn-sm">
                                               Marathi 
                                             </a>
                                            
                                             </td>
                                               @endif
                                               <td style="display:flex;" class="no-export">
                                               @if( $value->hod_status == '0' || $value->hod_status == '2')
                                              
                                                <a href='{{ url("/user/appli_form/View/{$value->id}/{$value->type}") }}' class="btn btn-warning btn-sm">
                                                    <i class="material-icons"><i class="micon dw dw-pencil-1"></i></i>
                                                    Edit
                                                </a>
                                                @endif
                                                 <a href='{{ url("/user/appli_form/View_coldstorage/{$value->id}/{$value->type}") }}' class="btn btn-primary btn-sm">
                                                    <i class="material-icons"><i class="micon dw dw-eye"></i></i>
                                                    View
                                                </a>
                                               </td>
                                          
                                            
                                            
            							</tr>
            							
            							<!-- Large Refund modal -->
                                      
                                    @endforeach
    							</tbody>
    						</table>
    					</div>
    				</div>
    			<!-- Export Datatable End -->


                        <?php 
                  // print_r($renewal_list);

                if($renewal_list != ''){ 


                    ?>
                    <!-- meat application Renewal start -->
                <div class="card-box mb-30" style="border: 1px solid #000000;">
                        <div class="pd-20">
                            <h4 class="text-blue h4">PMC Cold Storage Application Renewal List</h4>
                        </div>
                        <div class="pb-20">
                            <table class="table hover multiple-select-row data-table-export nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Cold Storage Renewal Application no.</th>
                                        <th>Applicant Full Name</th>
                                        <th>Email</th>
                                        <th>Mobile number</th>
                                        <th>Name of business</th>
                                        <th>Address of business</th>
                                        <th>Application Status</th>
                                          @if($meatrenewal_license_status == '2')
        								<th>Reasons for Rejection</th>
        								@endif
        								@if($meatrenewal_license_status == 1)
        								<th class="no-export">ColdStorage Renewal License Certificate</th>
        								@endif
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($renewal_list as $key => $value)
                                        <tr>
                                            <td><b>{{ $key+1 }}</b></td>
                                            <td><b>{{ $value->renwal_liceans_no }}</b></td>
                                            <td>{{ $value->applicant_fname }} {{ $value->applicant_mname }} {{ $value->applicant_lname }}</td>
                                          
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->mobile_number }}</td>
                                            <td>{{ $value->business_name }}</td>
                                            <td>{{ $value->business_address }}</td>
                                        
                                            @if($value->status == 0)
                                            <td><span class="badge badge-primary p-1">Pending</span></td>
                                            @elseif($value->status == 1)
                                            <td><span class="badge badge-success p-1">Approved</span></td>
                                            @elseif($value->status == 2)
                                            <td><span class="badge badge-danger p-1">Rejected</span></td>
                                            @endif
                                            
                                            @if($value->status == '2')
            								<td>{{ $value->reject_resion }}</td>
            								@endif
            								
            								@if($meatrenewal_license_status == 1)
                                            
                                            <td style="display:flex;">
                                            
                                              <a href='{{ url("/user/self_affadevit_renewal_pdf/{$value->id}") }}' class="btn btn-success btn-sm">
                                               Affidavit
                                             </a>
                                               &nbsp;&nbsp;
                                              <a href='{{ url("/user/generate_english_coldstorage_renewal_license_pdf/{$value->id}") }}' class="btn btn-danger btn-sm">
                                               English 
                                             </a>
                                              &nbsp;&nbsp;
                                              <a href='{{ url("/user/generate_marathi_coldstorage_renewal_license_pdf/{$value->id}") }}' class="btn btn-danger btn-sm">
                                               Marathi 
                                             </a>
                                            
                                             </td>
                                               @endif
                                               <td style="display:flex;" class="no-export">
                                                   @if($value->status == '0' || $value->status == '2')
                                                <a href='{{ url("/user/appli_form/View_renewal/{$value->id}/{$value->type}") }}' class="btn btn-warning btn-sm">
                                                    <i class="material-icons"><i class="micon dw dw-pencil-1"></i></i>
                                                    Edit
                                                </a>
                                                  @endif
                                                 <a href='{{ url("/user/appli_form/View_renewal_coldstorage/{$value->id}/{$value->type}") }}' class="btn btn-primary btn-sm">
                                                    <i class="material-icons"><i class="micon dw dw-eye"></i></i>
                                                    View
                                                </a>
                                              
                                               
                                            </td>
                                            
                                            
                                        
                                            
                                            
                                        </tr>
                                        
                                        <!-- Large Refund modal -->
                                      
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!--  meat application Renewal End -->
                
                <?php } ?>
			</div>
			
        </div>
    </div>
	
	
	
    <!-- js -->
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/core.js"></script>
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/script.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/process.js"></script>
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/layout-settings.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	
	<!-- buttons for Export datatable -->
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="{{ url('/') }}/userend/assets/src/plugins/datatables/js/vfs_fonts.js"></script>
	
	<!-- Datatable Setting js -->
	<script src="{{ url('/') }}/userend/assets/vendors/scripts/datatable-setting.js"></script></body>
	
	<script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
    </script>
        
	<script>
        $(document).ready(function(){
            $("select").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>
</body>

</html>
