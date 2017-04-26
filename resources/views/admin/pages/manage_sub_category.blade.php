@extends('admin.dashboard')
@section('main_content')


<div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/dashboard')}}" title="Go to dashboard" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <!--      <a href="#" class="tip-bottom">Form elements</a>-->
        <a href="{{url('/manage-sub-category')}}" class="current">Manage Sub Category</a>
    </div>
    <h1>Manage Sub Category</h1>
</div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Sub Categories</h5> <h5 id="action" style="color: green; float:right; margin-right: 200px;"></h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Parent</th>
                    <th>Sub Category</th>
                    <th>Description</th>
                    <th>Publication Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="t_body">
                @foreach($sub_category_info as $s_sub_category)  
                <tr class="even gradeA">
                    <td>
                        @foreach($main_category_info as $s_main_category)
                        @if($s_main_category->id == $s_sub_category->main_category_id)
                        {{$s_main_category->category_name}}
                        @endif
                        @endforeach
                    </td>
                    <td>{{$s_sub_category->category_name}}</td>
                    <td>{{$s_sub_category->category_description}}</td>
                    <td id="ps{{$s_sub_category->id}}">
                        @php

                        $ps =  $s_sub_category->publication_status;
                        @endphp
                        @if($ps == 1)
                        <button onclick="change_ps({{$s_sub_category->id}},<?php echo $ps; ?>)" class="btn btn-primary">Published</button>
                        @else
                        <button onclick="change_ps({{$s_sub_category->id}},<?php echo $ps; ?>)" class="btn btn-danger">Unpublished</button>
                        @endif
                    </td>

                    <td>
                        <button type="button"  data-something="{{$s_sub_category->id}}" class="btn n btn-info">Edit</button>
                        <button onclick="delete_sc({{$s_sub_category->id}})" class="btn btn-danger">Delete</button>

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
       $.get('/edit-sub-category/'+id,function(data){
            $('#modal_fields').html(data);
       });
    });
    
    function change_ps(id, ps){
    $.ajax({
    type: 'GET',
            url: 'change-sc-ps/' + id + '_' + ps,
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
    function delete_sc(id){
    if(!confirm('Are You Sure..??')){
        return;
    }
    $.ajax({
    type: 'GET',
            url: 'delete-sc/' + id,
            success: function(data){
            $('#t_body').html(data);
            $('#action').html('Successfully Deleted...!!');
            }
    });
    }


</script>

@endsection