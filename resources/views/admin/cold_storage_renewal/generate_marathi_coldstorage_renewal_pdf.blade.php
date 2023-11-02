@include('common.header')
<!--JSPDF CDN-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>-->

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Cold Storage Renewal License</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Cold Storage Renewal License</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
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
                                    <h1><strong>पनवेल महानगरपालिका</strong></h1>
                                    <h4><strong>पशुसंवर्धन विभाग</strong></h4>
                                    <h5><strong>कार्यालय : - देवाळे तलावाच्या  समोर, गोखले  हॉलच्या शेजारी ,  </strong><br></h5>
                                    <h5><strong>पनवेल - ४१०२०६.</strong></h5>
                                </div>
                                <div class="col-md-1" >
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-1"><strong>दूरध्वनी कार्यालय : </strong> ०२२-२७४५८०४०/४१/४२ </p>
                                    <p class="mb-1"><strong>उपायुक्त्त कार्यालय : </strong> ०२२-२७४५५७५१ </p>
                                    <p class="mb-1"><strong>ई-मेल : </strong> panvelcorporation@gmail.com</p>
                                </div>
                                <div class="col-md-4 col-sm-4 text-left" style="padding-left:60px;">
                                    <p class="mb-1"><strong>फॅक्स  नं . : </strong> ०२२-२७४५२२३३ </p>
                                    <p class="mb-1"><strong>आयुक्त्त कार्यालय : </strong> ०२२-२७४५२३३९ </p>
                                    <p class="mb-1"><strong>वेबसाईट : </strong> www.panvelcorporation.com</p>
                                </div>
                            </div>
                            <hr class="mb-1">
                            
                            
                            <div class="row pt-0">
                               
                                 <div class="col-md-9   col-sm-9 ">
                                  वाचा  -  <br><p class="font-weight-bold" >1.महाराष्ट्र महानगरपालिका अधिनियम १९४९ चे कलाम ६९ (१)</p>
                                </div>
                                <div class="col-md-3   col-sm-3 ">
                                   Date :
                                   {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-5 text-center">
                                    <!--<h5><strong>Reference number - </strong></h5>-->
                                    <p class="font-weight-bold">संदर्भ क्रमांक - {{ $meat_renewal_pdf->mobile_number }}</p>
                                </div>
                                <!-- <div class="col-md-12 col-sm-12 pt-5 text-center">-->
                                   
                                <!--    <p class="font-weight-bold">परवाना क्रमांक  : -  {{ $meat_renewal_pdf->renwal_liceans_no }} </p>-->
                                <!--</div>-->
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-5 text-center">
                                     <h5><strong>चिकन /मटण / मासे / म्हशीचे मांस क्रिया शीतगृह <br>( processing /cold storage) व्यवसाय  परवाना </strong>></h5>
                                    <!--<p class="font-weight-bold">License to keep dogs </p>-->
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                 <div class="col-md-12 col-sm-12 pt-1 text-start">
                                    <p>महाराष्ट्र महानगरपालिका  अधिनियम ,१९४९ चे  कलम ३३१ आणि ४५८  चे  पोटकलम  (२६) (२७) (२८) (२९) आणि (४८) अन्वये तयार करण्यात आलेली  पनवेल महानगरपालिकेचे  बाजार, खाजगी बाजार व कत्तलखाने   बाबतचची उपविधीस  अनुसरून , व उक्त कायद्यातील कलम ३३५ व ३८२ अन्वेय नमूद व्यक्तीस व ठिकाणी  चिकन/मटण/मासे/म्हैसवर्गीय  मांस   क्रिया  / शीतगृह (processing cold storage) व्ययसाय परवाना देण्यात येत आहे </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                     <p class="mb-0">
                                        <strong>परवानाधारकाचे नाव - </strong>
                                        <?php
                                                    $applicant_title_id = '';
                                                    
                                                    if($meat_renewal_pdf->applicant_title_id == 1)
                                                    {
                                                        $applicant_title_id = 'Kum.';
                                                    }
                                                    else if($meat_renewal_pdf->applicant_title_id == 2)
                                                    {
                                                        $applicant_title_id = 'M/s';
                                                    }
                                                    else if($meat_renewal_pdf->applicant_title_id == 3)
                                                    {
                                                        $applicant_title_id = 'Smt.';
                                                    }
                                                    else if($meat_renewal_pdf->applicant_title_id == 4)
                                                    {
                                                        $applicant_title_id = 'Ms.';
                                                    }
                                                    else if($meat_renewal_pdf->applicant_title_id == 5)
                                                    {
                                                        $applicant_title_id = 'Mr.';
                                                    }
                                                    else if($meat_renewal_pdf->applicant_title_id == 6)
                                                    {
                                                        $applicant_title_id = 'MrS.';
                                                    }
                                                    else if($meat_renewal_pdf->applicant_title_id == 7)
                                                    {
                                                        $applicant_title_id = 'Dr.';
                                                    }
                                                ?>
                                        {{ $applicant_title_id }} {{ $meat_renewal_pdf->applicant_fname }} {{ $meat_renewal_pdf->applicant_mname }} {{ $meat_renewal_pdf->applicant_lname }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <p class="mb-0">
                                        <strong>License No. - </strong>  
                                        {{ $meat_renewal_pdf->renwal_liceans_no }}
                                    </p>
                                </div>
                               
                            </div>
                           
                            
                            <div class="row pt-3">                                
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-0">
                                        <strong> मांस व्यवसायाचे नाव- </strong>
                                        {{ $meat_renewal_pdf->business_name  }}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    <p class="mb-0">
                                        <strong> old License No. - </strong>  
                                        {{ $meat_renewal_pdf->licence_no }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong> मांस व्यवसाय पत्ता- </strong>
                                        {{ $meat_renewal_pdf->business_address  }}
                                    </p>
                                </div>
                            </div>
                            
                             <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong> व्यवसाय नोंदणी क्रमांक - </strong>
                                        {{ $meat_renewal_pdf->register_number  }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>मांस व्यवसाय प्रकार - </strong>
                                              <?php
                                                    $business_type = '';
                                                    
                                                    if($meat_renewal_pdf->business_type == 1)
                                                    {
                                                        $business_type = 'Butcher Shop ( मांस  विक्री  केंद्र )';
                                                    }
                                                    else if($meat_renewal_pdf->business_type == 2)
                                                    {
                                                        $business_type = 'Meat Processing Plant ( मांस  प्रक्रिया   केंद्र  )';
                                                    }
                                                    else if($meat_renewal_pdf->business_type == 3)
                                                    {
                                                        $business_type = 'Transportation of Meat ( मांसाची  वाहतूक )';
                                                    }
                                                    else if($meat_renewal_pdf->business_type == 4)
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
                                        <strong>मांस व्यवसाय प्रति दिवस क्षमता - </strong>
                                        {{ $meat_renewal_pdf->per_day_capacity  }}
                                    </p>
                                </div>
                            </div>
                             
                            
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>परवाना जारी करण्याची तारीख - </strong>
                                        {{ (!empty($meat_renewal_pdf->approve_date) ? date("d/m/Y", strtotime($meat_renewal_pdf->approve_date)) : NULL) }}
                                    </p>
                                </div>
                            </div>
                            <?php 
                            $approve_date = $meat_renewal_pdf->approve_date_of_license_obtain;
                            
                            $newEndingDate = date("d-m-Y", strtotime(date("d-m-Y", strtotime($approve_date)) . " + 1 year"));
                            
                            ?>
                            <div class="row pt-3">                                
                                <div class="col-md-12 col-sm-12">
                                   <p class="mb-0">
                                        <strong>परवाना वैध दिनांक    </strong>
                                        <br> दि . {{ (!empty($meat_renewal_pdf->approve_date_of_license_obtain) ? date("d/m/Y", strtotime($meat_renewal_pdf->approve_date_of_license_obtain)) : NULL) }} &nbsp;ते&nbsp;{{ date("d/m/Y", strtotime($fiscalYear)) }}
                                    </p>
                                </div>
                            </div>
                           
                            
                            <div class="row pt-3"> 
                                <div class="col-md-12 col-sm-12 text-right">
                                    <p class="mb-0">
                                        @if(!empty($meat_renewal_pdf->approve_by == Auth::id()))
                                        <strong>{{ Auth::user()->name }}</strong><br>
                                        @endif
                                          <strong>पशुधन विकास अधिकारी </strong><br>
                                        <strong>पनवेल महानगरपालिका </strong>
                                    </p>
                                </div>
                            </div>
                            
                        </div>    
                    </div>
                    <div class="submit-section text-right pt-5" >
					    <a href='{{ url("/cold_storage_renewal_list/{$meat_renewal_pdf->status}") }}' class="btn btn-danger btn-lg text-light" >Cancel</a>
						<button  class="btn btn-success btn-lg" type="button" onClick="printDiv('divToPrint')" ><i class="fa fa-print fa-lg text-light"></i> &nbsp;&nbsp;Print</button>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
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
@include('common.footer')  