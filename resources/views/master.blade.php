<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Define Charset -->
        <meta charset="utf-8"/>
        <title>Home - Pure Magazine</title>

        <meta name="description" content="Home - Pure Magazine" />
        <meta name="keywords" content="themes,blog,responsive,retina,html5,css3" />

        <!-- first-mobile-meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap sheets -->
        <link href="{{asset('public/blog/css/bootstrap.css')}}" rel="stylesheet"/>

        <!-- font awesome icons -->
        <link rel="stylesheet" href="{{asset('public/blog/font-awesome/css/font-awesome.css')}}">

        <!-- fonts  -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700,900' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700' rel='stylesheet' type='text/css' />

        <!-- stylesheet -->
        <link href="{{asset('public/blog/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <!-- media query -->
        <link href="{{asset('public/blog/css/responsive.css')}}" rel="stylesheet" type="text/css"/>	   
        <link href="{{asset('public/blog/css/mycss.css')}}" rel="stylesheet" type="text/css"/>	   
        <script src="{{asset('public/blog/js/jquery.js')}}"></script>
        <script src="{{asset('public/blog/js/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('public/blog/js/myjs.js')}}"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js')}}"></script>        
            <![endif]-->
    </head>


    <body>
        <header class="top-bar"> <!-- top bar -->
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-3">
                        <ul class="icons-bar">
                            @if (Auth::guest())
                            <li>
                                <a class="icons-link" data-toggle="modal" data-target="#modal-1" href="#">
                                    <i class="fa fa-user fa-lg"></i>
                                </a>
                                <div class="modal-sign modal" id="modal-1" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <div class="sign-tabs">		  
                                                    <ul class="nav-sign">
                                                        <li class="active sign-in-bar">
                                                            <a href="#section-3" data-toggle="tab"><span>sign in</span></a>
                                                        </li>
                                                        <li class="sign-up-bar">
                                                            <a href="#section-4" data-toggle="tab"><span>sign up</span></a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="sign-in-form tab-pane fade in active" id="section-3"> <!-- tab section-1 -->
                                                            <form role="form" action="{{ route('login') }}" method="POST" class="sign-place"><!-- sign -->
                                                                {{ csrf_field() }}
                                                                <span class="text-capitalize sign-title">
                                                                    hello world, you can sign in by your NickName here
                                                                </span>													  
                                                                	
                                                                <input type="text" class="forms form-sign input-lg" name="nick_name" placeholder="NickName" value="{{ old('email') }}" required autofocus>
                                                                		
                                                                <input type="password" class="forms form-sign input-lg" name="password" placeholder="Password" required>
                                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                                <button type="submit" class="btn btn-sign-forms">sign in</button>									  					  
                                                            </form>		
                                                            <a class="under-line-a" href="{{ route('password.request') }}">
                                                                <span class="text-capitalize alert-title">
                                                                    forget password?
                                                                </span>
                                                            </a>
                                                        </div>		
                                                        <div class="sign-up-form tab-pane fade" id="section-4"> <!-- tab section-2 -->
                                                            <form class="sign-place" role="form" method="POST" action="{{ route('register') }}"><!-- sign -->
                                                                {{ csrf_field() }}
                                                                <span class="text-capitalize sign-title">
                                                                    hello guest, you can sign up by your e-mail here
                                                                </span>
                                                                <input id="nick_name" type="text" class="forms form-sign input-lg" name="nick_name" placeholder="NickName" required autofocus>
                                                                <input id="email" type="email" class="forms form-sign input-lg" name="email"  placeholder="Email Address" required>
                                                                
                                                                <input id="password" type="password" class="forms form-sign input-lg" name="password" placeholder="Password" required>
                                                                
                                                                <input id="password-confirm" type="password" class="forms form-sign input-lg" name="password_confirmation" placeholder="Confirm Password" required>
                                                                <button type="submit" class="btn btn-sign-forms">sign up</button>									  					  
                                                            </form>		
                                                            
                                                        </div>									  
                                                    </div>
                                                </div>							  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="top-lines">|</span>
                            </li>
                            @else
                            <li>					   
                                <a class="icons-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit()">
                                    <i class="fa fa-share-square fa-lg"></i>
                                </a>
                            </li>
                            <li>
                                <span class="top-lines">|</span>
                            </li>
                            @endif
                            <li>
                                <a class="icons-link" data-toggle="modal" data-target="#modal-2" href="#">
                                    <i class="fa fa-search fa-lg"></i>
                                </a>
                                <div class="modal-search modal" id="modal-2" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <form role="form" class="sign-place"><!-- sign -->
                                                    <div class="search-modal-form">
                                                        <input type="text" class="text-capitalize forms form-sign input-lg" placeholder="search......">
                                                        <a href="#"><i class="fa fa-search fa-lg"></i></a>
                                                    </div>											  
                                                </form>	 
                                            </div>
                                        </div>
                                    </div>
                                </div>					  
                            </li>
                            <li>
                                <span class="top-lines">|</span>
                            </li>
                            
                            	
                            <li>					   
                                <a class="icons-link" href="#">
                                    <i class="fa fa-envelope fa-lg"></i>
                                </a>
                            </li>					   
                        </ul>
                    </div>
                    <div  class="col-md-3 col-xs-3 col-xs-sp"><!-- user-panel -->
                        @if(Auth::user())
                        <div style="margin-top:0;" class="user-panel">
                            <div class="user-panel-img">
                                <img src="http://placehold.it/38x38" alt="//" />
                            </div>				  
                            <span class="user-tag">3</span>
                            <span class="name-user">{{ Auth::user()->nick_name }}</span>		
                            <div class="dropdown down-user-panel">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-angle-down fa-lg"></i>
                                </a>					  
                                <ul class="dropdown-menu user-panel-down" role="menu"><!-- drop down -->
                                    <li class="caret-p">
                                        <div class="caret-3"></div>
                                    </li>
                                    <li><!-- item -->
                                        <div class="user-panel-details">
                                            <i class="fa fa-user fa-lg"></i>
                                            <a href="#"><span>Your Profile</span></a>
                                        </div>
                                        <div class="user-panel-tags">
                                            <span>5</span>
                                        </div>
                                    </li>				
                                    <li class="background-dif"><!-- item -->
                                        <div class="user-panel-details">
                                            <i class="fa fa-star fa-lg"></i>
                                            <a href="#"><span>Favourites</span></a>
                                        </div>
                                        <div class="user-panel-tags">
                                            <span>10</span>
                                        </div>
                                    </li>	
                                    <li><!-- item -->
                                        <div class="user-panel-details">
                                            <i class="fa fa-wrench fa-lg"></i>
                                            <a href="{{url('/add-post')}}"><span>Add New</span></a>
                                        </div>
                                    </li>	
                                    <li><!-- item -->
                                        <div class="user-panel-details">
                                            <i class="fa fa-sign-out fa-lg"></i>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit()"><span>Logout</span></a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        </div>
                                    </li>								  
                                </ul>
                            </div>					  
                        </div>
                        @endif
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="time-zone">
                            <i class="fa fa-sun-o fa-lg"></i>
                            <?php date_default_timezone_set('Asia/Dhaka'); ?>
                            <span class="text-top"><?php echo date('l d/m/Y');?></span>
                            <span class="text-top">|</span>    		
                            <span class="text-top"><?php echo date('h:i A');?></span>
                            
                        </div>
                    </div>
                </div>		  
            </div>
        </header>
        <!--end top bar -->

        <nav class="navbar navbar-default" role="navigation"> <!-- Nav Bar -->
            <div class="container">
                <div class="row">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="" href="{{url('/')}}"><img class="navbar-brand" src="{{asset('public/blog/imgs/logo.png')}}" alt="//"/></a>
                    </div>

                    <?php
                        $all_main_category = DB::table('tbl_main_category')
                                ->where('publication_status',1)
                                ->get();
                        $all_sub_category = DB::table('tbl_sub_category')
                                ->where('publication_status',1)
                                ->get();
                    
                    ?>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            
                            @foreach($all_main_category as $s_mc)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$s_mc->category_name}}<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><div class="caret-1"></div></li>  
                                    @foreach($all_sub_category as $s_sc)
                                    @if($s_mc->id == $s_sc->main_category_id)
                                    <li><a href="{{url('/'.$s_mc->category_name.'/'.$s_sc->category_name)}}">{{$s_sc->category_name}}</a></li>
                                    <li class="divider"></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach	
                            <li><a href="contact.html">CONTACT</a></li>						  
                        </ul>		          
                    </div>
                </div> 
            </div>
        </nav>
        <!-- /end navbar-->


        @yield('slider_content')


        @yield('main_content')


        <footer class="footer"> <!-- footer -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4"><!-- footer site details -->
                        <div class="foot-left">
                            <h5 class="foot-head-text">about us</h5><!-- footer-head-tag -->
                            <img src="{{asset('public/blog/imgs/footer-logo.png')}}" alt="//" />
                            <p>
                                Nunc dictum est vel risus luctus eu venenatis dsapiending. Morbi mattis urna et felisNunc dictum est vel risus luctus eu venenatis sapien adipiscing. Morbi mattis urna et felisNunc dictum 
                            </p>
                            <button class="btn foot-btns">read more</button>						  
                        </div>
                    </div>

                    <div class="col-md-4"><!-- footer recent post -->
                        <div class="clearfix"></div>	
                        <div class="foot-posts">				  
                            <h5 class="foot-head-text">recent posts</h5><!-- footer-head-tag -->
                            <div class="recent-posts"><!-- block 1 -->
                                <div class="row">
                                    <div class="col-md-3 col-xs-2"><!-- post image -->
                                        <div class="recent-img-or">
                                            <div class="recent-img">
                                                <a href="single-blog.html">
                                                    <img src="http://placehold.it/70x70" alt="//"/>
                                                </a>	
                                            </div>
                                            <a href="single-blog.html">
                                                <div class="figcaption">
                                                    <i class="fa fa-video-camera fa-lg"></i>
                                                </div>
                                            </a>
                                        </div>							  
                                    </div>
                                    <div class="col-md-9  col-xs-10"><!-- post details -->
                                        <div class="recent-post-text">
                                            <a href="single-blog.html">
                                                <span class="recent-text-head">Nullam id dolor id nibhDonec sed odio dui</span>
                                            </a>
                                            <a href="single-blog.html">
                                                <span class="recent-text-comment">3comment</span>
                                            </a>
                                            <button class="btn foot-btns pull-right">read more</button>								  
                                        </div>
                                    </div>						  
                                </div>
                            </div>

                            <div class="recent-posts"><!-- block 2 -->
                                <div class="row">
                                    <div class="col-md-3 col-xs-2"><!-- post image -->
                                        <div class="recent-img-or">
                                            <div class="recent-img">
                                                <a href="single-blog.html">
                                                    <img src="http://placehold.it/70x70" alt="//"/>
                                                </a>	
                                            </div>
                                            <a href="single-blog.html">
                                                <div class="figcaption">
                                                    <i class="fa fa-video-camera fa-lg"></i>
                                                </div>
                                            </a>
                                        </div>							  
                                    </div>
                                    <div class="col-md-9 col-xs-10"><!-- post details -->
                                        <div class="recent-post-text">
                                            <a href="single-blog.html">
                                                <span class="recent-text-head">Nullam id dolor id nibhDonec sed odio dui</span>
                                            </a>
                                            <a href="single-blog.html">
                                                <span class="recent-text-comment">3comment</span>
                                            </a>
                                            <button class="btn foot-btns pull-right">read more</button>								  
                                        </div>
                                    </div>						  
                                </div>
                            </div>

                            <div class="recent-posts"><!-- block 3 -->
                                <div class="row">
                                    <div class="col-md-3 col-xs-2"><!-- post image -->
                                        <div class="recent-img-or">
                                            <div class="recent-img">
                                                <a href="single-blog.html">
                                                    <img src="http://placehold.it/70x70" alt="//"/>
                                                </a>	
                                            </div>
                                            <a href="single-blog.html">
                                                <div class="figcaption">
                                                    <i class="fa fa-video-camera fa-lg"></i>
                                                </div>
                                            </a>
                                        </div>							  
                                    </div>
                                    <div class="col-md-9 col-xs-10"><!-- post details -->
                                        <div class="recent-post-text">
                                            <a href="single-blog.html">
                                                <span class="recent-text-head">Nullam id dolor id nibhDonec sed odio dui</span>
                                            </a>
                                            <a href="single-blog.html">
                                                <span class="recent-text-comment">3comment</span>
                                            </a>
                                            <button class="btn foot-btns pull-right">read more</button>								  
                                        </div>
                                    </div>						  
                                </div>
                            </div>
                        </div>				  
                    </div>				  

                    <div class="col-md-4"><!-- flickr stream -->
                        <div class="clearfix"></div>			  
                        <div class="flickr">
                            <h5 class="foot-head-text">flickr stream</h5><!-- footer-head-tag -->					  
                            <ul id="basicuse" class="thumbs"></ul>
                        </div>				  
                    </div>			  
                </div>
            </div>
        </footer>
        <!-- /end footer-->
        <div class="foot-bar"><!-- footer bar-->
            <div class="container">
                <div class="row">
                    <div class="foot-bar-m">
                        <div class="col-sm-6">
                            <div class="theme-rights">
                                <span> 
                                    Copyrights © 2012 & All Rights Reserved by Lion Codes. 
                                </span>
                            </div>							  
                        </div>
                        <div class="col-sm-6">
                            <div class="text-right">
                                <span class="foot-bar-link">
                                    <a href="#">Privacy Policy</a>/
                                    <a href="#">Terms of Service</a>/
                                    <a href="#">FAQs</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /end foot bar -->
        <!-- general-jquery-->
        
        <script src="{{asset('public/blog/js/plugin.js')}}"></script>		

        <!-- bootstrap-jquery-->
        <script src="{{asset('public/blog/js/bootstrap.min.js')}}" ></script>	

        <!-- nice scroll-jquery-->	
        <script src="{{asset('public/blog/js/jquery.nicescroll.min.js')}}"></script>	

        <!-- jflickrfeed-jquery-->	
        <script src="{{asset('public/blog/js/jflickrfeed.js')}}"></script>
    </body>

    <!-- Mirrored from www.atonvision.com/themeforest/puremagazine/dark/home2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2017 20:52:03 GMT -->
</html>