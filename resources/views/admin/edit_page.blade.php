<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            color: #333;
        }
        .post_title {
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            margin: 20px 0;
            color: white;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
        }
        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            color: #2c3e50;
        }
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .alert {
            max-width: 600px;
            margin: 20px auto;
            padding: 10px;
            background-color: #dff0d8;
            color: #3c763d;
            border-radius: 4px;
            text-align: center;
        }
        .close {
            float: right;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
  </head>
  
  <body>
     @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
      <h1 class="post_title">Edit Post</h1>
      <div class="form-container">
        <form action="{{url('update_post',$post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
        <label for="title">Post Title</label>
                <input type="text" name="title" id="title" placeholder="Enter the post title"
                value="{{$post->title}}">
                
                <label for="description">Post Description</label>
                <textarea name="description" id="description" placeholder="Enter the post description">{{$post->description}}</textarea>
                <div>
                    <label>Old Image</label>
                    <img height="150px" width="300px"src="/postimage/{{$post->image}}">
                </div>
                <div class="div_center">
                <label for="image">Update Old Image</label>
                <input type="file" name="image" id="image">
                </div>
                <input type="submit" class="btn btn-primary" value="Submit Post">
        </form>
        </div>
    </div>
   @include('admin.footer');
  </body>
</html>