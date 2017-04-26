@extends('admin.dashboard')
@section('main_content')

<div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/dashboard')}}" title="Go to dashboard" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <!--      <a href="#" class="tip-bottom">Form elements</a>-->
        <a href="{{url('/manage-post')}}" class="current">Manage Comments</a>
    </div>
    <h1>Manage All Comment</h1>
</div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>All Comment</h5> <h5 id="action" style="color: green; float:right; margin-right: 200px;"></h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Post Name</th>
                    <th>Author Name</th>
                    <th>Comment</th>
                    <th>Publication Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="t_body">
                @foreach($all_comment as $s_comment)  
                <tr class="even gradeA">
                    <td>{{$s_comment->post_id}}</td>
                    <td>{{$s_comment->user_name}}</td>
                    <td>{{$s_comment->comment}}</td>
                    <td></td>
                    <td>
                        <button onclick="delete_comment({{$s_comment->id}})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    
    function delete_comment(id){
    if(!confirm('Are You Sure..??')){
        return;
    }
    $.ajax({
    type: 'GET',
            url: 'delete-comment/' + id,
            success: function(data){
            $('#t_body').html(data);
            $('#action').html('Successfully Deleted...!!');
            }
    });
    }


</script>

@endsection