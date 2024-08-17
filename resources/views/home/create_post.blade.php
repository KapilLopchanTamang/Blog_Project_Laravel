<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @include('home.homecss');
      <style type="text/css">
        .div_deg{
            text-align: center;
        }
        .title_deg{
            font-size:30px ;
            font-weight: bold;
            color: aliceblue;
        }
        label{
            display: inline-block;
            width: 200px;
            color: aliceblue;
            font-size: 18px;
            font-weight: bold;


        }
        .field_deg{
            padding: 25px;
        }
      </style>
   </head>
   <body>
    @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         
        <div class="div_deg">
        <h1 class="title_deg">Add Post</h1>
        
        <form action="{{url('user_post')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field_deg">
        <label for="title">Post Title</label>
                <input type="text" name="title" id="title" placeholder="Enter the post title">
                </div>
                <div class="field_deg">
                <label for="description">Post Description</label>
                <textarea name="description" id="description" placeholder="Enter the post description"></textarea>
    </div>
    <div class="field_deg">
                <label for="image">Add Image</label>
                <input type="file" name="image" id="image">
                </div>
                <div class="field_deg">
                <input type="submit" class="btn btn-outlie-secondary" value="Add Post">
                </div>
            </form>
      
      
     
      
      <!-- footer section start -->
@include('home.footer')
   </body>
</html>