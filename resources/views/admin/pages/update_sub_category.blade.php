<?php
        $main_category_info = DB::table('tbl_main_category')
                            ->select('id', 'category_name', 'publication_status')->get();
        $sub_category_info = DB::table('tbl_sub_category')
                            ->get();
?>
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
        <button type="button" onclick="modal_t();" data-something="{{$s_sub_category->id}}" class="btn n btn-info">Edit</button>
        <button onclick="delete_sc({{$s_sub_category->id}})" class="btn btn-danger">Delete</button>

    </td>
</tr>
@endforeach