<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\joforder;
use App\numberseries;
use PDF;
use Carbon\Carbon;

use App\Events\MyEvents;


class JOFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        switch($id){
            case 1:
                $status = "Registration Section";
               break;
            case 2:
                // $status = "Mold Section";
                $status = "Division I";
                break; 
            case 3:
                // $status = "Plastic Section";
                $status = "Division II";
                break; 
            case 4:
                $status = "Wax Section";
                break; 
            case 5:
                $status = "Casting Section";
                break; 
            case 6:
                $status = "Salugar Section";
                break; 
            case 7:
                $status = "Stone Section";
                break; 
            case 8:
                $status = "Finishing Section";
                break; 
            case 10:
                $status = "For Delivery";
                break; 
           }
        if(Auth::user()->role ==9){
            $salesOfficerName = Auth::user()->first_name.' '.Auth::user()->last_name;
            $result = joforder::where('jof_status',$status)
            ->where('created_by',$salesOfficerName)
            ->orderBy('id','desc')->get()->all();
        }else{
            $result = joforder::where('jof_status',$status)
            ->orderBy('id','desc')->get()->all();
        }
        return $result;
        
    }
    public function JOFstatus()
    { 
        $result = joforder::orderBy('due_date','asc')->get()->all();
        return $result;  
    }
    public function JOFPending()
    { 
        if(Auth::user()->role ==9){
            $salesOfficerName = Auth::user()->first_name.' '.Auth::user()->last_name;
            $result = joforder::where('jof_status','!=','Done')
            ->where('created_by',$salesOfficerName)
            ->orderBy('due_date','asc')->get()->all();
        }else{
            $result = joforder::where('jof_status','!=','Done')->orderBy('due_date','asc')->get()->all();
        }
        return $result;  
    }
    public function JOFDelivered()
    { 
        if(Auth::user()->role ==9){
            $salesOfficerName = Auth::user()->first_name.' '.Auth::user()->last_name;
            $result = joforder::where('jof_status','Done')
            ->where('created_by',$salesOfficerName)
            ->orderBy('due_date','asc')->get()->all();
        }else{
            $result = joforder::where('jof_status','Done')->orderBy('due_date','asc')->get()->all();
        }
        return $result;  
      
    }
    public function ExportPDF(){
        $datenow = Carbon::now('GMT+8:00')->isoFormat('YYYY-MM-DD');
        $datesevendays = Carbon::now('GMT+8:00')->addDays(7)->isoFormat('YYYY-MM-DD');
        $joforder = joforder::whereBetween('due_date',[$datenow,$datesevendays])->orderBy('due_date','asc')->get()->all();
        
        $pdf = PDF::loadView('pdf', compact('joforder'));
         return $pdf->download('JOFOrder.pdf');
        // return view('pdf',['joforder'=>$joforder,'datesevendays'=>$datesevendays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
  
        event(new MyEvents('event on update'));
        // // $result = joforder::create($request->all());
        // // return $result;
        if($request->upload_image !== null) {
            $exploded = explode(',',$request->upload_image);
            $decoded = base64_decode($exploded[1]);
            if(str_contains($exploded[0],'jpeg'))
            {
                $extension = 'jpg';
            }
            else
            {
                $extension = 'png';
            }
            //generate random strings
            $length= 10;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            // set all details
            $filename = $randomString.'.'.$extension;
            // $path = public_path().'/../public_html/img/artwork/'.$filename;
            $path = public_path().'/img/artwork/'.$filename;
            file_put_contents($path,$decoded);    
             $result = joforder::create($request->except('upload_image') + ['upload_image' => '/img/artwork/'.$filename]);            
        }
        else {
             $result = joforder::create($request->all());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $result = joforder::where('id', $request->id)->update($request->all());
        // return 'success';
        if($request->upload_image !== null) {
            if(joforder::where('upload_image', $request->upload_image)->exists())
                $result = joforder::where('id', $request->id)->update($request->except('upload_image') + ['upload_image' => $request->upload_image]);
            else {
                $exploded = explode(',',$request->upload_image);
                $decoded = base64_decode($exploded[1]);
                if(str_contains($exploded[0],'jpeg'))
                {
                    $extension = 'jpg';
                }
                else
                {
                    $extension = 'png';
                }
                //generate random strings
                $length= 10;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                // set all details
                $filename = $randomString.'.'.$extension;
                $path = public_path().'/img/artwork/'.$filename;
                file_put_contents($path,$decoded); 
                $result = joforder::where('id', $request->id)->update($request->except('upload_image') + ['upload_image' => '/img/artwork/'.$filename]);
            }
        }
        else {
            $result = joforder::where('id', $request->id)->update($request->all());
        }
        event(new MyEvents('event on update'));
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        event(new MyEvents('event on update'));
        $result = joforder::where('id',$id)->delete();
        return 'Deleted';
    }

    public function updateStatus(Request $request){
        event(new MyEvents('event on update'));
        joforder::where('id', $request->id)
            ->orderby('id', 'desc')
            ->take(1)
            ->update([
                'jof_status' =>$request->jof_status,
                'sp_approve' =>$request->sp_approve,
                'remarks' =>$request->remarks,
                'active_date' =>Carbon::now('GMT+8:00')->isoFormat('YYYY-MM-D'),
                ]);
        return 'success';
    }
    
    public function getSeries(){
        $getYear = Carbon::now('GMT+8:00')->isoFormat('YYYY');
        $getSeries = numberseries::where('year',$getYear)->get();
        $incrementno = $getSeries[0]['incrementno'] + 1;
        $checkexists = numberseries::where('incrementno',$incrementno)
        ->where('year',$getYear)->first();
        if(!$checkexists){
            $updateseries = numberseries::where('year',$getYear)->update([
                'incrementno' =>$incrementno,
                ]);;
            $result = numberseries::where('year',$getYear)->get();
        }else{
            $incrementno = $getSeries[0]['incrementno'] + 2;
            $updateseries = numberseries::where('year',$getYear)->update([
                'incrementno' =>$incrementno,
                ]);;
            $result = numberseries::where('year',$getYear)->get();
        }
      
        return $result;
    }
    
    public function sevenDueDate(){
        $datenow = Carbon::now('GMT+8:00')->isoFormat('YYYY-MM-DD');
        $datesevendays = Carbon::now('GMT+8:00')->addDays(7)->isoFormat('YYYY-MM-DD');
        $result = joforder::whereBetween('due_date',[$datenow,$datesevendays])->orderBy('due_date','asc')->get()->all();
        return $result;  
    }
    public function getTracking($id){
        $result = joforder::where('distributor_code',$id)
        ->orWhere('refno',$id)
        ->orderBy('refno','desc')->get(['refno','distributor_code','kind_of_ring','date_prepared','due_date','jof_status','trackingno']);
        return $result;  
    }
    public function addTrackingno(Request $request){
        event(new MyEvents('event on update'));
        joforder::where('id', $request->id)
            ->orderby('id', 'desc')
            ->take(1)
            ->update([
                'trackingno' =>$request->trackingno,
                'active_date' =>Carbon::now('GMT+8:00')->isoFormat('YYYY-MM-D'),
                ]);
        return 'success';
    }
}
