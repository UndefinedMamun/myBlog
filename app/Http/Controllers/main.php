<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class main extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = view('pages.slider');
        $homepage_content = view('pages.homepage_content');
        return view('master')
                ->with('slider_content',$slider)
                ->with('main_content',$homepage_content);
    }
    public function single_post($title)
    {
        $post_info = DB::table('tbl_post')
                ->where('post_title',$title)
                ->first();
        $single_post = view('pages.single_post')
                ->with('post_info', $post_info);
        return view('master')
                ->with('main_content',$single_post);
    }
    public function auth_check(){
        
        if(Auth::user()){
            $add_post = view('pages.add_post');
            return view('master')
                    ->with('main_content',$add_post);
        }
        else{
            return Redirect::to('/');
        }
    }

    public function add_post()
    {
        if(Auth::user()){
            $add_post = view('pages.add_post');
            return view('master')
                    ->with('main_content',$add_post);
        }
        else{
            return Redirect::to('/');
        }
    }
    public function get_sub_categories($id){
        $sub_category_info = DB::table('tbl_sub_category')
                ->where('main_category_id',$id)
                ->get();
        return $sub_category_info;
    }
    public function edit_post($title){
        if(Auth::user()){
            $post_info = DB::table('tbl_post')
                    ->where('post_title',$title)
                    ->first();
            $edit_post = view('pages.edit_post')
                    ->with('post_info',$post_info);
            return view('master')
                    ->with('main_content',$edit_post);
        }
        else{
            return Redirect::to('/');
        }
        
    }
    public function update_post(Request $req){
        $post = array();
        $post['post_title'] = $req->post_title;
        $post['post_details'] = $req->post_details;
        $post['mc_id'] = $req->mc_id;
        $post['sc_id'] = $req->sc_id;
        date_default_timezone_set('Asia/Dhaka');
        $post['updated_at'] = date('Y-m-d h-i-s');
        $post_id = $req->post_id;
        $image = $req->file(['post_image']);
        if($image){
            $image_name = str_random(20);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'public/post_images/';
            $image_url = $upload_path.$image_full_name;
            
            $moved = $image->move($upload_path, $image_full_name);
            if($moved){
                $post['post_image'] = $image_url;
                DB::table('tbl_post')->where('id',$post_id)
                        ->update($post);
                $old_image_path = $req->old_image_path;
                unlink($old_image_path);
                return Redirect::to('/single-post/'.$post['post_title']);
            }
            else{
                Session::put('message','Eror in image Uploading');
                return Redirect::to('/edit-post/'.$post['post_title']);
            }
        }
        else{
            DB::table('tbl_post')->where('id',$post_id)
                    ->update($post);
            return Redirect::to('/single-post/'.$post['post_title']);
        }
    }
    
    public function save_new_post(Request $req){
        $post = array();
        $post['post_title'] = $req->post_title;
        $post['user_id'] = $req->user_id;
        $post['publication_status']=0;
        $post['post_details'] = $req->post_details;
        $post['mc_id'] = $req->mc_id;
        $post['sc_id'] = $req->sc_id;
        date_default_timezone_set('Asia/Dhaka');
        $post['created_at'] = date('Y-m-d h-i-s');
        
        $image = $req->file(['post_image']);
        if($image){
            $image_name = str_random(20);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'public/post_images/';
            $image_url = $upload_path.$image_full_name;
            $moved = $image->move($upload_path, $image_full_name);
            if($moved){
                $post['post_image'] = $image_url;
                DB::table('tbl_post')
                        ->insert($post);
                return Redirect::to('/single-post/'.$post['post_title']);
            }
            else{
                Session::put('message','Eror in image Uploading');
                return Redirect::to('/add-post');
            }
        }
        else{
            DB::table('tbl_post')
                    ->insert($post);
            return Redirect::to('/single-post/'.$post['post_title']);
        }
    }
    
    public function check_post_title($title){
        $post = DB::table('tbl_post')
                ->get();
        foreach($post as $p){
            if($p->post_title == $title)
                return 1;
        }
        return 0;
    }
    
    public function add_comment(Request $req){
        $data = array();
        $data['post_id']=$req->post_id;
        $data['user_name']=$req->user_name;
        $data['comment']=$req->comment;
        date_default_timezone_set('Asia/Dhaka');
        $data['created_at'] = date('Y-m-d h-i-s');
        DB::table('tbl_comment')->insert($data);
        $updated_comments = view('pages.update_comment')->with('post_id',$data['post_id']);
        return $updated_comments;
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
