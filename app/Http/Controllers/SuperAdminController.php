<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function authed() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            Redirect::to('/admin')->send();
        }
    }
    public function dashboard(){
        $this->authed();
        $dashboard_content = view('admin.pages.dashboard_content');
        return view('admin.dashboard')
            ->with('main_content',$dashboard_content);
    }
    public function logout() {
        Session::put('admin_id', '');
        Session::put('admin_name', '');
        Session::put('message', 'You Are Successfully Loged Out');
        return Redirect::to('/admin');
    }
    public function add_main_category(){
        $this->authed();
        $add_main_category = view('admin.pages.add_main_category');
        return view('admin.dashboard')
            ->with('main_content',$add_main_category);
    }
    
    public function save_main_category(Request $request){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        date_default_timezone_set('Asia/Dhaka');
        $data['created_at'] = date('Y-m-d h:i:s');
        DB::table('tbl_main_category')->insert($data);
        return 'Category Saved';
    }
    public function save_sub_category(Request $request){
        $data = array();
        $data['main_category_id'] = $request->main_category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        date_default_timezone_set('Asia/Dhaka');
        $data['created_at'] = date('Y-m-d h:i:s');
        DB::table('tbl_sub_category')->insert($data);
        return 'Category Saved';
    }
    public function update_main_category(Request $request){
        $data = array();
        $id = $request->id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        date_default_timezone_set('Asia/Dhaka');
        $data['updated_at'] = date('Y-m-d h:i:s');
        DB::table('tbl_main_category')
                ->where('id',$id)
                ->update($data);
        $updated_main_category = view('admin.pages.update_main_category');
        return $updated_main_category;
    }
    public function update_sub_category(Request $request){
        $data = array();
        $id = $request->id;
        $data['main_category_id'] = $request->main_category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        date_default_timezone_set('Asia/Dhaka');
        $data['updated_at'] = date('Y-m-d h:i:s');
        DB::table('tbl_sub_category')
                ->where('id',$id)
                ->update($data);
        $updated_sub_category = view('admin.pages.update_sub_category');
        return $updated_sub_category;
    }
    public function change_mc_ps($id_ps){
        $arr = explode('_', $id_ps);
        $id = $arr[0];
        $ps = $arr[1];        
        if($ps == 1){
            DB::table('tbl_main_category')
                ->where('id',$id)
                ->update(['publication_status'=>0]);
            return 'Main Category Unpublished';
        }
        else{
            DB::table('tbl_main_category')
                ->where('id',$id)
                ->update(['publication_status'=>1]);
            return 'Main Category Published';
        }
        
    }
    public function change_sc_ps($id_ps){
        $arr = explode('_', $id_ps);
        $id = $arr[0];
        $ps = $arr[1];        
        if($ps == 1){
            DB::table('tbl_sub_category')
                ->where('id',$id)
                ->update(['publication_status'=>0]);
            return 'Sub Category Unpublished';
        }
        else{
            DB::table('tbl_sub_category')
                ->where('id',$id)
                ->update(['publication_status'=>1]);
            return 'Sub Category Published';
        }
        
    }
    public function change_post_ps($id_ps){
        $arr = explode('_', $id_ps);
        $id = $arr[0];
        $ps = $arr[1];        
        if($ps == 1){
            DB::table('tbl_post')
                ->where('id',$id)
                ->update(['publication_status'=>0]);
            return 'Post Unpublished';
        }
        else{
            DB::table('tbl_post')
                ->where('id',$id)
                ->update(['publication_status'=>1]);
            return 'Post Published';
        }
        
    }
    public function change_post_if($id_ps){
        $arr = explode('_', $id_ps);
        $id = $arr[0];
        $ps = $arr[1];        
        if($ps == 1){
            DB::table('tbl_post')
                ->where('id',$id)
                ->update(['is_featured'=>0]);
            return 'Post is not Featured Now';
        }
        else{
            DB::table('tbl_post')
                ->where('id',$id)
                ->update(['is_featured'=>1]);
            return 'Post is Featured Now';
        }
        
    }
    public function manage_post()
    {
        $this->authed();
        $all_post = DB::table('tbl_post')
                ->get();
        $manage_post = view('admin.pages.manage_post')->with('all_post',$all_post);
        return view('admin.dashboard')
            ->with('main_content',$manage_post);
    }
    public function manage_comments()
    {
        $this->authed();
        $all_comment = DB::table('tbl_comment')
                ->get();
        $manage_comment = view('admin.pages.manage_comment')->with('all_comment',$all_comment);
        return view('admin.dashboard')
            ->with('main_content',$manage_comment);
    }
    
    
    public function manage_main_category(){
        $this->authed();
        $manage_main_category = view('admin.pages.manage_main_category');
        return view('admin.dashboard')
            ->with('main_content',$manage_main_category);
    }
    
    public function add_sub_category(){
        $add_sub_category = view('admin.pages.add_sub_category');
        return view('admin.dashboard')
            ->with('main_content',$add_sub_category);
    }
    public function manage_sub_category(){
        $main_categories_info = DB::table('tbl_main_category')
                            ->select('id', 'category_name', 'publication_status')->get();
        $sub_categories_info = DB::table('tbl_sub_category')
                            ->get();
        $manage_sub_category = view('admin.pages.manage_sub_category')
                ->with('main_category_info',$main_categories_info)
                ->with('sub_category_info',$sub_categories_info);
                
        return view('admin.dashboard')
            ->with('main_content',$manage_sub_category);
    }
    public function edit_main_category($id){
        $category_info_by_id = DB::table('tbl_main_category')
                ->where('id',$id)
                ->first();
        $load_page = view('admin.pages.edit_main_category')
            ->with('category_details',$category_info_by_id);
        return $load_page;
    }
    public function edit_sub_category($id){
        $sub_category_info = DB::table('tbl_sub_category')
                ->where('id',$id)           
                ->first();
        $load_page = view('admin.pages.edit_sub_category')->with('category_details',$sub_category_info);
        return $load_page;
    }
    
    public function delete_mc($id){
        DB::table('tbl_main_category')
                ->where('id',$id)
                ->delete();
        $load_page = view('admin.pages.update_main_category');
        return $load_page;
    }
    public function delete_comment($id){
        DB::table('tbl_comment')
                ->where('id',$id)
                ->delete();
        $load_page = view('admin.pages.update_comments');
        return $load_page;
    }
    public function delete_sc($id){
        DB::table('tbl_sub_category')
                ->where('id',$id)
                ->delete();
        $load_page = view('admin.pages.update_sub_category');
        return $load_page;
    }
    public function delete_post($id){
        $post_info = DB::table('tbl_post')
                ->where('id',$id)
                ->first();
        $post_image_path = $post_info->post_image;
        DB::table('tbl_post')
                ->where('id',$id)
                ->delete();
        if($post_image_path != NULL){
            unlink($post_image_path);
        }
        $load_page = view('admin.pages.update_post');
        return $load_page;
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
