<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .title_deg{
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .table_deg{
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left:70px ;
        }
        .th_deg{
            background-color: skyblue;
        }
        .img_deg{
            height: 100px;
            width: 150px;
            padding: 10px;
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
      @if(session()->has('message'))
        <div class="alert alert-sucess">
            <button type="button" class="close" data-dismiss="alert " aria-hideen="true" >x</button>
            {{session()->get('message')}}
        
        </div>
        @endif
        <h1 class="title_deg"> All Post</h1>
        <table class="table_deg">
            <tr class="th_deg">
                <th>Post title</th>
                <th>Description</th>
                <th>Post by</th>
                <th>Post status</th>
                <th>UserType</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Status Accept</th>
                <th>Status Reject</th>


            </tr>
            @foreach ($post as $p )
            
            <tr>
                <td>{{$p->title}}</td>
                <td>{{$p->description}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->post_status}}</td>
                <td>{{$p->usertype}}</td>
                <td>
                    <img class="img_deg"src="postimage/{{$p->image}}" alt="">
                </td>
                <td>
                    <a href="{{url('delete_post',$p->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete This?')">Delete</a>
                </td>
                <td>
                <a href="{{url('edit_page',$p->id)}}" class="btn btn-success" >Edit</a>
                </td>
                <td>
                    <a onclick="return confirm('are you sure to accept
                 this post ?')" href="{{url('accept_post',$p->id)}}" class="btn
                     btn-outline-secondary">Accept</a>
                </td>
                <td>
                <a onclick="return confirm('are you sure to reject
                 this post ?')" href="{{url('reject_post',$p->id)}}" class="btn
                 btn-primary">Reject</a>

                </td>
            </tr>
            @endforeach
             
            
       
        </table>
    </div>
   @include('admin.footer');
  </body>
</html>