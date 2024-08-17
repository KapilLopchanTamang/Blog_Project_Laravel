<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\DescriptionList\Node\DescriptionList;
use RealRashid\SweetAlert\Facades\Alert; 

class AdminController extends Controller
{
    public function post_page(){
        return view('admin.post_page');
    }
    public function add_post(Request $request){
        //return view('admin.post_page');
        $user=Auth()->user();
        $userid=$user->id;
        $name=$user->name;
        $usertype=$user->usertype;

        
        $post=new Post;
        $post->title=$request->title;
        $post->description=$request->description;
        
        $post->post_status='active';

        $post->user_id=$userid;

        $post->name=$name;

        $post->usertype=$usertype;

        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $post->image=$imagename;
            
        }
        
        $post->save();
        Alert::success('Congrats', 'You have added the data Successfully');
        return redirect()->back();
        
    }
    public function show_post(){
        $post=Post::all();

        return view('admin.show_post',compact('post'));

    }
    public function delete_post(string $id){
    $post = Post::find($id);

    
    
        $post->delete();
    
    
    
    

    return redirect()->back()->with('message', 'Post deleted successfully');
        
    }
    public function edit_page( $id){
        $post = Post::find($id);
        
        return view('admin.edit_page',compact('post'));
        
        }
        public function update_post(Request $request, $id) {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
        
            // Find the post by ID
            $data = Post::find($id);
        
            if (!$data) {
                return redirect()->back()->withErrors('Post not found.');
            }
        
            // Update the post details
            $data->title = $validatedData['title'];
            $data->description = $validatedData['description'];
        
            // Save the changes to the database
            $data->save();
        
            // Redirect back with a success message
            return redirect()->back()->with('message', 'Post updated successfully.');
        }
        public function accept_post($id)
        {
            $data = Post::find($id);
            $data->post_status='active';
            $data->save();
            return redirect()->back()->with('message','Post Status changed to Active');
        }


        public function reject_post($id)
        {
            $data = Post::find($id);
            $data->post_status='rejected';
            $data->save();
            return redirect()->back()->with('message','Post Status changed to Rejected');
        }
}

