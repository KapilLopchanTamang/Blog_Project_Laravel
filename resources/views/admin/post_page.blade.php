<!DOCTYPE html>
<html>
  <head>
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
  @include('sweetalert::alert')
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')
      <div class="page-content">
        
        @if(session()->has('message'))
        <div class="alert alert-success">
            <span class="close" data-dismiss="alert">x</span>
            {{session()->get('message')}}
        </div>
        @endif
        
        <h1 class="post_title">Add Post</h1>
        
        <div class="form-container">
            <form action="{{url('add_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title">Post Title</label>
                <input type="text" name="title" id="title" placeholder="Enter the post title">
                
                <label for="description">Post Description</label>
                <textarea name="description" id="description" placeholder="Enter the post description"></textarea>
                
                <label for="image">Add Image</label>
                <input type="file" name="image" id="image">
                
                <input type="submit" class="btn btn-primary" value="Submit Post">
            </form>
        </div>
      </div>
    </div>
    @include('admin.footer')
  </body>
</html>