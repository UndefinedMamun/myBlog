@extends('admin.dashboard')
@section('main_content')

<?php
    $main_category_info = DB::table('tbl_main_category')
            ->where('publication_status',1)
            ->get();
?>
<div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/dashboard')}}" title="Go to dashboard" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <!--      <a href="#" class="tip-bottom">Form elements</a>-->
        <a href="{{url('/add-sub-category')}}" class="current">Add Sub Category</a>
    </div>
    <h1>Add Sub Category</h1>
</div>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Category-info</h5> <h5 id="action" style="color: green; float:right; margin-right: 200px;"></h5>
    </div>
    <div class="widget-content nopadding">
        <form id="sub-category-form" action="{{url('/save-sub-category')}}" method="POST" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Main Category</label>
                <div class="controls">
                    <select id="main_category_id" onchange="myFunction();" name="main_category_id">
                        <option value="0">Select</option>
                        @foreach($main_category_info as $s_main_category)
                            <option value="{{$s_main_category->id}}">{{$s_main_category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label for="category_name" class="control-label">Sub Category Name :</label>
                <div class="controls">
                    <input id="category_name" type="text" class="span6" name="category_name" placeholder="Sub Category Name" />
                </div>
            </div>
            {{ csrf_field() }}

            <div class="control-group">
                <label for="category_description" class="control-label">Description :</label>
                <div class="controls">
                    <textarea id="category_description" class="span6" rows="6" name="category_description" ></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Publication Status</label>
                <div class="controls">
                    <select name="publication_status">
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button disabled id="submit-btn" type="submit" class="btn btn-success">Add Category</button>
                
                <button class="btn btn-info">Reset</button>
            </div>
        </form>
    </div>
</div>
<script>
    function myFunction(){
        var main_category_id = document.getElementById("main_category_id").value;
        if( main_category_id > 0 ){
           $('#submit-btn').prop("disabled", false);
        }
        else{
            $('#submit-btn').prop("disabled", true)
        }
    }
    
    $(document).ready(function(){
        $('#sub-category-form').submit(function(e){
             e.preventDefault();
             var form = document.getElementById("sub-category-form");
             var method = form.getAttribute("method");
             var url = form.getAttribute("action");
             var form_data = new FormData(form);
             var form_data_obj = {};
             for([key, values] of form_data.entries())
             {
               console.log(key+' : '+values);
               form_data_obj[key] = values;
             }
             $.ajax({
                type: method,
                url: url,
                data: form_data_obj,
                success: function(data){
                    console.log(data);
                    $('#action').html(data);
                }
            })
        })
    });
</script>

@endsection