@extends('master')
@section('main_content')

<section class="container-xs"><!-- page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12"><!-- head tag -->
                <h3 class="head-text">Add New Post</h3>
                <span class="underline big"><em> </em></span>
            </div>	      
        </div>
        <div class="row">
            <div class="col-md-12"> 
                <div class="row">
                    <div class="col-md-12"><!-- single blog page content -->
                        <div class="single-blog-top">
                            <h2 style="color:green"><?php
                                $message = Session::get('message');
                                if($message){
                                    echo $message;
                                    Session::put('message','');
                                }
                            ?></h2>
                            <form action="{{url('/new-post-submited')}}" method="POST" enctype='multipart/form-data'>  
                            <div class="form-group">
                                <label for="post_title">Post Title</label>
                                <input onkeyup="check_post_title();"  required="" style="color:black; margin-bottom: 20px;" id="post_title" type="text" name="post_title" class="form-control col-md-12">
                            </div>
                                {{csrf_field()}}
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <div class="form-group">
                                <label for="post_image">Cover Photo</label>
                                <input id="post_image" type="file" name="post_image" accept="image/*" class="form-control">
                            </div>
                            						  
                            <!-- <div class="blog-img-default">
                                <img src="http://placehold.it/698x304" alt="//">
                            </div> -->
                            <div style="margin-top: 20px;" class="form-group">
                                <label for="post_details">Blog</label>
                                <textarea style="height: 400px;" class="tinymce"  name="post_details" id="post_details"></textarea>
                            </div>
                            <div  class="form-group">
                                <label for="mc_select">Select Main Category</label>
                                <select onchange="get_sc();" style="color:black;" name="mc_id" id="mc_select">
                                    <?php
                                        $main_category_info = DB::table('tbl_main_category')
                                                ->where('publication_status',1)
                                                ->get();
                                    ?>
                                    <option value="0">Select</option>
                                    @foreach($main_category_info as $s_main_category)
                                        <option value="{{$s_main_category->id}}">{{$s_main_category->category_name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div style="margin-bottom: 20px; margin-top: 20px" class="form-group">
                                <label for="sc_id">Select Sub Category</label>
                                <select  style="color:black;" disabled name="sc_id" id="sc_select">
                                    <option>Disabled</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info btn-lg" >Submit</button>
                          </form> 
                        </div>	  
                    </div>

                    						  
                </div>	  				  
            </div>	

            
        </div>	  
    </div><!-- end container -->
</section>
<script>
    function check_post_title(){
        var value = $('#post_title').val();
        $.ajax({
            type: 'GET',
            url: 'check-post-title/' + value,
            success: function(data){
                console.log(data);
                if(data == 1)
                    $('#post_title').css('border-color','red');
                else
                    $('#post_title').css('border-color','#315792');
            }
        });
    }
    
    function get_sc(){
        var mc_id = $('#mc_select').val();
        if( mc_id > 0 ){
           $('#sc_select').html('');
            $.ajax({
            type: 'GET',
                    url: 'get-sub-categories/' + mc_id,
                    success: function(data){
                        if(data.length !== 0){
                            data.forEach(function(element) {
                                var select_field = "<option value='"+element.id+"'>"+element.category_name+"</option>";
                                $('#sc_select').append(select_field);
                            });
                        }
                        else{
                            $('#sc_select').html("<option value='0'>N/A</option>");
                        }
                    }
           });
           $('#sc_select').prop("disabled", false);
        }
        else{
            $('#sc_select').prop("disabled", true);
            $('#sc_select').html("<option>Disabled</option>");
        }
    }


</script>
@endsection

