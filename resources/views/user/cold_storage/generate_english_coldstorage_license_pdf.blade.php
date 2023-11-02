<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title> PMC Cold Storage License </title>

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
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/userend/assets/src/plugins/jquery-steps/jquery.steps.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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
    .error{
        color:red;
    }
    
    .wizard-content .wizard>.steps>ul>li.current>a {
        color: #1b00ff;
        font-size: 18px;
        cursor: default;
        font-weight: bolder;
    }
    
    .wizard-content .wizard>.steps>ul>li.current .step {
        border-color: #1b00ff;
        background-color: #fff;
        color: #1b00ff;
    }
    
    .wizard-content .wizard>.actions>ul>li>a {
        background: #1b00ff;
        color: #fff;
        display: block;
        padding: 7px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        min-width: 100px;
        text-align: center;
    }
    
    .wizard-content .wizard>.actions>ul>li>a[href="#previous"] {
        background-color: #fff;
        color: #1b00ff;
        border: 1px solid #1b00ff;
    }
    
    .wizard-content .wizard>.steps>ul>li.done .step {
        background-color: #1b00ff;
        border-color: #1b00ff;
        color: #fff;
    }
    
    .wizard-content .wizard.wizard-circle>.steps>ul>li:after, .wizard-content .wizard.wizard-circle>.steps>ul>li:before {
        top: 45px;
        width: 50%;
        height: 3px;
        background-color: #1b00ff;
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
                                        @if(Auth::guard('meatregistereduser')->check())
                                           <span class="user-name">
                                                {{ Auth::guard('meatregistereduser')->user()->name }}
                                            </span>
                                        @elseif(Auth::guard('web')->check())
                                           <span class="user-name">
                                                {{ Auth::user()->name }} 
                                            </span>
                                        @else
                                           <span class="user-name">
                                                
                                            </span>
                                        @endif
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
                        
                        <div class="col-sm-10 col-xs-12 d-flex flex-column align-items-center align-items-sm-start">
                            <div class="title">
                                <h4>Cold Storage License </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <!--<li class="breadcrumb-item"><a href="javascript:;">Documentation</a></li>-->
                                    <li class="breadcrumb-item active" aria-current="page">Cold Storage License</li>
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
                                        @if(Auth::guard('meatregistereduser')->check())
                                           <span class="user-name">
                                                {{ Auth::guard('meatregistereduser')->user()->name }}
                                            </span>
                                        @elseif(Auth::guard('web')->check())
                                           <span class="user-name">
                                                {{ Auth::user()->name }} 
                                            </span>
                                        @else
                                           <span class="user-name">
                                                
                                            </span>
                                        @endif
                    
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
<section class="content">
    <div class="body_scroll">
        <!--<div class="block-header">-->
        <!--    <div class="row">-->
        <!--        <div class="col-lg-7 col-md-6 col-sm-12">-->
        <!--            <h2>Cold Storage Application</h2>-->
        <!--            <ul class="breadcrumb">-->
        <!--                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>-->
        <!--                <li class="breadcrumb-item active">Cold Storage Application</li>-->
        <!--            </ul>-->
        <!--            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>-->
        <!--        </div>-->
        <!--        <div class="col-lg-5 col-md-6 col-sm-12">                -->
        <!--            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    
                    <div class="card"  id="divToPrint">
                        <div class="body" style="padding:60px;">
                            <div class="row">
                                <div class="col-md-3" >
                                    <div class="icon-box">
                                        <img class="img-fluid " src="{{ url('/') }}/assets/images/PMC-logo.png" alt="Awesome Image" style="height:150px; width:220px;">
                                    </div>
                                </div>
                               
                                <div class="col-md-8 text-center">
                                    <h1><strong>Panvel Municipal Corporation </strong></h1>
                                    <h4><strong>Department of Animal Husbandry</strong></h4>
                                    <h5><strong>Office :- Opposite Devale Lake, Gokhale Hall  </strong><br></h5>
                                    <h5><strong>Panvel - 410206.</strong></h5>
                                </div>
                                <div class="col-md-1" >
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-1"><strong>Telephone Office : </strong> 022-27458040/41/42 </p>
                                    <p class="mb-1"><strong>Office of the Deputy Commissioner : </strong> 022-27455751 </p>
                                    <p class="mb-1"><strong>e-mail : </strong> panvelcorporation@gmail.com</p>
                                </div>
                                <div class="col-md-4 col-sm-4 text-left" style="padding-left:60px;">
                                    <p class="mb-1"><strong>Fax Number . : </strong> 022-27452233 </p>
                                    <p class="mb-1"><strong>Commissioner's Office : </strong> 022-27452339 </p>
                                    <p class="mb-1"><strong>Website : </strong> www.panvelcorporation.com</p>
                                </div>
                            </div>
                            <hr class="mb-1">
                            
                            
                            <div class="row pt-0">
                                <!--<div class="col-md-9   col-sm-9 ">-->
                                <!--   जा.क्र.पमपा / वै.आ.वि. &nbsp; &nbsp; &nbsp;   / पशुवैद्यकीय सेवा / प्र.क.  {{ $meat_registration_pdf->cold_storage_aplication_no }} / {{ now()->year }}   -->
                                <!--</div>-->
                                 <div class="col-md-9   col-sm-9 ">
                                  Read on -  <br> 1.Section 69 (1) of the Maharashtra Municipal Corporation Act, 1949   
                                </div>
                                <div class="col-md-3   col-sm-3 ">
                                   Date :
                                   {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-5 text-center">
                                    <!--<h5><strong>Reference number - </strong></h5>-->
                                    <p class="font-weight-bold">Reference number -  {{ $meat_registration_pdf->mobile_number }}</p>
                                </div>
                                 <div class="col-md-12 col-sm-12 pt-5 text-center">
                                    <!--<h5><strong>License Number  {{ $meat_registration_pdf->cold_storage_aplication_no }}</strong></h5>-->
                                    <p class="font-weight-bold">License Number : -  {{ $meat_registration_pdf->cold_storage_aplication_no }} </p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-5 text-center">
                                      <h5><strong>chicken /mutton / fish / Buffalo meat activity/<br> processing/cold storage Business license </strong></h5>
                                    <!--<p class="font-weight-bold">License to keep dogs </p>-->
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-1 text-start">
                                    <p>Pursuant to the bye-law of the Panvel Municipal Corporation relating to markets, private markets and slaughterhouses made under sub-sections (26) (27) (28) (29) and (48) of sections 331 and 458 of the Maharashtra Municipal Corporation Act, 1949, and section 335 and Chicken/Mutton/Fish/Buffalo Meat Activity/Cold Storage business license is being issued to the person and place mentioned under 382.</p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                     <p class="mb-0">
                                        <strong>Name of Licensee - </strong>
                                        <?php
                                                    $applicant_title_id = '';
                                                    
                                                    if($meat_registration_pdf->applicant_title_id == 1)
                                                    {
                                                        $applicant_title_id = 'Kum.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 2)
                                                    {
                                                        $applicant_title_id = 'M/s';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 3)
                                                    {
                                                        $applicant_title_id = 'Smt.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 4)
                                                    {
                                                        $applicant_title_id = 'Ms.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 5)
                                                    {
                                                        $applicant_title_id = 'Mr.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 6)
                                                    {
                                                        $applicant_title_id = 'MrS.';
                                                    }
                                                    else if($meat_registration_pdf->applicant_title_id == 7)
                                                    {
                                                        $applicant_title_id = 'Dr.';
                                                    }
                                                ?>
                                        {{ $applicant_title_id }} {{ $meat_registration_pdf->applicant_fname }} {{ $meat_registration_pdf->applicant_mname }} {{ $meat_registration_pdf->applicant_lname }}
                                    </p>
                                </div>
                                <!--<div class="col-md-4 col-sm-4 ">-->
                                <!--    <p class="mb-0">-->
                                <!--        <strong>License No. - </strong>  -->
                                <!--        {{ $meat_registration_pdf->cold_storage_aplication_no }}-->
                                <!--    </p>-->
                                <!--</div>-->
                            </div>
                           
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Meat business name - </strong>
                                        {{ $meat_registration_pdf->business_name  }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Business address - </strong>
                                        {{ $meat_registration_pdf->business_address  }}
                                    </p>
                                </div>
                            </div>
                            
                             <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Business registration number - </strong>
                                        {{ $meat_registration_pdf->register_number  }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Meat business Type - </strong>
                                         <?php
                                                    $business_type = '';
                                                    
                                                    if($meat_registration_pdf->business_type == 1)
                                                    {
                                                        $business_type = 'Buture Shope ( मांस  विक्री  केंद्र )';
                                                    }
                                                    else if($meat_registration_pdf->business_type == 2)
                                                    {
                                                        $business_type = 'Meat Processing Plant ( मांस  प्रक्रिया   केंद्र  )';
                                                    }
                                                    else if($meat_registration_pdf->business_type == 3)
                                                    {
                                                        $business_type = 'Transportation of Meat ( मांसाची  वाहतूक )';
                                                    }
                                                    else if($meat_registration_pdf->business_type == 4)
                                                    {
                                                        $business_type = 'Other ( इतर )';
                                                    }
                                                ?>
                                                
                                            {{ $business_type }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Meat business Per day capacity - </strong>
                                        {{ $meat_registration_pdf->per_day_capacity  }}
                                    </p>
                                </div>
                            </div>
                             
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>Date of issue of Licence - </strong>
                                        {{ (!empty($meat_registration_pdf->approve_date) ? date("d/m/Y", strtotime($meat_registration_pdf->approve_date)) : NULL) }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">

                                      <p class="mb-0">
                                        <p class="mb-0">
                                            <strong>License Valid Date - </strong>
                                        </p>
                                        From  {{ (!empty($meat_registration_pdf->approve_date_of_license_obtain) ? date("d/m/Y", strtotime($meat_registration_pdf->approve_date_of_license_obtain)) : NULL) }} &nbsp;To &nbsp;{{ date("d/m/Y", strtotime($fiscalYear)) }}
                                    </p>
                                </div>
                            </div>
                           
                            
                            <div class="row pt-3"> 
                                <div class="col-md-12 col-sm-12 text-right">
                                    <p class="mb-0">
                                        @if(!empty($meat_registration_pdf->approve_by == Auth::id()))
                                        <strong>{{ Auth::user()->name }}</strong><br>
                                        @endif
                                        <strong>Livestock Development Officer </strong><br>
                                        <strong>Panvel Municipal Corporation </strong>
                                    </p>
                                </div>
                            </div>
                            
                        </div>    
                    </div>
                    <div class="submit-section text-right pt-5" >
					    <a href='{{ url("/user/appli_form/") }}' class="btn btn-danger btn-lg text-light" >Cancel</a>
						<button  class="btn btn-success btn-lg" type="button" onClick="printDiv('divToPrint')" ><i class="fa fa-print fa-lg text-light"></i> &nbsp;&nbsp;Print</button>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
</div>
</div>


 <!-- js -->
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/core.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/script.min.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/process.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/layout-settings.js"></script>
    <script src="{{ url('/') }}/userend/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="{{ url('/') }}/userend/assets/vendors/scripts/steps-setting.js"></script>
    



<script>
    function printDiv(divName) {
        $("#print").css("display", "none");
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        $("#print").css("display", "block");
        // location.reload();
    
    }
</script>

</body>

</html>

