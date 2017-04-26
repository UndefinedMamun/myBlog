@extends('admin.dashboard')
@section('main_content')
<?php
$user_info = DB::table('users')->get();
$mc_info = DB::table('tbl_main_category')->get();
$sc_info = DB::table('tbl_sub_category')->get();
?>

<div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/dashboard')}}" title="Go to dashboard" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <!--      <a href="#" class="tip-bottom">Form elements</a>-->
        <a href="{{url('/manage-post')}}" class="current">Manage Post</a>
    </div>
    <h1>Manage All Post</h1>
</div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>All Post</h5> <h5 id="action" style="color: green; float:right; margin-right: 200px;"></h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author Name</th>
                    <th>Main Category</th>
                    <th>Sub Category</th>
                    <th>Publication Status</th>
                    <th>Actions</th>
                    <th>Featured</th>
                </tr>
            </thead>
            <tbody id="t_body">
                @foreach($all_post as $s_post)  
                <tr class="even gradeA">
                    <td><a target="blank" href="{{url('single-post/'.$s_post->post_title)}}">{{$s_post->post_title}}</a></td>
                    <td>
                        <?php
                        foreach ($user_info as $s_user){
                            if($s_user->id == $s_post->user_id){
                                echo $s_user->nick_name;
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        foreach ($mc_info as $s_mc){
                            if($s_mc->id == $s_post->mc_id){
                                echo $s_mc->category_name;
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        foreach ($sc_info as $s_sc){
                            if($s_sc->id == $s_post->sc_id){
                                echo $s_sc->category_name;
                            }
                        }
                        ?>
                    </td>
                    <td id="ps{{$s_post->id}}">
                        @php

                        $ps =  $s_post->publication_status;
                        @endphp
                        @if($ps == 1)
                        <button onclick="change_ps({{$s_post->id}},<?php echo $ps; ?>)" class="btn btn-primary">Published</button>
                        @else
                        <button onclick="change_ps({{$s_post->id}},<?php echo $ps; ?>)" class="btn btn-danger">Unpublished</button>
                        @endif
                    </td>

                    <td>
                        <a href="{{url('/edit-post/'.$s_post->post_title)}}" target="blank"  class="btn n btn-info">Edit</a>
                        <button onclick="delete_post({{$s_post->id}})" class="btn btn-danger">Delete</button>

                    </td>
                    <td id="if{{$s_post->id}}">
                        @php
                        $if =  $s_post->is_featured;
                        @endphp
                        @if($if == 1)
                        <button onclick="change_if({{$s_post->id}},<?php echo $if; ?>)" class="btn btn-primary">Yes</button>
                        @else
                        <button onclick="change_if({{$s_post->id}},<?php echo $if; ?>)" class="btn btn-danger">No</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    
    
    function change_if(id, ps){
    $.ajax({
    type: 'GET',
            url: 'change-post-if/' + id + '_' + ps,
            success: function(data){
            $('#action').html(data);
            }
    });
    var target_id = 'if' + id;
    if (ps == 1){
    $('#' + target_id).html('<button onclick="change_if(' + id + ',0)" class="btn btn-danger">No</button>');
    }
    else{
    $('#' + target_id).html('<button onclick="change_if(' + id + ',1)" class="btn btn-primary">Yes</button>');
    }
    }
    function change_ps(id, ps){
    $.ajax({
    type: 'GET',
            url: 'change-post-ps/' + id + '_' + ps,
            success: function(data){
            $('#action').html(data);
            }
    });
    var target_id = 'ps' + id;
    if (ps == 1){
    $('#' + target_id).html('<button onclick="change_ps(' + id + ',0)" class="btn btn-danger">Unpublished</button>');
    }
    else{
    $('#' + target_id).html('<button onclick="change_ps(' + id + ',1)" class="btn btn-primary">Published</button>');
    }
    }
    function delete_post(id){
    if(!confirm('Are You Sure..??')){
        return;
    }
    $.ajax({
    type: 'GET',
            url: 'delete-post/' + id,
            success: function(data){
            $('#t_body').html(data);
            $('#action').html('Successfully Deleted...!!');
            }
    });
    }


</script>

@endsection