<header class="slide">            
            <!-- nav_logo-->
            @include('includes.top_nav')
            <!-- End nav_logo-->
            
            <!-- Slide -->           
            <div class="camera_wrap" id="slide">
                 @foreach ($montages as $montage)
                <!-- Item Slide --> 
                <div  data-src="{{ URL::asset('uploads/slides/'.$montage->Banner) }}">
                    <div class="camera_caption fadeFromLeft">
                        <div class="container">
                            <div class="row-fluid">                                
                                <div class="span8">
                                    <h1 class="animated fadeInDown">Full Turnkey Solutions <br>for <span>Telecom Client</span>.</h1>
                                    <p class="animated fadeInUp">Network planning, design &amp; optimization, network deployment, network operations &amp; maintenance</p>
                                    <a href="{{$montage->url}}" class="button animated fadeInUp">
                                        <span><i class="icon-hand-right"></i></span>Explore More                                    </a>                                </div>
                            </div>  
                        </div>                                                                                         
                  </div>
                </div>
                <!-- End Item Slide -->  
                @endforeach
                <!-- Item Slide --> 
               
                 <!-- End Item Slide --> 

                 <!-- Item Slide --> 
               
                 <!-- End Item Slide --> 

                 <!-- Item Slide --> 
                
                 <!-- End Item Slide --> 

                  <!-- Item Slide --> 
               
                 <!-- End Item Slide --> 
            </div>    
        </header>