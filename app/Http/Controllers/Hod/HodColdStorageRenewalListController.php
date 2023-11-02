<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ColdStorageRenewalLicense_Model;
use App\Models\ApproverenewalAdmin_Model;
use App\Models\ApproveAdmin_Model;
use App\Models\MeatType_Master;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HodColdStorageRenewalListController extends Controller
{
    //

    public function ColdStorageRenewalLists(request $request, $status)
    {
        // Display All Meat Registration Form ( Status - 0 )
        $meat_renewal_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')

                                        // ->where('t1.status', '=', $status)
                                        // ->where('t1.id', '=', $id)
                                        ->where('t1.re_hod_status', '=', $status)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
        // return $meat_registration_list;

        return view('hod.hod_cold_storage_renewal.grid', compact('meat_renewal_list', 'status'));
    }


    public function ColdStorageView(request $request, $id, $status)
    {       
        
         $meat_renewal_view = DB::table('coldstorage_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.adharcard_doc as regi_adharcard_doc','t5.residitional_proof_doc as regi_residitional_proof_doc','t5.authority_letter_doc as regi_authority_letter_doc','t5.legal_business_doc as regi_legal_business_doc','t5.business_registration_doc as regi_business_registration_doc','t5.agreement_owner_doc as agreement_owner_renewal','t5.noc_owner_doc as doc_owner','t5.property_tax_doc as property_doc','t5.paid_water_doc as paid_water','t5.paid_receipt_doc as receipt_doc','t5.treatment_authorized_doc as tre_authority_doc','t5.fitness_certificate_doc as fitness_doc','t5.issued_doc as regi_issued_doc','t5.registration_doc as regi_doc','t5.slaughter_letter_doc as letter_doc','t5.profile_photo as regi_profile_photo','t5.applicant_signature as regi_app_sign')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('coldstorage_registration_tbl AS t5', 't5.id', '=', 't1.coldstorage_regi_id')
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.re_hod_status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
          //dd($meat_renewal_view);

        return view('hod.hod_cold_storage_renewal.view', compact('meat_renewal_view'));
    }

    public function ApproveColdStoragerenewal(request $request, $id)
    {
        
        //  $data = new ApproverenewalAdmin_Model();

        // $data->meat_pplication_id = $request->id;
        // $data->total_recived_tax = $request->get('total_recived_tax');
        // $data->mobile_number = $request->get('mobile_number');
        // $data->receipt_no = $request->get('receipt_no');
        // $data->date_of_receipt = (!empty($request->date_of_receipt) ? date("d-m-Y", strtotime($request->date_of_receipt)) : NULL);
        // $data->license_number = $request->get('license_number');
        // $data->date_of_license_obtain = (!empty($request->date_of_license_obtain) ? date("d-m-Y", strtotime($request->date_of_license_obtain)) : NULL);
        // $data->date = (!empty($request->date) ? date("d-m-Y", strtotime($request->date)) : NULL);
        // $data->inserted_dt = date("Y-m-d H:i:s");
        // $data->inserted_by = Auth::user()->id;
        // // $data->status = 1; //Rejected
        // $data->save();
        
         $update = [
            're_hod_status' => 1,
             'approve_date' => date("Y-m-d"),
             'approve_by' => Auth::user()->id,
        ];
        
        ColdStorageRenewalLicense_Model::where('id', $id)->update($update);

        // $app_no = $request->get('license_number');
        // $scheme = 'Cold Storage Registration Form';
        //$domain = "https://".$_SERVER['HTTP_HOST'];

        //print_r($data->mobile_number);exit; 
        //$project_folder = 'PMC_MeatRegistration';
        
        // $msg = "Your application no:- $app_no for $scheme is Approved Successfully.";

        // $tempID= '1207167447455213113';
        // $this->sendsms($msg,$data->mobile_number,$tempID);
        
       

        return redirect('/hod_cold_storage_renewal_list/1')->with('message', 'Cold Storage Renewal Form Approved By HOD Successfully'); //Redirect user somewhere
    }


    public function RejectColdStoragerenewal(request $request, $id){
        
        $update = [
            're_hod_status' => 2,
             'reject_resion' => $request->get('reject_resion'),
             'reject_date' => date("Y-m-d H:i:s"),
             'reject_by' => Auth::user()->id,

         ];
         
         ColdStorageRenewalLicense_Model::where('id', $id)->update($update);
         
        //  $app_no = $request->get('meat_pplication_no');
        //  $resion = $request->get('reject_resion');
        //   $mobile = $request->get('mobile_number');
         //$domain = "https://".$_SERVER['HTTP_HOST'];
 
         //print_r($data->mobile_number);exit; 
         //$project_folder = 'PMC_MeatRegistration';
         
        //  $msg = "Your application no:- $app_no is Rejected Resion For :- $resion .";
 
        //  $tempID= '1207167447455213113';
        //  $this->sendsms($msg,$mobile,$tempID);
         
 
         return redirect('/cold_storage_renewal_list/2')->with('message', 'Cold Storage Renewal Form Rejected Successfully'); //Redirect user somewhere
     }



     public function FinalApprovedbyAdminListrenewal(request $request, $status)
     {

        $meat_renewal_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                    ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                    ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                    ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                    ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')

                                    // ->where('t1.status', '=', $status)
                                    // ->where('t1.id', '=', $id)
                                    ->where('t1.re_final_approve', '=', $status) 
                                    ->where('t1.re_hod_status', '=', 1)         
                                    ->where('t1.status', '=', 1)
                                    ->whereNull('t1.deleted_at')
                                    ->whereNull('t2.deleted_at')
                                    ->whereNull('t3.deleted_at')
                                    ->whereNull('t4.deleted_at')
                                    ->orderBy('t1.id', 'DESC')
                                    ->get();
        
        return view('hod.admin_approve_list_renewal.grid', compact('meat_renewal_list', 'status'));
        
     }


     public function FinalApproveRenewalView(request $request, $id, $status)
     {

        $meat_renewal_view = DB::table('coldstorage_renewal_license_tbl AS t1')
                                ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.adharcard_doc as regi_adharcard_doc','t5.residitional_proof_doc as regi_residitional_proof_doc','t5.authority_letter_doc as regi_authority_letter_doc','t5.legal_business_doc as regi_legal_business_doc','t5.business_registration_doc as regi_business_registration_doc','t5.agreement_owner_doc as agreement_owner_renewal','t5.noc_owner_doc as doc_owner','t5.property_tax_doc as property_doc','t5.paid_water_doc as paid_water','t5.paid_receipt_doc as receipt_doc','t5.treatment_authorized_doc as tre_authority_doc','t5.fitness_certificate_doc as fitness_doc','t5.issued_doc as regi_issued_doc','t5.registration_doc as regi_doc','t5.slaughter_letter_doc as letter_doc','t5.profile_photo as regi_profile_photo','t5.applicant_signature as regi_app_sign')
                                ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                ->leftJoin('coldstorage_registration_tbl AS t5', 't5.id', '=', 't1.coldstorage_regi_id')
                                // ->where('t1.status', '=', $status)
                                ->where('t1.re_final_approve', '=', $status)
                                ->where('t1.id', '=', $id)
                                ->where('t1.status', '=', 1)
                                ->whereNull('t1.deleted_at')
                                ->whereNull('t2.deleted_at')
                                ->whereNull('t3.deleted_at')
                                ->whereNull('t4.deleted_at')
                                ->orderBy('t1.id', 'DESC')
                                ->first();
//dd($meat_renewal_view);

        return view('hod.admin_approve_list_renewal.view', compact('meat_renewal_view'));

     }


     public function ApprovebyHodRenewal(request $request, $id)
     {
 
          $data = new ApproverenewalAdmin_Model();

        $data->meat_pplication_id = $request->id;
        $data->total_recived_tax = $request->get('total_recived_tax');
        $data->mobile_number = $request->get('mobile_number');
        $data->receipt_no = $request->get('receipt_no');
        $data->date_of_receipt = (!empty($request->date_of_receipt) ? date("d-m-Y", strtotime($request->date_of_receipt)) : NULL);
        $data->license_number = $request->get('license_number');
        $data->date_of_license_obtain = (!empty($request->date_of_license_obtain) ? date("d-m-Y", strtotime($request->date_of_license_obtain)) : NULL);
        $data->date = (!empty($request->date) ? date("d-m-Y", strtotime($request->date)) : NULL);
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        // $data->status = 1; //Rejected
        $data->save();
         
         $update = [
             're_final_approve' => 1,
             're_final_approve_date' => date("Y-m-d"),
             're_final_approve_by' => Auth::user()->id,
         ];
         

         ColdStorageRenewalLicense_Model::where('id', $id)->update($update);
 
         return redirect('/admin_approve_list_renewal/1')->with('message', 'Cold Storage Renewal Form Hod Final Approved Successfully'); //Redirect user somewhere
         
     }

     public function RejectByHodRenewal(request $request, $id)
     {

        $update = [
            're_final_approve' => 2,
            're_final_reason_for_rejection'   =>$request->get('reject_resion'),
            're_final_reject_dt' => date("Y-m-d"),
            're_final_reject_by' => Auth::user()->id,

        ];

        ColdStorageRenewalLicense_Model::where('id', $id)->update($update);

        return redirect('/admin_approve_list_renewal/2')->with('message', 'Cold Storage Renewal Form Hod Final Rejected Successfully');
     }


     public function EnglishGenerateColdStoragerenewal(request $request, $id, $status)
     {
       
          $meat_renewal_pdf =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                       ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.cold_storage_aplication_no as licence_no','t5.adharcard_doc','t5.residitional_proof_doc','t5.legal_business_doc','t5.business_registration_doc','t5.property_tax_doc','t5.paid_water_doc','t5.slaughter_letter_doc','t5.treatment_authorized_doc','t5.fitness_certificate_doc','t5.issued_doc','t5.applicant_signature','t5.inserted_by','t6.id as approve_id', 't6.meat_pplication_id as approve_PET_UniqueID','t6.date_of_license_obtain as approve_date_of_license_obtain')
                                       ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                       ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                       ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                       ->leftJoin('coldstorage_registration_tbl AS t5', 't5.id', '=', 't1.coldstorage_regi_id')
                                       ->leftJoin('approve_by_admin_renewal_license_tbl AS t6', 't6.meat_pplication_id', '=', 't1.id')
                                    //    ->where('t1.status', '=', $status)
                                       ->where('t1.re_final_approve', '=', $status)
                                       ->where('t1.status', '=', 1)
                                       ->where('t1.id', '=', $id)
                                       ->whereNull('t1.deleted_at')
                                       ->whereNull('t2.deleted_at')
                                       ->whereNull('t3.deleted_at')
                                       ->whereNull('t4.deleted_at')
                                       ->whereNull('t5.deleted_at')
                                       ->whereNull('t6.deleted_at')
                                       ->orderBy('t1.id', 'DESC')
                                       ->first();
                                       
       $current_date = $meat_renewal_pdf->inserted_dt;
       // dd($current_date);
       
       $current_m = date('m', strtotime($current_date));
       $currentMonth = Carbon::today($current_m)->format('m');
       // dd($currentMonth);
       $fiscalYear = '';
       
       $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();                            
                                  
       return view('hod.admin_approve_list_renewal.generate_english_coldstorage_renewal_pdf', compact('meat_renewal_pdf','fiscalYear'));
     }


     
     public function MarathiGenerateColdStoragerenewal(request $request, $id, $status)
      {
        
           $meat_renewal_pdf =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.cold_storage_aplication_no as licence_no','t5.adharcard_doc','t5.residitional_proof_doc','t5.legal_business_doc','t5.business_registration_doc','t5.property_tax_doc','t5.paid_water_doc','t5.slaughter_letter_doc','t5.treatment_authorized_doc','t5.fitness_certificate_doc','t5.issued_doc','t5.applicant_signature','t5.inserted_by','t6.id as approve_id', 't6.meat_pplication_id as approve_PET_UniqueID','t6.date_of_license_obtain as approve_date_of_license_obtain')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('coldstorage_registration_tbl AS t5', 't5.id', '=', 't1.coldstorage_regi_id')
                                        ->leftJoin('approve_by_admin_renewal_license_tbl AS t6', 't6.meat_pplication_id', '=', 't1.id')
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.re_final_approve', '=', $status)
                                         ->where('t1.status', '=', 1)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->whereNull('t6.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
         $current_date = $meat_renewal_pdf->inserted_dt;
        // dd($current_date);
        
        $current_m = date('m', strtotime($current_date));
        $currentMonth = Carbon::today($current_m)->format('m');
        // dd($currentMonth);
        $fiscalYear = '';
        
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();                            
                                                                    
        return view('hod.admin_approve_list_renewal.generate_marathi_coldstorage_renewal_pdf', compact('meat_renewal_pdf','fiscalYear'));
      }

      public function adminRejectedListRenewal(request $request, $status)
     {

        $meat_renewal_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                            ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                            ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                            ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                            ->where('t1.status', '=', $status) 
                            // ->where('t1.reject_by', '=', 2)
                            ->where('t1.re_hod_status', '=', 1)    
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                            ->orderBy('t1.id', 'DESC')
                            ->get();
                        // return $meat_registration_list;

         return view('hod.admin_approve_list_renewal.renewal_rejected_list', compact('meat_renewal_list', 'status'));

     }


     public function cold_storage_renewal_Report_List(request $request)
     {
        $meat_registration_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                      
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_renewal_license_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
                                        
        // return $pet_registration_list;
        
        return view('hod.report.cold_storage_renewal_report', compact('meat_registration_list'));
     }

      public function cold_storage_renewalSearchReport(request $request)
    {
        
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $status = $request->input('status');
        $adminstatus = $request->input('adminstatus');
        $finalstatus = $request->input('finalstatus');
        $meat_type = $request->input('meat_type');
        $business_type = $request->input('business_type');

        if($request->from_date && $request->to_date){
     
        $meat_search_registration_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_renewal_license_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                        ->whereDate('t1.inserted_dt', '<=', $to_date)   
                                        
                                        // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                        
                                        // ->where('t1.status', '=', $status )
                                        
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
        
        // dd ($pet_search_registration_list);

    }

    if($request->meat_type){

        $meat_search_registration_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                            
                                    ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                    ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                    ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                    ->leftJoin('approve_by_admin_renewal_license_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                    // ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                    // ->whereDate('t1.inserted_dt', '<=', $to_date)   
                                    
                                    // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                    
                                    ->where('t1.meat_type', '=', $meat_type)
                                    
                                    ->whereNull('t1.deleted_at')
                                    ->whereNull('t2.deleted_at')
                                    ->whereNull('t3.deleted_at')
                                    ->whereNull('t4.deleted_at')
                                    ->whereNull('t5.deleted_at')
                                    ->orderBy('t1.inserted_dt', 'DESC')
                                    ->get();


     }
     if($request->business_type){

        $meat_search_registration_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                            ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_renewal_license_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        // ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                        // ->whereDate('t1.inserted_dt', '<=', $to_date)   
                                        
                                        // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                        
                                        ->where('t1.business_type', '=', $business_type)
                                        
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();

     }

     if($request->status){

        $meat_search_registration_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                            
                                    ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                    ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                    ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                    ->leftJoin('approve_by_admin_renewal_license_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                    // ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                    // ->whereDate('t1.inserted_dt', '<=', $to_date)   
                                    
                                    // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                    ->Where('t1.re_hod_status', '=', $status )
                                    ->whereNull('t1.deleted_at')
                                    ->whereNull('t2.deleted_at')
                                    ->whereNull('t3.deleted_at')
                                    ->whereNull('t4.deleted_at')
                                    ->whereNull('t5.deleted_at')
                                    ->orderBy('t1.inserted_dt', 'DESC')
                                    ->get();

     }
     if($request->adminstatus){

        $meat_search_registration_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                            
                                    ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                    ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                    ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                    ->leftJoin('approve_by_admin_renewal_license_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                    // ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                    // ->whereDate('t1.inserted_dt', '<=', $to_date)   
                                    
                                    // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                    ->Where('t1.status', '=', $adminstatus )
                                    ->whereNull('t1.deleted_at')
                                    ->whereNull('t2.deleted_at')
                                    ->whereNull('t3.deleted_at')
                                    ->whereNull('t4.deleted_at')
                                    ->whereNull('t5.deleted_at')
                                    ->orderBy('t1.inserted_dt', 'DESC')
                                    ->get();

     }
     if($request->finalstatus){

        $meat_search_registration_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                            ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_renewal_license_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        // ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                        // ->whereDate('t1.inserted_dt', '<=', $to_date)   
                                        
                                        // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                        ->Where('t1.re_final_approve', '=', $finalstatus )
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        ->get();
     }
     if($request->status && $request->from_date && $request->to_date && $request->adminstatus && $request->finalstatus){

        $meat_search_registration_list =  DB::table('coldstorage_renewal_license_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                            
                                    ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                    ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                    ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                    ->leftJoin('approve_by_admin_renewal_license_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                    ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                    ->whereDate('t1.inserted_dt', '<=', $to_date)  
                                    // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                    // ->where('t1.status', '=', $status )
                                    ->Where('t1.re_hod_status', '=', $status )
                                    ->Where('t1.status', '=', $adminstatus )
                                    ->Where('t1.re_final_approve', '=', $finalstatus )
                                    ->whereNull('t1.deleted_at')
                                    ->whereNull('t2.deleted_at')
                                    ->whereNull('t3.deleted_at')
                                    ->whereNull('t4.deleted_at')
                                    ->whereNull('t5.deleted_at')
                                    ->orderBy('t1.inserted_dt', 'DESC')
                                    ->get();
     }
        
        return view('hod.report.cold_storage_renewal_report',  compact('meat_search_registration_list'));
    }


    public function renewal_report_view(request $request, $id){

        $meat_renewal_view = DB::table('coldstorage_renewal_license_tbl AS t1')
                            ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.adharcard_doc as regi_adharcard_doc','t5.residitional_proof_doc as regi_residitional_proof_doc','t5.authority_letter_doc as regi_authority_letter_doc','t5.legal_business_doc as regi_legal_business_doc','t5.business_registration_doc as regi_business_registration_doc','t5.agreement_owner_doc as agreement_owner_renewal','t5.noc_owner_doc as doc_owner','t5.property_tax_doc as property_doc','t5.paid_water_doc as paid_water','t5.paid_receipt_doc as receipt_doc','t5.treatment_authorized_doc as tre_authority_doc','t5.fitness_certificate_doc as fitness_doc','t5.issued_doc as regi_issued_doc','t5.registration_doc as regi_doc','t5.slaughter_letter_doc as letter_doc','t5.profile_photo as regi_profile_photo','t5.applicant_signature as regi_app_sign')
                            ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                            ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                            ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                            ->leftJoin('coldstorage_registration_tbl AS t5', 't5.id', '=', 't1.coldstorage_regi_id')
                            // ->where('t1.status', '=', $status)
                            ->where('t1.id', '=', $id)
                            ->whereNull('t1.deleted_at')
                            ->whereNull('t2.deleted_at')
                            ->whereNull('t3.deleted_at')
                            ->whereNull('t4.deleted_at')
                            ->orderBy('t1.id', 'DESC')
                            ->first();

      return view('hod.report.renewal_report_view', compact('meat_renewal_view'));
    }

}
