@php
$main_category_info = DB::table('tbl_main_category')
        ->get();
@endphp
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