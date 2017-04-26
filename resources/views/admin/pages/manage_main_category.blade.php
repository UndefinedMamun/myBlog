@extends('admin.dashboard')
@section('main_content')
@php
$main_category_info = DB::table('tbl_main_category')
        ->get();
@endphp
<div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/dashboard')}}" title="Go to dashboard" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <!--      <a href="#" class="tip-bottom">Form elements</a>-->
        <a href="{{url('/manage-main-category')}}" class="current">Manage Main Category</a>
    </div>
    <h1>Manage Main Category</h1>
</div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Main Categories</h5> <h5 id="action" style="color: green; float:right; margin-right: 200px;"></h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Publication Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="t_body">
                @foreach($main_category_info as $s_main_category)  
                <tr class="even gradeA">
                    <td>{{$s_main_category->id}}</td>
                    <td>{{$s_main_category->category_name}}</td>
                    <td>{{$s_main_category->category_description}}</td>
                    <td id="ps{{$s_main_category->id}}">
                        @php
                        $ps =  $s_main_category->publication_status;
                        @endphp
                        @if($ps == 1)
                        <button onclick="change_ps({{$s_main_category->id}},<?php echo $ps; ?>)" class="btn btn-primary">Published</button>
                        @else
                        <button onclick="change_ps({{$s_main_category->id}},<?php echo $ps; ?>)" class="btn btn-danger">Unpublished</button>
                        @endif
                    </td>

                    <td>
                        <button type="button"  data-something="{{$s_main_category->id}}" class="btn n btn-info">Edit</button>
                        <button onclick="delete_mc({{$s_main_category->id}})" class="btn btn-danger">Delete</button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div id="modal_fields" class="modal-content">


                </div>
            </div>
        </div>


    </div>
</div>
<script>
    $('.n').click(function(){
       var id = $(this).attr('data-something');
       $('#exampleModal').modal('show');
       $.get('/edit-main-category/'+id,function(data){
            $('#modal_fields').html(data);
       });
    });
    
 
        
    

   
    function change_ps(id, ps){
    $.ajax({
    type: 'GET',
            url: 'change-mc-ps/' + id + '_' + ps,
            success: function(data){
            console.log(data);
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
    function delete_mc(id){
    if(!confirm('Are You Sure..??')){
        return;
    }
    $.ajax({
    type: 'GET',
            url: 'delete-mc/' + id,
            success: function(data){
            $('#t_body').html(data);
            $('#action').html('Successfully Deleted...!!');
            }
    });
    }


</script>

@endsection