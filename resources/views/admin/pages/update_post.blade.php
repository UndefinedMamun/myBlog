<?php
$all_post = DB::table('tbl_post')->get();
$user_info = DB::table('users')->get();
$mc_info = DB::table('tbl_main_category')->get();
$sc_info = DB::table('tbl_sub_category')->get();
?>


@foreach($all_post as $s_post)  
<tr class="even gradeA">
    <td>{{$s_post->post_title}}</td>
    <td>
        <?php
        foreach ($user_info as $s_user) {
            if ($s_user->id == $s_post->user_id) {
                echo $s_user->name;
            }
        }
        ?>
    </td>
    <td>
        <?php
        foreach ($mc_info as $s_mc) {
            if ($s_mc->id == $s_post->mc_id) {
                echo $s_mc->category_name;
            }
        }
        ?>
    </td>
    <td>
        <?php
        foreach ($sc_info as $s_sc) {
            if ($s_sc->id == $s_post->sc_id) {
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
</tr>
@endforeach

