
<!doctype html>
<html class="no-js " lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>PMC ||  Cold Storage Home</title>
        
        <!-- Favicon-->
        <link rel="icon" href="{{ url('/') }}/assets/images/PMC-logo.png" >
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/charts-c3/plugin.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
        
        <!-- JQuery DataTable Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
        
        
        <!-- Multi Select Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/multi-select/css/multi-select.css">
        
        <!-- Bootstrap Select Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
        
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/select2/select2.css" />

        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/morrisjs/morris.min.css" />
        
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.min.css">
        
        <!-- Toaster Message -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
    
    <style>
            body {
                /*display: flex;*/
                align-items: center;
                justify-content: center;
                align-content: center;
            }
                
            table.center {
                margin-left: auto; 
                margin-right: auto;
                border:solid 1px;
                padding:5px;
            }
    
            * {
                margin: 0px;
                padding: 0px;
                border: 0px;
                outline: 0px;
                box-sizing: border-box;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                text-decoration: none;
                list-style: none;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
    
            .search_con {
                padding: 2rem 0;
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }
    
            .search_con .input_con {
                margin: auto;
                width: 550px;
                height: 2.5rem;
                background-color: white;
                border: 1px solid #2d4bf0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                overflow: hidden;
                border-radius: 9999px;
                transition: all 0.2s ease;
                outline: 3px solid transparent;
                box-shadow: 1px 2px 10px 5px #cce6ff;
            }
    
            .search_con .input_con:focus-within {
                outline: 3px solid #c8d5f3;
            }
    
            .search_con .input_con input {
                padding: 0 0.5rem 0 1rem;
                width: 100%;
                font-size: 15px;
                color: #1d1d1d;
                font-family: &#39;
                Inter&#39;
                ,
                sans-serif;
            }
    
            .search_con .input_con span {
                height: 100%;
                display: flex;
                align-items: center;
            }
    
            .search_con .input_con span .bi {
                padding: 0 0.5rem;
                color: #1d1d1d;
                font-size: 15px;
                line-height: 2.5rem;
                cursor: pointer;
                color: rgba(0, 0, 0, 0.733);
            }
    
            .search_con .input_con span .bi:hover {
                color: #2d4bf0;
            }
    
            .search_con .input_con span .bi-search {
                padding-right: 1rem;
            }
    
            .search_con .input_con .h-line {
                height: 50%;
                width: 1px;
                background-color: #1d1d1d;
            }
    
    
    
            @media only screen and (max-width: 767px) and (min-width: 200px) {
    
                .search_con .input_con {
                    width: 80%;
                }
            }
    
            .page-start {
                display: flex;
                flex-direction: column;
                align-items: center;
                align-content: center;
                justify-content: center;
            }
    
    
            .footer {
                width: 100%;
                position: absolute;
                bottom: 0px;
                left: 0px;
                height: auto;
                /*background-color: #60529f;*/
                text-align: center;
                padding-top: 20px;
                padding-bottom: 20px;
            }
    
            .footer .col {
                width: 200px;
                height: auto;
                float: left;
                box-sizing: border-box;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                padding: 0px 0px 0px 0px;
                /*margin-left:12%;*/
            }
    
            .footer .col h1 {
                margin: 0;
                padding-top: 0;
                font-family: inherit;
                font-size: 12px;
                line-height: 17px;
                padding: 0px 0px 0px 0px;
                /*color: rgba(255,255,255,0.2);*/
                color: white;
                font-weight: normal;
                text-transform: uppercase;
                letter-spacing: 0.250em;
            }
    
            .footer .col ul {
                list-style-type: none;
                margin: 0;
                padding-top: -80px;
            }
    
            .footer .col ul li {
                color: #999999;
                font-size: 14px;
                font-family: inherit;
                font-weight: bold;
                padding: 5px 0px 5px 0px;
                cursor: pointer;
                transition: .2s;
                -webkit-transition: .2s;
                -moz-transition: .2s;
            }
    
            .footer .col ul li:hover {
                color: #ffffff;
                transition: .1s;
                -webkit-transition: .1s;
                -moz-transition: .1s;
            }
    
            .clearfix {
                clear: both;
            }
    
            .row.no-gutter {
                margin-left: 0;
                margin-right: 0;
            }
    
            .row.no-gutter [class*='col-']:not(:first-child),
            .row.no-gutter [class*='col-']:not(:last-child) {
                padding-right: 0;
                padding-left: 0;
            }
            .card-body h4{
                height:50px;
            }
            .card-body .save-btn{
                margin-top:10px;
            }
    
            @media only screen and (min-width: 1280px) {
                .contain {
                    width: 1200px;
                    margin: 0 auto;
                }
            }
    
            @media only screen and (max-width: 950px) {
    
                .footer .col {
                    width: 33%;
                    padding: 0px;
                    margin: 0px;
                }
    
                .footer .col h1 {
                    font-size: 14px;
                }
    
                .footer .col ul li {
                    font-size: 13px;
                }
    
                .contain {
                    margin: 0 auto;
                    /*margin-left:100%;*/
                }
            }
    
            @media only screen and (max-width: 360px) {
                .offset-2 {
                    margin-left: 0px !important;
                }
    
                .col-6 {
    
                    flex: 11 0 73% !important;
                    max-width: 92% !important;
                    font-size: 11px;
                    font-weight: bold;
                }
    
            }
    
            @media only screen and (max-width: 480px) {
                .offset-2 {
                    margin-left: 0px !important;
                }
    
                .col-6 {
    
                    flex: 11 0 73% !important;
                    max-width: 92% !important;
                    font-size: 11px;
                    font-weight: bold;
                }
    
            }
    
    
    
    
            @media only screen and (max-width: 361px) {
                .offset-2 {
                    margin-left: 0px !important;
                }
    
                .col-6 {
    
                    flex: 11 0 73% !important;
                    max-width: 92% !important;
                    font-size: 11px;
                    font-weight: bold;
                }
            }
            .col-lg-4{
                margin-bottom:12px;
            }
            
            .card-title{
                background: #0c7ce6;
                font-weight: 500;
                font-size: 20px;
            }
            
            .card-header p{
                margin:0px;
            }
            /* 11 */
            
            .custom-btn {
                width: 150px;
                height: 40px;
                color: #fff;
                border-radius: 5px;
                padding: 5px 25px;
                font-family: 'Lato', sans-serif;
                font-weight: 500;
                background: transparent;
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
                display: inline-block;
                box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
                7px 7px 20px 0px rgba(0,0,0,.1),
                4px 4px 5px 0px rgba(0,0,0,.1);
                outline: none;
                font-size: 18px;
            }
            
            .btn-11 {
                border: none;
                background: rgb(251,33,117);
                background: linear-gradient(to left, #32dfff, #18aff9, #0052d4);
                color: #fff;
                overflow: hidden;
            }
            .btn-11:hover {
                text-decoration: none;
                color: #fff;
            }
            .btn-11:before {
                position: absolute;
                content: '';
                display: inline-block;
                top: -180px;
                left: 0;
                width: 30px;
                height: 100%;
                background-color: #fff;
                animation: shiny-btn1 3s ease-in-out infinite;
            }
            .btn-11:hover{
                opacity: .7;
            }
            .btn-11:active{
                box-shadow:  4px 4px 6px 0 rgba(255,255,255,.3),
                -4px -4px 6px 0 rgba(116, 125, 136, .2), 
                inset -4px -4px 6px 0 rgba(255,255,255,.2),
                inset 4px 4px 6px 0 rgba(0, 0, 0, .2);
            }
    
            @-webkit-keyframes shiny-btn1 {
                0% { -webkit-transform: scale(0) rotate(45deg); opacity: 0; }
                80% { -webkit-transform: scale(0) rotate(45deg); opacity: 0.5; }
                81% { -webkit-transform: scale(4) rotate(45deg); opacity: 1; }
                100% { -webkit-transform: scale(50) rotate(45deg); opacity: 0; }
            }
    
        </style>
        
    <body class="theme-blush">

        <!-- Page Loader -->

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        
      
        
         @php
            $isAuthenticated = auth()->guard('meatregistereduser')->user();
            
            if($isAuthenticated)
            {
                $hasRegistered = DB::table('coldstorage_registration_tbl')->where('inserted_by', $isAuthenticated->id )->whereNull('deleted_at')->orderByDesc('id')->first();
                
                if($hasRegistered){
                    $isRenewable = DB::table('coldstorage_renewal_license_tbl')->where('inserted_by', $isAuthenticated->id)->whereNull('deleted_at')->orderByDesc('id')->first();
                }            
            }
        @endphp
        
        <!--------added in 7/4/2023-->

        <div class="container  page-start">
           <div class="col-12 pt-4 d-flex justify-content-md-end justify-content-center flex-wrap">
                @if(Auth::guard('meatregistereduser')->check())
                    <div class="px-1 my-1">
                        <a href="{{ url('/user/appli_form') }}">
                            <button type="button" class="btn btn-info btn-rounded " >
                                <i class="fa fa-file-text"></i>&nbsp;My Form
                            </button>
                        </a>
                    </div>
                    <div class="px-1 my-1">
                        <a href="{{ url('/user/logout') }}" class="btn btn-info btn-rounded"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ url('/user/logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="px-1 my-1">
                        <a href="{{ url('/user/login') }}">
                            <button type="button" class="btn btn-info btn-rounded " >
                                <i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login
                            </button>
                        </a>
                    </div>
                    <div class="px-1 my-1">
                        <a href="{{ url('/user/register') }}">
                            <button type="button" class="btn btn-info btn-rounded " >
                                <i class="fa fa-sign-out"></i>&nbsp;Register
                            </button>
                        </a>
                    </div>
                @endif
            </div>
            
            
            
            
            
            
            
            
            
            <div class="img-container" style="text-align: center;">
                <img src="{{ url('/') }}/assets/images/PMC-logo.png" height="180px;" width="220px;">
            </div><br />
            <div class="row" style="text-align: center;">
                <div class="col-md-12">
                    <h1 style="color:#4489E4; font-size:30px;"><b>पनवेल महानगरपालिका</b></h1>
    
                    <b style="font-size:24px;color:#646367;">पशुसंवर्धन विभाग</b><br /><br />
                    <b style="font-size:18px;color:#646367;">नागरिकांसाठी पशुसंवर्धन नोंदणी अर्ज करण्यासाठी प्रणाली</b>
                    <br /><b style="font-size:14px;color:#646367;">(System for Animal Husbandry Registration for Citizens)</b>
    
                </div>
            </div>
            <div class='search_con'>
                <form action="{{ route('check-application-status') }}" method="post" class="input_con" autocomplete="off">
                     @csrf
                     {{ method_field('post') }}
                     <?php if(!empty($application_no)){ $appln = $application_no; }else{ $appln = '';}  ?>
                    <input type="text" name="application_no" value="{{$appln}}"  placeholder='Enter Application No' spellCheck="False" id="application_no" />
                    <span id="clearBtn"><i class="bi bi-x-lg"></i></span>
                    <span class='h-line'></span>
                    <!--<a href="#">-->
                    <button type="submit " onclick="return check();">
                        <span><i class="fa-solid fa-magnifying-glass px-2 text-primary"></i></span>
                    </button>
                    <!--</a>-->
                </form>
            </div>
        </div>
    
     
        @if(!empty($get_details))
        <div class="row" style="padding-bottom:50px;">
            <div class="col-lg-3"></div>
            <div class="col-lg-7">
                <div class="card-box">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($type == 'Cold_Storage')
                                    @if($serch_result == 'Pending')
                                        <tr>
                                            <td>Received</td>
                                            <td>{{ date('d-M-Y',strtotime($get_details->inserted_dt)) }}</td>
                                            <td>Your Application No :- {{ $get_details->cold_storage_aplication_no }} For शीतगृह परवान्यासाठी अर्ज Is not yet proceesed by PMC office.</td>
                                        </tr>
                                    @endif
                                
                                    @if($serch_result == 'Approve')
                                        <tr>
                                            <td>Received</td>
                                            <td>{{ date('d-M-Y',strtotime($get_details->inserted_dt)) }}</td>
                                            <td>Your Application No :- {{ $get_details->cold_storage_aplication_no }} For शीतगृह परवान्यासाठी अर्ज Is not yet proceesed by PMC office.</td>
                                        </tr>
                                        <tr>
                                            <td>Approved</td>
                                            <td>{{ date('d-M-Y',strtotime($get_details->approve_date)) }}</td>
                                            <td>Your Application No :- {{ $get_details->cold_storage_aplication_no }} For शीतगृह परवान्यासाठी अर्ज    is approved by PMC Office. Please collect your certificate from PMC off     </td>
                                            
                                        </tr>
                                    @endif
                                
                                    @if($serch_result == 'Reject')
                                        <tr>
                                            <td>Rejected</td>
                                            <td>{{ date('d-M-Y',strtotime($get_details->reject_date)) }}</td>
                                            <td>Your Application No :- {{ $get_details->cold_storage_aplication_no }} is reject by PMC Office.</td>
                                        </tr>
                                    @endif
                                @elseif($type == 'Cold_Storage_renewal')
                                    @if($serch_result == 'Pending')
                                        <tr>
                                            <td>Received</td>
                                            <td>{{ date('d-M-Y',strtotime($get_details->inserted_dt)) }}</td>
                                            <td>Your Application No :- {{ $get_details->renwal_liceans_no }} Is not yet proceesed by PMC office.</td>
                                        </tr>
                                    @endif
                                
                                    @if($serch_result == 'Approve')
                                        <tr>
                                            <td>Received</td>
                                            <td>{{ date('d-M-Y',strtotime($get_details->inserted_dt)) }}</td>
                                            <td>Your Application No :- {{ $get_details->renwal_liceans_no }} Is not yet proceesed by PMC office.</td>
                                        </tr>
                                        <tr>
                                            <td>Approved</td>
                                            <td>{{ date('d-M-Y',strtotime($get_details->approve_date)) }}</td>
                                            <td>Your Application No :- {{ $get_details->renwal_liceans_no }} is approved by PMC Office. Please collect your certificate from PMC office.</td>
                                        </tr>
                                    @endif
                                
                                    @if($serch_result == 'Reject')
                                        <tr>
                                            <td>Rejected</td>
                                            <td>{{ date('d-M-Y',strtotime($get_details->reject_date)) }}</td>
                                            <td>Your Application No :- {{ $get_details->renwal_liceans_no }} is reject by PMC Office.</td>
                                        </tr>
                                    @endif
                                    
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <div class="main-content">
            <div class="page-content">
                <div class="container" style="text-align:center;">
                    <div class="row d-flex justify-content-center">
                        
                        <div class="col-md-6 col-xl-4 mb-3" >
                            <div class="card shadow text-white bg-primary1 h-100 " style="border:solid 2px black; " >
                                <div class="card-body  mb-0 p-0 d-flex flex-column align-items-center justify-content-between" >        
                                    <div class="card-title w-100 p-2 text-center h-100">
                                        <p>Application For <br> Cold Storage License</p>
                                    </div>
                                    
                                    <!--<blockquote class="card-bodyquote mb-0">-->
                                    <div class="d-flex flex-column justify-content-between align-items-center">
                                        <div>
                                            <p style="color:black; text-align:center; font-size:18px; "><b>शीतगृह परवान्यासाठी अर्ज </b> </p>    
                                        </div>
                                        <div class="font-size-12 text-white mt-3 mb-0">
                                            @if(Auth::guard('meatregistereduser')->check())
                                                <span style="text-align:center;">
                                                    <a href="{{ url('/user/cold_storage_terms') }}" >
                                                        <!--<button style="width:100%; height:40px; font-size:18px; margin-top:12%; " type="button" class="btn btn-primary"> Apply </button>-->
                                                        <button class="custom-btn btn-11">Apply1<div class="dot"></div></button>
                                                    </a>
                                                </span>
                                            @else
                                                <span style="text-align:center;" style="display:none">
                                                    <a href="{{ url('/user/cold_storage_terms') }}" >
                                                        <!--<button style="width:100%; height:40px; font-size:18px; margin-top:12%; " type="button" class="btn btn-primary"> Apply </button>-->
                                                        <button class="custom-btn btn-11">Apply2<div class="dot"></div></button>
                                                    </a>
                                                </span>
                                             @endif   
                                            
                                        </div>
                                    </div>
                                    <!--</blockquote>-->
                                </div>
                            </div>
                            <!-- end card-->
                        </div>
                        
                        <div class="col-md-6 col-xl-4 mb-3" >
                            <div class="card shadow text-white bg-primary1 h-100 " style="border:solid 2px black; " >
                                <div class="card-body  mb-0 p-0 d-flex flex-column align-items-center justify-content-between" >        
                                    <div class="card-title w-100 p-2 text-center h-100">
                                        <p>Application For <br> Cold Storage Renewable License</p>
                                    </div>
                                    
                                   
                                    <div class="d-flex flex-column justify-content-between align-items-center">
                                        <div>
                                            <p style="color:black; text-align:center; font-size:18px; "><b>शीतगृह नूतनीकरण परवान्यासाठी अर्ज</b> </p>    
                                        </div>
                                        <div class="font-size-12 text-white mt-3 mb-0">
                                      
                                             @if( $isAuthenticated )
                                                
                                                @if( !empty($isRenewable->is_expired) == 0 )
                                                    <span style="text-align:center;">
                                                        <a >
                                                            <?php 
                                                            
                                                              $pt = date('Y', strtotime('+1 year'))
                                                            
                                                            ?>
                                                            <h6 class="text-warning">Cold Storage Renewal License by March 31, 2024</h6>
                                                        </a>
                                                    </span>
                                                @elseif( !empty($isRenewable->is_expired) == 1 )
                                                    <span style="text-align:center;">
                                                        <a href="{{ url('/user/cold_storage_renewal_form') }}" >
                                                            <button class="custom-btn btn-11">Renewal1<div class="dot"></div></button>
                                                        </a>
                                                    </span>
                                                @else
                                                    <span style="text-align:center;">
                                                        <a href="{{ url('/user/cold_storage_renewal_form') }}" >
                                                            <!--<button style="width:100%; height:40px; font-size:18px; margin-top:12%; " type="button" class="btn btn-primary"> Apply </button>-->
                                                            <button class="custom-btn btn-11">Renewal2<div class="dot"></div></button>
                                                        </a>
                                                    </span>
                                                @endif
                                            @else
                                            
                                                <span style="text-align:center;">
                                                    <a href="{{ url('/user/cold_storage_renewal_form') }}" >
                                                        <!--<button style="width:100%; height:40px; font-size:18px; margin-top:12%; " type="button" class="btn btn-primary"> Apply </button>-->
                                                        <button class="custom-btn btn-11">Renewal3<div class="dot"></div></button>
                                                    </a>
                                                </span>
                                            
                                            @endif
                                            
                                           
                                            <!--<span style="text-align:center;">-->
                                                
                                            <!--    <a href="{{ url('/user/cold_storage_renewal_form') }}" >-->
                                               
                                            <!--        <button class="custom-btn btn-11">Apply<div class="dot"></div></button>-->
                                                  
                                            <!--    </a>-->
                                                
                                            <!--</span>-->
                                        </div>
                                    </div>
                                    <!--</blockquote>-->
                                </div>
                            </div>
                            <!-- end card-->
                        </div>
                                
                    </div>
                    <!-- end row -->  
                </div>
                <!-- end main content-->
            </div>
            <!-- END layout-wrapper -->
        </div>

              <!--  <div class="main-content">
            <div class="page-content">
                <div class="container" style="text-align:center;">
                    <div class="row d-flex justify-content-center">
                        
                        <div class="col-md-6 col-xl-4 mb-3" >
                            <div class="card shadow text-white bg-primary1 h-100 " style="border:solid 2px black; " >
                                <div class="card-body  mb-0 p-0 d-flex flex-column align-items-center justify-content-between" >        
                                    <div class="card-title w-100 p-2 text-center h-100">
                                        <p>Application For <br> Meat / Livestock Transport Business License </p>
                                        
                                    </div>
                                    
                                  
                                    <div class="d-flex flex-column justify-content-between align-items-center">
                                        <div>
                                            <p style="color:black; text-align:center; font-size:18px; "><b>मांस  / पशुधन वाहतूक व्यवसाय परवान्यासाठी अर्ज</b> </p>    
                                        </div>
                                        <div class="font-size-12 text-white mt-3 mb-0">
                                            
                                            <span style="text-align:center;">
                                                <a href="{{ url('/user/meat_vehical_terms') }}" >
                                                   
                                                    <button class="custom-btn btn-11">Apply<div class="dot"></div></button>
                                                </a>
                                                
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                          
                        </div>
                        
                        <div class="col-md-6 col-xl-4 mb-3" >
                            <div class="card shadow text-white bg-primary1 h-100 " style="border:solid 2px black; " >
                                <div class="card-body  mb-0 p-0 d-flex flex-column align-items-center justify-content-between" >        
                                    <div class="card-title w-100 p-2 text-center h-100">
                                        <p>Application For <br> Meat / Livestock Transport Business Renewable License</p>
                                    </div>
                                    
                                    
                                    <div class="d-flex flex-column justify-content-between align-items-center">
                                        <div>
                                            <p style="color:black; text-align:center; font-size:18px; "><b>मांस  / पशुधन वाहतूक व्यवसाय नूतनीकरण परवान्यासाठी अर्ज</b> </p>    
                                        </div>
                                        <div class="font-size-12 text-white mt-3 mb-0">
                                            
                                            <span style="text-align:center;">
                                                
                                                <a href="{{ url('/user/meat_transport_renewal_form') }}" >
                                                    <button class="custom-btn btn-11">Apply<div class="dot"></div></button>
                                                </a>
                                                
                                            </span>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                           
                        </div>
                                
                    </div>
                 
                </div>
              
            </div>
           
        </div> -->
    
        
        
        
        
        <!-- Jquery Core Js --> 
        <script src="{{ url('/') }}/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
        <script src="{{ url('/') }}/assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
        
        <script src="{{ url('/') }}/assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
        <script src="{{ url('/') }}/assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
        <script src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->
        <script src="{{ url('/') }}/assets/plugins/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js --> 
        <script src="{{ url('/') }}/assets/bundles/c3.bundle.js"></script>
        
        <!-- Jquery DataTable Plugin Js --> 
        <script src="{{ url('/') }}/assets/bundles/datatablescripts.bundle.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
        
        <script src="{{ url('/') }}/assets/bundles/mainscripts.bundle.js"></script>
        <script src="{{ url('/') }}/assets/js/pages/index.js"></script>
        
        <script src="{{ url('/') }}/assets/js/pages/tables/jquery-datatable.js"></script>
        
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
        
        <script type="text/javascript">

            function check()
            {
                if (document.getElementById('application_no').value==""
                 || document.getElementById('application_no').value==undefined)
                {
                    alert ("Please Enter a Application Number");
                    return false;
                }
                return true;
            }

        </script>
    </body>

</html>