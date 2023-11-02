@include('common.header')
        
        <!-- Main Content -->
        <section class="content">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/hod/dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 ">
                            <div class="body">
                                <!--<h6>Traffic</h6>-->
                                <h2>
                                    <img src="https://cdn-icons-png.flaticon.com/128/1134/1134447.png" class="rounded-circle" alt="meat" style="enable-background:new 0 0 512 512 height:50px; width:50px;">                                                                        
                                    <strong style="float: right;">{{ $total_pending_meat_register }}</strong>
                                </h2>
                                <strong style="font-weight:900px;">Total Pending Form</strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 ">
                            <div class="body">
                                <!--<h6>Traffic</h6>-->
                                <h2>
                                    <img src="https://cdn-icons-png.flaticon.com/128/1134/1134447.png" class="rounded-circle" alt="meat" style="enable-background:new 0 0 512 512 height:50px; width:50px;">                                                                        
                                    <strong style="float: right;">{{ $total_approve_meat_register }}</strong>
                                </h2>
                                <strong style="font-weight:900px;">Total Approved Form</strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 ">
                            <div class="body">
                                <!--<h6>Traffic</h6>-->
                                <h2>
                                    <img src="https://cdn-icons-png.flaticon.com/128/1134/1134447.png" class="rounded-circle" alt="meat" style="enable-background:new 0 0 512 512 height:50px; width:50px;">                                                                        
                                    <strong style="float: right;">{{ $total_rejected_meat_register }}</strong>
                                </h2>
                                <strong style="font-weight:900px;">Total Rejected Form</strong>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
                <div class="row clearfix">
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 ">
                            <div class="body">
                                <!--<h6>Traffic</h6>-->
                                <h2>
                                    <img src="https://cdn-icons-png.flaticon.com/128/1134/1134447.png" class="rounded-circle" alt="meat" style="enable-background:new 0 0 512 512 height:50px; width:50px;">                                                                        
                                    <strong style="float: right;">{{ $total_pending_cold_renewal_register }}</strong>
                                </h2>
                                <strong style="font-weight:900px;">Total Pending Cold Storage Renewal Form</strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 ">
                            <div class="body">
                                <!--<h6>Traffic</h6>-->
                                <h2>
                                    <img src="https://cdn-icons-png.flaticon.com/128/1134/1134447.png" class="rounded-circle" alt="meat" style="enable-background:new 0 0 512 512 height:50px; width:50px;">                                                                        
                                    <strong style="float: right;">{{ $total_approve_cold_renewal_register }}</strong>
                                </h2>
                                <strong style="font-weight:900px;">Total Approved Cold Storage Renewal Form</strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 ">
                            <div class="body">
                                <!--<h6>Traffic</h6>-->
                                <h2>
                                    <img src="https://cdn-icons-png.flaticon.com/128/1134/1134447.png" class="rounded-circle" alt="meat" style="enable-background:new 0 0 512 512 height:50px; width:50px;">                                                                        
                                    <strong style="float: right;">{{ $total_rejected_cold_renewal_register }}</strong>
                                </h2>
                                <strong style="font-weight:900px;">Total Rejected Cold Storage Renewal Form</strong>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
              
            </div>
        </section>


@include('common.footer')   