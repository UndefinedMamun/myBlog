<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Admin Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{asset('public/admin/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('public/admin/css/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/admin/css/matrix-login.css')}}" />
        <link href="{{asset('public/admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        
        <div id="loginbox">   
            <h4 style="color:red; text-align: center;">
            @php
                $exception=Session::get('exception');
                if($exception){
                    echo $exception;
                    Session::put('exception','');
                }
            @endphp
            </h4>
            <h4 style="color:green; text-align: center;">
            @php
                $exception=Session::get('message');
                if($exception){
                    echo $exception;
                    Session::put('message','');
                }
            @endphp
            </h4>
            {!! Form::open(['url'=>'/auth-check','id'=>'loginform','class'=>'form-vertical','method'=>'POST']) !!}
            
		<div class="control-group normal_text"> <h3><img src="{{asset('public/admin/img/logo.png')}}" alt="Logo" /></h3></div>
                
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Email Address" name="email_address"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" />
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</button></span>
                </div>
            {!! Form::close() !!}
            {!! Form::open(['url'=>'/admin-recover','id'=>'recoverform','class'=>'form-vertical','method'=>'POST']) !!}
            
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            {!! Form::close() !!}</form>
        </div>
        
        
        <script src="{{asset('public/admin/js/jquery.min.js')}}"></script>  
        <script src="{{asset('public/admin/js/matrix.login.js')}}"></script> 
    </body>

</html>
