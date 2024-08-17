<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
      @include('home.homecss');

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        
      @include('home.header')
         <!-- banner section start -->
        
         <!-- banner section end -->
      </div>
      <div style="text-align:center;"class="col-md-12">
                     <div><img style="padding: 20px ;height:400px;
                     width:550px;margin:auto;" src="/postimage/{{$post->image}}" class="services_img"></div>
                     <h1><b>{{$post->title}}</b></h1>
                     <h4>{{$post->description}}</h4>
                     <p>Post by <b>{{$post->name}}</b></B></p>
                     <div class="btn_main"><a href="{{url('post_details',$post->id)}}">Read More</a></div>
                  </div>
      <!-- header section end -->
      
      <!-- footer section start -->
@include('home.footer')
   </body>
</html>