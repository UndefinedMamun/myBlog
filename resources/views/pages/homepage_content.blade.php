@extends('master')
@section('main_content')


<section style="margin-top: 30px;" class="container-xs"><!-- page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="head-text">blog grid view</h3>
                <span class="underline big"><em> </em></span>			  
                <div class="blog-grid-m">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                             $recent_post = DB::table('tbl_post')
                                     ->where('publication_status',1)
                                     ->latest()
                                     ->get();
                             
                            ?>
                            @foreach($recent_post as $s_post)
                            <div class="blog-grid-col"> <!--movie video block-->
                                <div class="blog-grid-content">
                                    <div class="head-tags red-bg">
                                        <span class="head-title">movies</span>
                                    </div>
                                    <div class="blog-grid-img block-height">
                                        <a href="{{url('/single-post/'.$s_post->post_title)}}">
                                            <img src="{{asset($s_post->post_image)}}" alt="//"/>
                                        </a>
                                    </div>
                                    <div class="figcaption dark-bg"> <!--movie-video-block-hover-->
                                        <div class="bg-dark-shadow"></div>
                                        <div class="head-small-tags red-small-bg">
                                            <i class="fa fa-video-camera fa-lg"></i>
                                        </div>
                                        <div class="text-blog-grid-2 block-height">
                                            <a href="{{url('/single-post/'.$s_post->post_title)}}"><h5>{{$s_post->post_title}}</h5></a>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel enim enim. Proin tortor diam, ultricies quis quam sed, vulputate mollis arcu. Sed a sem vel urna vehicula garavida. Nullam dui Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel enim enim. Proin tortor diam, ultriciesLorem ipsum dolor sit amet, consec
                                            </p>
                                            <div class="movies-foot">
                                                <ul>
                                                    <li class="rate">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>														  
                                                    </li>
                                                    <li class="like-rate">
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                        <a href="#"><i class="fa fa-share-square"></i></a>														  
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>									  
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row"><!-- pages number -->
                    <div class="pages-numbers">
                        <div class="col-md-7">
                            <div class="numbers-content">
                                <div class="numbers-content-row-1 pull-left">
                                    <button class="btn shop-p-n-btn">1</button>
                                    <button class="btn shop-p-n-btn">2</button>
                                    <button class="btn shop-p-n-btn">3</button>
                                    <button class="btn shop-p-n-btn">4</button>
                                    <button class="btn shop-p-n-btn">5</button>
                                    <button class="btn shop-p-n-btn">6</button>		
                                </div>	
                                <div class="numbers-content-row-2 pull-right">
                                    <button class="btn next-prev-btn">previous</button>
                                    <button class="btn next-prev-btn">next</button>
                                </div>						  
                            </div>
                        </div>
                    </div>
                </div>		  				  
            </div>				  
            <div class="col-md-3"><!-- head tag -->
                <h3 class="head-text">Let's Social</h3>
                <span class="underline small"><em> </em></span>
                <ul class="social-blog right-side-m">
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>				  
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>				  
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-youtube"></i></a>				  
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>				  
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dribbble"></i></a>				  
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>				  
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-soundcloud"></i></a>				  
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-github"></i></a>				  
                    </li>
                </ul>
                <div class="blog-grid-content black-bg right-side-m right-side-m-b">
                    <div class="block-height">								  
                        <div>
                            <a href="#"><img src="http://placehold.it/229x285" alt="//" /></a>
                        </div>
                    </div>
                </div>

                <div class="home-pop popular-posts">
                    <h3 class="head-text">Popular</h3>
                    <span class="underline small"><em> </em></span>							  
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
                                            <img src="http://placehold.it/50x50" alt="//"/>
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
                                            <img src="http://placehold.it/50x50" alt="//"/>
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
                                            <img src="http://placehold.it/50x50" alt="//"/>
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
                                            <img src="http://placehold.it/50x50" alt="//"/>
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
                                            <img src="http://placehold.it/50x50" alt="//"/>
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
                                            <img src="http://placehold.it/50x50" alt="//"/>
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
            </div>
        </div>	  
    </div><!-- end container -->
</section>

@endsection