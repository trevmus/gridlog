<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        // This route is only for admins
        if (Auth::user()->usertype !== 'admin') {
            return redirect()->route('user.dashboard');
        }
        return view('admin.index');
    }
        public function post_page()
    {
        $categories = Category::all();
        return view('admin.post_page', compact('categories'));
    }
    
    public function add_post(Request $request)
    
    {
        $user = Auth::user(); // or use $user = Auth::user();
        $user_id = $user->id;
        $name = $user->name; // Get the authenticated user's ID
        $usertype = $user->usertype; // Get the authenticated user's ID

        $request->validate([
        // 'title' => 'required|string|max:255',
        // 'slug'  => 'required|string|alpha_dash|unique:posts,slug',
        // 'description'  => 'required|string|min:10', 
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        
        $post =new Post;
        $post->title = $request->title;
        // $post->slug =$request->slug;
    
        $post->description = $request->description;

        $post->post_status = 'active'; // Set the post status to 'active' by default

        $post->user_id = $user_id; // Store the user ID in the post table
        $post->name = $name; // Store the user's name in the post
        $post->usertype = $usertype; // Store the user's type in the post

        $post->category_id = $request->category_id;
        if($request->hasFile('image'))
        {
         
        $image = $request->file('image');
        
        $imagename= time().'.'.$image->getClientOriginalExtension();

        $image->move('postimage', $imagename);


        $post->image = $imagename; // Store the image name in the database

        }

        $post->save();

        return redirect()->back()->with('message', 'Post added successfully');

    }

    public function show_post()
    {

        $post = Post::all(); // Retrieve all posts from the database
        return view('admin.show_post',compact('post')); // Pass the posts to the view
    } 

    public function delete_post($id)
    {
        
        $post = Post::find($id); // Find the post by its ID
        $post->delete(); // Delete the post from the database
        return redirect()->back()->with('message', 'Post deleted successfully'); // Redirect back with a success message

    }

    public function edit_page($id)
    {
        
        $post = Post::find($id); // Find the post by its ID
        // $post->category_id = $request->category_id;
        $categories = Category::all(); // Retrieve all categories from the database
        return view('admin.edit_page', compact('post', 'categories')); // Pass the post to the edit view
    }

    public function update_post(Request $request, $id)
    {
        $request->validate([
    //     'title' => 'required|string|max:255',
    //     'description' => 'required|string|min:10',
    //     'slug'  => 'required|string|alpha_dash|unique:posts,slug',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
        
        $data = Post::find($id); // Find the post by its ID
        $data->title = $request->title; // Update the title
        // $data->slug =$request->slug;
        $data->category_id =$request->category_id;
        $data->description = $request->description; // Update the description

        if($request->hasFile('image'))
        {  
            $image= $request->image; 

            $imagename= time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);
            // Move the uploaded image to the 'postimage' directory with a unique name

            $data->image = $imagename; // Store the image name in the database

        }
            
        $data->save(); // Save the changes to the database
        
        return redirect()->back()->with('message', 'Post updated successfully'); // Redirect back with a success message
    }

    public function accept_post($id)
    {

        $data= Post::find($id);
        $data->post_status= 'active';

        $data->save();

        return redirect()->back()->with('message','Post Status Changed to Active');


    }

       public function reject_post($id)
    {

        $data= Post::find($id);
        $data->post_status= 'rejected';

        $data->save();

        return redirect()->back()->with('message','Post Status Rejected');


    }

    public function add_category()
    {
        $categories = Category::all();
        return view('admin.add_category', compact('categories'));
    }
        /**
     * Store a newly created resource in storage.
     */
    public function store_category(Request $request)
    {
        //Save a new category and then redirect back to index
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
    ]);

    Category::create_category($validated);
    
    return redirect()->route('admin.add_category')->with('success', 'Category created successfully');
    }

    public function destroy_category(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('admin.add_category')->with('success', 'Category deleted successfully');
    }

}