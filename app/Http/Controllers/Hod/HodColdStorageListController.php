<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColdStorageRegistration_Model;
use App\Models\ApproveAdmin_Model;
use App\Models\MeatType_Master;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HodColdStorageListController extends Controller
{
    //

    public function ColdStorageRegistrationList(request $request, $status)
    {
        // Display All Meat Registration Form ( Status - 0 )
        $meat_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->where('t1.hod_status', '=', $status)
                                        // ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
        // return $meat_registration_list;

        return view('hod.cold_storage_registration.grid', compact('meat_registration_list', 'status'));
    }

    public function ColdStorageView(request $request, $id, $status)
    {
        $meat_registration_view =  DB::table('coldstorage_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')

                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.hod_status', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
        // return $meat_registration_view;
        
        return view('hod.cold_storage_registration.view', compact('meat_registration_view'));
    }


      // Approved Meat Registration Form ( Status - 1 )
      public function ApproveColdStorageRegistrations(request $request, $id)
      {
 
         //print_r($request->get('mobile_number'));exit;
        //  $data = new ApproveAdmin_Model();
 
        //  $data->meat_pplication_id = $request->id;
        //  $data->total_recived_tax = $request->get('total_recived_tax');
        //  $data->mobile_number = $request->get('mobile_number');
        //  $data->receipt_no = $request->get('receipt_no');
        //  $data->date_of_receipt = (!empty($request->date_of_receipt) ? date("d-m-Y", strtotime($request->date_of_receipt)) : NULL);
        //  $data->license_number = $request->get('license_number');
        //  $data->date_of_license_obtain = (!empty($request->date_of_license_obtain) ? date("d-m-Y", strtotime($request->date_of_license_obtain)) : NULL);
        //  $data->date = (!empty($request->date) ? date("d-m-Y", strtotime($request->date)) : NULL);
        //  $data->inserted_dt = date("Y-m-d H:i:s");
        //  $data->inserted_by = Auth::user()->id;
        //  // $data->status = 1; //Rejected
        //  $data->save();
         
         $update = [
             'hod_status' => 1,
             'approve_date' => date("Y-m-d"),
             'approve_by' => Auth::user()->id,
         ];
         
         ColdStorageRegistration_Model::where('id', $id)->update($update);
 
        //  $app_no = $request->get('license_number');
        //  $scheme = 'Cold Storage Registration Form';
         //$domain = "https://".$_SERVER['HTTP_HOST'];
 
         //print_r($data->mobile_number);exit; 
         //$project_folder = 'PMC_MeatRegistration';
         
        //  $msg = "Your application no:- $app_no for $scheme is Approved Successfully.";
 
        //  $tempID= '1207167447455213113';
        //  $this->sendsms($msg,$data->mobile_number,$tempID);
 
         return redirect('/cold_storage_lists/1')->with('message', 'Cold Storage Registration Form Approved By HOD Successfully'); //Redirect user somewhere
   
     }
 
     public function RejectColdStorageRegistration(request $request, $id){
         
         $update = [
             'hod_status' => 2,
             'reject_resion' => $request->get('reject_resion'),
             'reject_date' => date("Y-m-d H:i:s"),
             'reject_by' => Auth::user()->id,
         ];
         
         ColdStorageRegistration_Model::where('id', $id)->update($update);
         
         
        //  $app_no = $request->get('meat_pplication_no');
        //  $resion = $request->get('reject_resion');
        //  $mobile = $request->get('mobile_number');
        //  //$domain = "https://".$_SERVER['HTTP_HOST'];
         
        //  $msg = "Your application no:- $app_no is Rejected Resion For  $resion .";
 
        //  $tempID= '1207167447455213113';
        //  $this->sendsms($msg,$mobile,$tempID);
 
 
         return redirect('/cold_storage_lists/2')->with('message', 'Cold Storage Registration Form HOD Rejected Successfully'); //Redirect user somewhere
     }


     public function FinalApprovedbyAdminList(request $request, $status)
     {

            $meat_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                            ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                            ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                            ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                            ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                            ->where('t1.final_approve', '=', $status) 
                                            ->where('t1.hod_status', '=', 1)         
                                            ->where('t1.status', '=', 1)
                                            ->whereNull('t1.deleted_at')
                                            ->whereNull('t2.deleted_at')
                                            ->whereNull('t3.deleted_at')
                                            ->whereNull('t4.deleted_at')
                                            ->orderBy('t1.id', 'DESC')
                                            ->get();
                                        //    ->ToSql();

        //    dd($meat_registration_list); die;
           
         return view('hod.admin_approve_list.grid', compact('meat_registration_list', 'status'));
     }

     public function FinalApproveView(request $request, $id, $status)
     {

         $meat_registration_view =  DB::table('coldstorage_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.final_approve', '=', $status)
                                        ->where('t1.id', '=', $id)
                                        ->where('t1.status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
        // return $meat_registration_view;
        
        return view('hod.admin_approve_list.view', compact('meat_registration_view'));
     }
 
    
     public function ApprovebyHodRegistration(request $request, $id)
     {
 
         $data = new ApproveAdmin_Model();
  
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
             'final_approve' => 1,
             'final_approve_date' => date("Y-m-d"),
             'final_approve_by' => Auth::user()->id,
         ];
         

         ColdStorageRegistration_Model::where('id', $id)->update($update);
 
         return redirect('/admin_approve_list/1')->with('message', 'Cold Storage Registration Form Hod Final Approved Successfully'); //Redirect user somewhere
 
         
     }
      

     public function RejectByHodRegistration(request $request, $id)
     {
 
          $update = [
             'final_approve' => 2,
             'final_reason_for_rejection'   =>$request->get('reject_resion'),
             'final_reject_dt' => date("Y-m-d"),
             'final_reject_by' => Auth::user()->id,
 
         ];
         
         //dd($update);exit;
         
         ColdStorageRegistration_Model::where('id', $id)->update($update);
 
         return redirect('/admin_approve_list/2')->with('message', 'Cold Storage Registration Form HOD Rejected Successfully'); //Redirect user somewhere
     }



     public function adminRejectedList(request $request, $status)
     {
 
          $meat_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->where('t1.status', '=', $status) 
                                        // ->where('t1.reject_by', '=', 2)
                                        ->where('t1.hod_status', '=', 1)         
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->get();
 
         return view('hod.admin_approve_list.rejected_list', compact('meat_registration_list', 'status'));
     }

     public function EnglishGenerateColdStorageRegistration(request $request, $id, $status)
     {
         
            $meat_registration_pdf =  DB::table('coldstorage_registration_tbl AS t1')
                                          ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.meat_pplication_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                   't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                   't5.date as approve_date')
                                         ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                         ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                         ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                         ->where('t1.final_approve', '=', $status)
                                         ->where('t1.status', '=', 1)
                                        //  ->where('t1.status', '=', $status)
                                         ->where('t1.id', '=', $id)
                                         ->whereNull('t1.deleted_at')
                                         ->whereNull('t2.deleted_at')
                                         ->whereNull('t3.deleted_at')
                                         ->whereNull('t4.deleted_at')
                                         ->whereNull('t5.deleted_at')
                                         ->orderBy('t1.id', 'DESC')
                                         ->first();
                                         
         $current_date = $meat_registration_pdf->inserted_dt;
         // dd($current_date);
         
         $current_m = date('m', strtotime($current_date));
         $currentMonth = Carbon::today($current_m)->format('m');
         // dd($currentMonth);
         $fiscalYear = '';
         
         $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
         
         // dd($fiscalYear);
                                         
         return view('hod.admin_approve_list.generate_english_coldstorage_registration_pdf', compact('meat_registration_pdf','fiscalYear'));
     }


     public function MarathiGenerateColdStorageRegistration(request $request, $id, $status)
     {
        // $meat_registration_pdf =  DB::table('dog_registration_tbl AS t1')
           $meat_registration_pdf =  DB::table('coldstorage_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.id as approve_id', 't5.meat_pplication_id as approve_PET_UniqueID', 't5.total_recived_tax as approve_recived_tax', 't5.receipt_no as approve_receipt_no',
                                                  't5.date_of_receipt as approve_date_of_receipt', 't5.license_number as approve_license_number', 't5.date_of_license_obtain as approve_date_of_license_obtain',
                                                  't5.date as approve_date')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                         ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        // ->where('t1.status', '=', $status)
                                        ->where('t1.final_approve', '=', $status)
                                         ->where('t1.status', '=', 1)
                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
        // return $pet_registration_pdf;
        
        $current_date = $meat_registration_pdf->inserted_dt;
        // dd($current_date);
        
        $current_m = date('m', strtotime($current_date));
        $currentMonth = Carbon::today($current_m)->format('m');
        // dd($currentMonth);
        $fiscalYear = '';
        
        $fiscalYear = $currentMonth > 3 ? Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->addYear()->toDateString() : Carbon::createFromFormat('d-m-Y', '31-03-'.date('Y'))->toDateString();
        
        // dd($fiscalYear);
                                        
        return view('hod.admin_approve_list.generate_marathi_coldstorage_registration_pdf', compact('meat_registration_pdf','fiscalYear'));
     }


     public function cold_storage_Report_List(Request $request){

        $meattype_mst = MeatType_Master::orderBy('id','desc')->pluck('meat_name', 'id')->whereNull('deleted_at');

        $meat_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                    ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                
                                    ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                    ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                    ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                    ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                    
                                    ->whereNull('t1.deleted_at')
                                    ->whereNull('t2.deleted_at')
                                    ->whereNull('t3.deleted_at')
                                    ->whereNull('t4.deleted_at')
                                    ->whereNull('t5.deleted_at')
                                    //->groupBy('t1.id')
                                    ->orderBy('t1.id', 'DESC')
                                    ->get();

        return view('hod.report.cold_storage_report', compact('meat_registration_list'));
     }

     public function cold_storage_SearchReport(request $request){

        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $status = $request->input('status');
        $adminstatus = $request->input('adminstatus');
        $finalstatus = $request->input('finalstatus');
        $meat_type = $request->input('meat_type');
        $business_type = $request->input('business_type');

        if($request->from_date && $request->to_date){
     
        $meat_search_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
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

        }

        if($request->meat_type){

            $meat_search_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        ->where('t1.meat_type', '=', $meat_type)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        // ->toSql();
                                        ->get();

                //   echo $meat_search_registration_list;
            //   dd($meat_search_registration_list);                        

        }

        if($request->business_type){

            $meat_search_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                         ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                        ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                        ->where('t1.business_type', '=', $business_type)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->whereNull('t5.deleted_at')
                                        ->orderBy('t1.inserted_dt', 'DESC')
                                        // ->toSql();
                                        ->get();

        }

        if($request->status){

            $meat_search_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                            ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                            ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                            ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                            ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                            ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                            // ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                            // ->whereDate('t1.inserted_dt', '<=', $to_date)  
                                            // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                            // ->where('t1.status', '=', $status )
                                            ->Where('t1.hod_status', '=', $status )
                                            ->whereNull('t1.deleted_at')
                                            ->whereNull('t2.deleted_at')
                                            ->whereNull('t3.deleted_at')
                                            ->whereNull('t4.deleted_at')
                                            ->whereNull('t5.deleted_at')
                                            ->orderBy('t1.inserted_dt', 'DESC')
                                            ->get();
        }

        if($request->adminstatus){

            $meat_search_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                            ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                            ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                            ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                            ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                            ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                            // ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                            // ->whereDate('t1.inserted_dt', '<=', $to_date)  
                                            // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                            // ->where('t1.status', '=', $status )
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

            $meat_search_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                            ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                            ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                            ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                            ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                            ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                            // ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                            // ->whereDate('t1.inserted_dt', '<=', $to_date)  
                                            // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                            // ->where('t1.status', '=', $status )
                                            ->Where('t1.final_approve', '=', $finalstatus )
                                            ->whereNull('t1.deleted_at')
                                            ->whereNull('t2.deleted_at')
                                            ->whereNull('t3.deleted_at')
                                            ->whereNull('t4.deleted_at')
                                            ->whereNull('t5.deleted_at')
                                            ->orderBy('t1.inserted_dt', 'DESC')
                                            ->get();
        }
        if($request->status && $request->from_date && $request->to_date && $request->adminstatus && $request->finalstatus){

            $meat_search_registration_list =  DB::table('coldstorage_registration_tbl AS t1')
                                                ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name','t5.total_recived_tax','t5.license_number','t5.receipt_no','t5.date_of_receipt','t5.date_of_license_obtain','t5.inserted_dt as insert_date')
                                                ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                                ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                                ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')
                                                ->leftJoin('approve_by_admin_tbl AS t5', 't5.meat_pplication_id', '=', 't1.id')
                                                ->whereDate('t1.inserted_dt', '>=', $from_date)                                 
                                                ->whereDate('t1.inserted_dt', '<=', $to_date)  
                                                // ->whereBetween('t1.inserted_dt', [$from_date,$to_date] )
                                                // ->where('t1.status', '=', $status )
                                                ->Where('t1.hod_status', '=', $status )
                                                ->Where('t1.status', '=', $adminstatus )
                                                ->Where('t1.final_approve', '=', $finalstatus )
                                                ->whereNull('t1.deleted_at')
                                                ->whereNull('t2.deleted_at')
                                                ->whereNull('t3.deleted_at')
                                                ->whereNull('t4.deleted_at')
                                                ->whereNull('t5.deleted_at')
                                                ->orderBy('t1.inserted_dt', 'DESC')
                                                ->get();
        }

        return view('hod.report.cold_storage_report',  compact('meat_search_registration_list'));                                

     }

     public function report_view(request $request, $id){

        $meat_registration_view =  DB::table('coldstorage_registration_tbl AS t1')
                                        ->select('t1.*', 't2.dist_name','t3.taluka_name', 't4.meat_name')
                                        ->leftJoin('mst_dist AS t2', 't2.id', '=', 't1.district_id')
                                        ->leftJoin('mst_taluka AS t3', 't3.id', '=', 't1.taluka_id')
                                        ->leftJoin('meat_type_mst AS t4', 't4.id', '=', 't1.meat_type')

                                        ->where('t1.id', '=', $id)
                                        ->whereNull('t1.deleted_at')
                                        ->whereNull('t2.deleted_at')
                                        ->whereNull('t3.deleted_at')
                                        ->whereNull('t4.deleted_at')
                                        ->orderBy('t1.id', 'DESC')
                                        ->first();
                                        
        // return $meat_registration_view;
        
        return view('hod.report.report_view', compact('meat_registration_view'));
     }
}
