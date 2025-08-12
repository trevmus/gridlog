<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::where('post_status', 'active')->get();

        // This route is only for regular users
        if (Auth::user()->usertype !== 'user') {
            return redirect()->route('admin.dashboard');
        }
        return view('home.homepage', compact('post'));
    }
    
    public function homepage()
    {
        $post = Post::where('post_status', 'active')->get();

        return view('home.homepage', compact('post'));
    }   
     // When user clicks on more details post shows the post completely
    public function post_details($id)
    {
        $post = Post::find($id);
        $content = view('home.post_details', compact('post'))->render();
        return response($content)
            ->header('Cache-Control', 'private, max-age=3600, must-revalidate');
    }
    // Creates the post page by user having post creation form
    public function create_post()
    {
        $categories = Category::all();
        return view('home.create_post', compact('categories'));
    }
    // Store user post
    // This method used to store post created by the user
    public function user_post(Request $request)
    {
        $user = Auth::user();

        $userid = $user->id;
        $username = $user->name;
        $usertype = $user->usertype;

        $request->validate([
        // 'title' => 'required|string|max:255',
        // 'slug'  => 'required|string|alpha_dash|unique:posts,slug',
        // 'description'  => 'required|string|min:10', 
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic,svg|max:2048', // Optional but safe
        
        ]);
        $post = new Post;
        $post->title = $request->title;
        // $post->slug = $request->slug;
        $post->description = $request->description;
        $post->category_id = $request->category_id; // Assuming you have a category_id field
        $post->user_id = $userid;
        $post->name = $username;
        $post->usertype = $usertype;
        $post->post_status = 'active'; // Set the post status to 'active' by default
        // Handle image upload


        if ($request->hasFile('image')) {

            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();

        Alert::info('Congrats', 'You have Added the post Successfully');

        return redirect()->back();
    }
    //Shows all posts by a user
    public function my_post()
    {
        $user = Auth::user();

        $userid = $user->id;
        $data = Post::where('user_id', '=', $userid)->get();


        return view('home.my_post', compact('data'));
    }

    public function my_post_del($id)
    {
        $data = Post::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Post deleted Successfully');
    }

    public function post_update_page($id)
    {
        $data = Post::find($id);
        $categories = Category::all(); //gets categories

        return view('home.post_page', compact('data', 'categories'));
    }

    public function update_post_data(Request $request, $id)
    {

        // Validate request data
         $request->validate([
        // 'title' => 'required|string|max:255',
        // 'slug'  => 'required|string|alpha_dash|unique:posts,slug,' . $id,
        // 'description' => 'required|string|min:10',
        // 'category_id' => 'required|exists:categories,id', // Ensures category_id exists
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic,svg|max:2048', // Optional but safe
         ]);

        //Find the post

        $data = Post::find($id);

        //Update fields

        $data->title = $request->title;
        // $data->slug = $request->slug;
        $data->description = $request->description;
        $data->category_id = $request->category_id; //Update category_id

        // Handle image upload

        if ($request->hasFile('image')) {

            $image = $request->image;

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Post Updated Successfully');
    }
    public function blogsection()
    {
        $post = Post::all();

        $content = view('home.blogsection', compact('post'))->render();
        return response($content)
            ->header('Cache-Control', 'private, max-age=3600, must-revalidate');
    }
}