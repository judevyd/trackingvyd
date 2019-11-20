<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Distributors;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role==9){
            $salesOfficerName = Auth::user()->first_name.' '.Auth::user()->last_name;
            $result = Distributors::where('created_by',$salesOfficerName)
            ->orderBy('id','desc')->get()->all();
        }else{
            $result = Distributors::orderBy('id','desc')->get()->all();
        }
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $result = Distributors::create($request->all());
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
        $result = Distributors::where('id', $request->id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Distributors::where('id',$id)->delete();
        return 'Deleted';
    }

    public function generateCode(){
        function randomGen($min, $max) {
            $numbers = range($min, $max);
            shuffle($numbers);
            return array_slice($numbers,0,1)[0];
        }
            $randomCode = (randomGen(100000,999999));
            $checkexists = Distributors::where('distributor_code',$randomCode)->first();
            if($checkexists){
                $randomCode = (randomGen(100000,999999));
            }
        return  $randomCode;
    }
}
