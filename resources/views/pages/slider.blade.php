@extends('master')
@section('slider_content')
<?php
$all_featured_post = DB::table('tbl_post')
        ->where('is_featured', 1)
        ->where('publication_status',1)
        ->latest()
        ->get();
$counter=1;
?>

@foreach($all_featured_post as $s_post)

@endforeach
<section class="slide-show-2"> <!-- slide show 2-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div style="margin-top: 40px;" class="slide-2 carousel slide" data-ride="carousel" id="slide-2-slider">
                    <div class="arrows-next-prev"> <!-- slide show 2 sliders-->
                        <a href="#slide-2-slider" data-slide="prev">
                            <i class="fa fa-angle-left fa-lg left-arrow-s"></i></a>
                        <a href="#slide-2-slider" data-slide="next">
                            <i class="fa fa-angle-right fa-lg right-arrow-s"></i></a>
                    </div>				  
                    <div class="slide-2-content carousel-inner"> <!-- slide show 2 content-->
                        <div class="item active"> <!-- item 2-->
                            @foreach($all_featured_post as $s_post)
                            @if($counter == 4 || $counter == 8)
                                </div>
                                <div class="item">
                            @endif
                            <div style="margin-right:0.45%; margin-left: 0.45%; " class="item-2 effects-list">
                                <div class="filter"></div>
                                <div class="slide-2-tittles"> <!-- topic tittles-->
                                    <a href="{{url('/single-post/'.$s_post->post_title)}}">
                                        <h5>{{$s_post->post_title}}</h5>
                                    </a>							  
                                </div>						  
                                <img src="{{asset($s_post->post_image)}}" alt="//">
                            </div>
                            
                            <?php $counter++; ?>
                            @endforeach
                        </div>
                        				  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection