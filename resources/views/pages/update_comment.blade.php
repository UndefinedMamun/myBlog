<?php

$all_comments = DB::table('tbl_comment')->where('post_id',$post_id)->get();
                                $total = count((array)$all_comments);
                            ?>
<h1>comments [{{$total}}]</h1>
@foreach($all_comments as $s_comment)
<div class="comments-row-1">
    <div class="comments-avatar">
        <img src="http://placehold.it/70x70" alt="//" />
    </div> 
    <div class="right-box">
        <div>
            <a href="{{url('/user/'.$s_comment->user_name)}}"><span class="user-name-comm">{{$s_comment->user_name}}</span></a>
        </div>
        <div>
            <span>{{$s_comment->comment}}</span>	  
        </div>
        <div  class="date-time-comm">
            <span>{{$s_comment->created_at}}</span>
        </div>
    </div>	
    <div class="comm-left-bar"></div>								  
</div>
@endforeach