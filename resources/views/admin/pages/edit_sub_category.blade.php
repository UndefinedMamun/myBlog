<?php
    $main_category_info = DB::table('tbl_main_category')
                            ->where('publication_status',1)
                            ->select('id', 'category_name')
                            ->get();
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="exampleModalLabel">Edit Sub Category - <?php echo $category_details->category_name; ?></h4>
</div>
<div class="modal-body">
    <form id="sub-category-update-form" action="{{url('/update-sub-category')}}" method="POST" class="form-horizontal">
        <div class="form-group">
            <label  class="control-label"> Parent Category :</label>
            <div class="controls">
                <select id="main_category_id" onchange="myFunction();" name="main_category_id">
                    <option value="0">Select</option>
                    @foreach($main_category_info as $s_main_category)
                    <option value="{{$s_main_category->id}}">{{$s_main_category->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="category_name" class="control-label">Sub Category Name :</label>
            <div class="controls">
                <input id="category_name" type="text" class="form-control" value="{{$category_details->category_name}}" name="category_name" placeholder="Category Name" />
                <input type="hidden" value="{{$category_details->id}}" name="id" />
            </div>
        </div>
        {{csrf_field()}}

        <div class="form-group">
            <label for="category_description" class="control-label">Category Description :</label>
            <div class="controls">
                <textarea id="category_description" class="form-control" name="category_description" ><?php echo $category_details->category_description; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label  class="control-label">Publication Status</label>
            <div class="controls">
                <select id="aj_publication_status" name="publication_status">
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success">Update Category</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
    </form>
</div>
<script>
    document.getElementById('aj_publication_status').value = {{$category_details->publication_status}};
    document.getElementById('main_category_id').value = {{$category_details->main_category_id}};
    $('#sub-category-update-form').submit(function(e){
             e.preventDefault();
             var form = document.getElementById("sub-category-update-form");
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
                    $('#t_body').html(data);
                    $('#action').html('Succesfully Updated..!!');
                    $('#exampleModal').modal('toggle');
                }
            })
        });
</script>