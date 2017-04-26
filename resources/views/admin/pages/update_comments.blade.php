@php
$all_comment = DB::table('tbl_comment')->get();
@endphp
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