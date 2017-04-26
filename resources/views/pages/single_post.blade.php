@extends('master')
@section('main_content')
<?php

$url = url()->current();
$rest = substr($url, 13);
Session::put('url',$rest);

?>
<section class="container-xs"><!-- page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12"><!-- head tag -->
                <h3 style="margin-top: 20px;" class="head-text">{{$post_info->post_title}}
                <?php
                    if(Auth::user()){
                        if( Auth::id() == $post_info->user_id){
                            echo "<a style='color:#FC1A3F;' href='".url('/edit-post')."/".$post_info->post_title."'>Edit</a>";
                        }
                    }
                ?>
                </h3>
                <span class="underline big"><em> </em></span>
            </div>	      
        </div>
        <div class="row">
            <div class="col-md-9"> 
                <div class="row">
                    <div class="col-md-12"><!-- single blog page content -->
                        <div class="single-blog-top">
                            						  
                            @if($post_info->post_image)
                            <div class="blog-img-default">
                                <img src="{{asset($post_info->post_image)}}" alt="//">
                            </div>
                            @endif
                            <div style="margin-top: 30px;" class="blog-text-single">
                                
                                <p><?php echo $post_info->post_details ?></p>
                                
                                <span>{{$post_info->created_at}}</span>
                            </div>
                            							  
                            
                        </div>	  
                    </div>
                    
                    <div class="col-md-12"><!-- comment box -->
                        <div class="comments-box">
                           <div id="all_comments">
                            <?php
                                $all_comments = DB::table('tbl_comment')->where('post_id',$post_info->id)->get();
                                $total = 0;
                                foreach($all_comments as $s)
                                    $total++;
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
                            </div>
                            <div class="comments-row-3">
                                @if (Auth::guest())
                                <div style="width: 100%;" class="leave-mss">
                                    <h3>PLEASE <a href="{{url('/register')}}">REGISTER</a> or <a href="{{url('/login')}}">LOGIN</a> TO COMMENT </h3>
                                </div>
                                @else
                                <div class="leave-mss">
                                    <h3>LEAVE your comment</h3>
                                </div>
                                <form id="comment_form" role="form" action="{{url('/add-comment')}}" method="POST" >
                                    <div class="leave-mss-content">
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <label style="display: inline-block;" class="text-label">comment:</label> <h4 style="color:#8E44AD; display: inline-block; float: right;" id="success_msg"></h4>
                                                <input type="hidden" name="post_id" value="{{$post_info->id}}" />
                                                <?php
                                                    $user = Auth::user();
                                                ?>
                                                {{csrf_field()}}
                                                <input type="hidden" name="user_name" value="{{$user->nick_name}}" />
                                                <textarea id="comment_textarea" name="comment" class="form-control-mss message-m input-lg"></textarea>
                                                <button type="submit" class="btn btn-send-mss">Add Comment</button>	
                                            </div>										  
                                        </div>										 
                                    </div>								  
                                </form>	
                                @endif
                            </div>							  
                        </div>						  
                    </div>	
                    <section class="slide-show-2 same-posts"> <!-- slide show 2-->
                        <div class="col-md-12"><!-- head tag -->
                            <h3 class="head-text">related posts</h3>
                            <span class="underline big"><em> </em></span>
                        </div>					  
                        <div class="col-md-12">
                            <div class="slide-2 clearfix">			  
                                <ul class="slide-2-content"> <!-- slide show 2 content-->
                                    <li> <!-- item 2-->
                                        <div class="item-2 block-m-right effects-list">
                                            <div class="filter"></div>
                                            <div class="small-hidden head-small-tags purple-small-bg">
                                                <i class="fa fa-music fa-lg"></i>	
                                            </div>							  
                                            <div class="head-tags purple-bg">
                                                <span class="head-title">music</span>
                                            </div>	
                                            <div class="slide-2-tittles"> <!-- topic tittles-->
                                                <span class="rate">8.0</span>
                                                <a href="single-blog.html">
                                                    <h5>At vero eos et accusamus et vero eos et accu</h5>
                                                </a>
                                                <p class="title-p">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi tetur adipiscing elit, sed do eiusmod tempor incidi
                                                </p>
                                                <div class="topic-icons"> <!-- slide show 2-->
                                                    <div class="left-side">
                                                        <i class="fa fa-clock-o fa-lg"></i>
                                                        <span>dec 16, 2014</span>								  
                                                    </div>
                                                    <div class="right-side">
                                                        <a href="single-blog.html"><span>read more</span></a>
                                                        <i class="fa fa-long-arrow-right fa-lg"></i>									  
                                                    </div>
                                                </div>							  
                                            </div>						  
                                            <img src="http://placehold.it/224x325" alt="//" />
                                        </div>	
                                        <div class="item-2 block-m-right effects-list">
                                            <div class="filter"></div>
                                            <div class="small-hidden head-small-tags purple-small-bg">
                                                <i class="fa fa-music fa-lg"></i>	
                                            </div>							  
                                            <div class="head-tags purple-bg">
                                                <span class="head-title">music</span>
                                            </div>	
                                            <div class="slide-2-tittles"> <!-- topic tittles-->
                                                <span class="rate">8.0</span>
                                                <a href="single-blog.html">
                                                    <h5>At vero eos et accusamus et vero eos et accu</h5>
                                                </a>
                                                <p class="title-p">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi tetur adipiscing elit, sed do eiusmod tempor incidi
                                                </p>
                                                <div class="topic-icons"> <!-- slide show 2-->
                                                    <div class="left-side">
                                                        <i class="fa fa-clock-o fa-lg"></i>
                                                        <span>dec 16, 2014</span>								  
                                                    </div>
                                                    <div class="right-side">
                                                        <a href="single-blog.html"><span>read more</span></a>
                                                        <i class="fa fa-long-arrow-right fa-lg"></i>									  
                                                    </div>
                                                </div>							  
                                            </div>						  
                                            <img src="http://placehold.it/224x325" alt="//" />
                                        </div>	
                                        <div class="item-2 effects-list">
                                            <div class="filter"></div>
                                            <div class="small-hidden head-small-tags purple-small-bg">
                                                <i class="fa fa-music fa-lg"></i>	
                                            </div>							  
                                            <div class="head-tags purple-bg">
                                                <span class="head-title">music</span>
                                            </div>	
                                            <div class="slide-2-tittles"> <!-- topic tittles-->
                                                <span class="rate">8.0</span>
                                                <a href="single-blog.html">
                                                    <h5>At vero eos et accusamus et vero eos et accu</h5>
                                                </a>
                                                <p class="title-p">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi tetur adipiscing elit, sed do eiusmod tempor incidi
                                                </p>
                                                <div class="topic-icons"> <!-- slide show 2-->
                                                    <div class="left-side">
                                                        <i class="fa fa-clock-o fa-lg"></i>
                                                        <span>dec 16, 2014</span>								  
                                                    </div>
                                                    <div class="right-side">
                                                        <a href="single-blog.html"><span>read more</span></a>
                                                        <i class="fa fa-long-arrow-right fa-lg"></i>									  
                                                    </div>
                                                </div>							  
                                            </div>						  
                                            <img src="http://placehold.it/224x325" alt="//" />
                                        </div>					  					  
                                    </li>				  
                                </ul>
                            </div>
                        </div>
                    </section>						  
                </div>	  				  
            </div>	

            <div class="col-md-3">
                <div class="products-details"><!-- right side page -->
                    <div class="">
                        <h3 class="products-details-head">latest music</h3><!-- latest-music -->
                        <div class="clearfix"></div>
                        <div class="popular-posts-content">
                            <ul class="nav-tabs">
                                <li class="active popular">
                                    <a href="#section-1" data-toggle="tab"><span>albums</span></a>
                                </li>
                                <li class="comments">
                                    <a href="#section-2" data-toggle="tab"><span>songs</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="section-1"> <!-- tab section-1 -->
                                    <div class="latest-media"><!-- blok - 1 -->	
                                        <div class="latest-media-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>								  
                                        </div>
                                        <div class="latest-media-details">
                                            <a href="#"><span class="album-name">album name</span></a>
                                            <a href="#"><span class="album-vote">30 votes</span></a>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart fa-lg"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-heart fa-lg"></i>
                                                    </a>
                                                </li>								  
                                            </ul>
                                            <div class="vote-line"></div>											  
                                        </div>
                                    </div>	
                                    <div class="clearfix"></div>			
                                    <div class="latest-media"><!-- blok - 2 -->	
                                        <div class="latest-media-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>									  
                                        </div>
                                        <div class="latest-media-details">
                                            <a href="#"><span class="album-name">album name</span></a>
                                            <a href="#"><span class="album-vote">30 votes</span></a>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart fa-lg"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-heart fa-lg"></i>
                                                    </a>
                                                </li>								  
                                            </ul>
                                            <div class="vote-line"></div>											  
                                        </div>
                                    </div>	
                                    <div class="clearfix"></div>	
                                    <div class="latest-media"><!-- blok - 3 -->	
                                        <div class="latest-media-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>							  
                                        </div>
                                        <div class="latest-media-details">
                                            <a href="#"><span class="album-name">album name</span></a>
                                            <a href="#"><span class="album-vote">30 votes</span></a>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart fa-lg"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-heart fa-lg"></i>
                                                    </a>
                                                </li>								  
                                            </ul>
                                            <div class="vote-line"></div>											  
                                        </div>
                                    </div>	
                                    <div class="clearfix"></div>										  
                                </div>		
                                <div class="tab-pane fade" id="section-2"> <!-- tab section-2 -->
                                    <div class="latest-media"><!-- blok - 1 -->	
                                        <div class="latest-media-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>								  
                                        </div>
                                        <div class="latest-media-details">
                                            <a href="#"><span class="album-name">album name</span></a>
                                            <a href="#"><span class="album-vote">30 votes</span></a>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart fa-lg"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-heart fa-lg"></i>
                                                    </a>
                                                </li>								  
                                            </ul>
                                            <div class="vote-line"></div>											  
                                        </div>
                                    </div>	
                                    <div class="clearfix"></div>			
                                    <div class="latest-media"><!-- blok - 2 -->	
                                        <div class="latest-media-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>							  
                                        </div>
                                        <div class="latest-media-details">
                                            <a href="#"><span class="album-name">album name</span></a>
                                            <a href="#"><span class="album-vote">30 votes</span></a>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart fa-lg"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-heart fa-lg"></i>
                                                    </a>
                                                </li>								  
                                            </ul>
                                            <div class="vote-line"></div>											  
                                        </div>
                                    </div>	
                                    <div class="clearfix"></div>	
                                    <div class="latest-media"><!-- blok - 3 -->	
                                        <div class="latest-media-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>								  
                                        </div>
                                        <div class="latest-media-details">
                                            <a href="#"><span class="album-name">album name</span></a>
                                            <a href="#"><span class="album-vote">30 votes</span></a>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart fa-lg"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-heart fa-lg"></i>
                                                    </a>
                                                </li>								  
                                            </ul>
                                            <div class="vote-line"></div>											  
                                        </div>
                                    </div>	
                                    <div class="clearfix"></div>										  
                                </div>									  
                            </div>											  								  
                        </div><!-- end popular-posts-content -->
                    </div><!-- end latest-music -->		

                    <div class="popular-posts">
                        <h3 class="products-details-head">popular</h3><!-- popular posts -->
                        <div class="clearfix"></div>
                        <div class="popular-posts-content">
                            <ul class="nav-tabs">
                                <li class="active popular">
                                    <a href="#section-3" data-toggle="tab"><span>popular</span></a>
                                </li>
                                <li class="comments">
                                    <a href="#section-4" data-toggle="tab"><span>comments</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="section-3"> <!-- tab section-1 -->
                                    <div class="popular-content"> <!-- block 1 -->
                                        <div class="popular-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>					  
                                        </div>
                                        <div class="popular-details">
                                            <a href="#"><span class="proj-name">Nullam porta est </span></a>
                                            <a href="#"><span class="author-name">by mohamed allam</span></a>
                                            <a href="#"><span class="views-numbs">2014 view</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="popular-content"> <!-- block 2 -->
                                        <div class="popular-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>				  
                                        </div>
                                        <div class="popular-details">
                                            <a href="#"><span class="proj-name">Nullam porta est </span></a>
                                            <a href="#"><span class="author-name">by mohamed allam</span></a>
                                            <a href="#"><span class="views-numbs">2014 view</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="popular-content"> <!-- block 3 -->
                                        <div class="popular-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>						  
                                        </div>
                                        <div class="popular-details">
                                            <a href="#"><span class="proj-name">Nullam porta est </span></a>
                                            <a href="#"><span class="author-name">by mohamed allam</span></a>
                                            <a href="#"><span class="views-numbs">2014 view</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>									  
                                </div>		
                                <div class="tab-pane fade" id="section-4"> <!-- tab section-2 -->
                                    <div class="popular-content"> <!-- block 1 -->
                                        <div class="popular-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>					  
                                        </div>
                                        <div class="popular-details">
                                            <a href="#"><span class="proj-name">Nullam porta est </span></a>
                                            <a href="#"><span class="author-name">by mohamed allam</span></a>
                                            <a href="#"><span class="views-numbs">2014 view</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="popular-content"> <!-- block 2 -->
                                        <div class="popular-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>				  
                                        </div>
                                        <div class="popular-details">
                                            <a href="#"><span class="proj-name">Nullam porta est </span></a>
                                            <a href="#"><span class="author-name">by mohamed allam</span></a>
                                            <a href="#"><span class="views-numbs">2014 view</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="popular-content"> <!-- block 3 -->
                                        <div class="popular-img">
                                            <a href="single-blog.html">
                                                <img src="http://placehold.it/46x45" alt="//"/>
                                            </a>				  
                                        </div>
                                        <div class="popular-details">
                                            <a href="#"><span class="proj-name">Nullam porta est </span></a>
                                            <a href="#"><span class="author-name">by mohamed allam</span></a>
                                            <a href="#"><span class="views-numbs">2014 view</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>										  
                                </div>									  
                            </div>											  								  
                        </div><!-- end popular-posts-content -->
                    </div><!-- end popular posts -->	

                    <div class="categories"><!-- categories -->
                        <h3 class="products-details-head">categories</h3><!-- view -->
                        <div class="clearfix"></div>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-square fa-lg"></i></a>
                                <a href="#"><span>All</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-square fa-lg"></i></a>
                                <a href="#"><span>Computer</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-square fa-lg"></i></a>
                                <a href="#"><span>Smaret phone</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-square fa-lg"></i></a> 
                                <a href="#"><span>Tablet</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-square fa-lg"></i></a>
                                <a href="#"><span>Printer</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-square fa-lg"></i></a> 
                                <a href="#"><span>Camera</span></a>
                            </li>								  
                        </ul>
                    </div><!-- end categories -->
                </div><!-- end products details -->
            </div>
        </div>	  
    </div><!-- end container -->
</section>
<script>
    
    $(document).ready(function(){
        $('#comment_form').submit(function(e){
             e.preventDefault();
             var form = document.getElementById("comment_form");
             var method = form.getAttribute("method");
             var url = form.getAttribute("action");
             var form_data = new FormData(form);
             var form_data_obj = {};
             for([key, values] of form_data.entries())
             {
               //console.log(key+' : '+values);
               form_data_obj[key] = values;
             }
             $.ajax({
                type: method,
                url: url,
                data: form_data_obj,
                success: function(data){
                    //console.log(data);
                    $('#all_comments').html(data);
                    $('#comment_textarea').val("");
                    $('#success_msg').html("Added..!!");
                }
            })
        })
    });

</script>
@endsection


