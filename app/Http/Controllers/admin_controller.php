<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class admin_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authed(){
        $admin_id = Session::get('admin_id');
//        echo $admin_id;
//        exit();
        if($admin_id != NULL){
            Redirect::to('/dashboard')->send();
        }
    }
    public function log_in()
    {
        $this->authed();
        return view('admin.admin_login');
    }
    
    public function auth_check(Request $request){
        $email_address = $request->email_address;
        $password = md5($request->password);
        
        $ok = DB::table('tbl_admin')
                ->where('admin_email_address',$email_address)
                ->where('admin_password', $password)
                ->first();
        
        if($ok){
            
            Session::put('admin_id',$ok->admin_id);
            Session::put('admin_name',$ok->admin_name);
            return Redirect::to('/dashboard' );
        }
        else{
            Session::put('exception','Your User Id or Password is wrong !!');
            return Redirect::to('/admin');
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
