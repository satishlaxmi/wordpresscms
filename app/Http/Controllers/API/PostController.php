<?php
 
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator;
//models used 
use App\Models\Post;
 
class PostController extends Controller
{
    // all posts
    public function index()
    {
        $posts = Post::all()->toArray();
        return array_reverse($posts);
    }
 
    // add post
    public function add(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'tag' => 'string',
        'categories' => 'json', // Assuming categories are stored as JSON
        'featureImage' => 'image|mimes:jpeg,png,gif|max:2048', // Add image validation rules
    ]);

    // Create a new Post instance
    $post = new Post([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'tag' => $request->input('tag'),
        'categories' => json_decode($request->input('categories')), // Decode JSON data
    ]);

    // Handle the image upload
    if ($request->hasFile('featureImage')) {
        $image = $request->file('featureImage');
        $imageName = time() . '-' .$image->getClientOriginalName();
        $image->storeAs('01-09-2023', $imageName, 'public'); // Store the image with the correct method
        $post->featureImage = $imageName; // Set the image path
    }
        $post->save();

    return response()->json('The post was successfully added');
}
 
    // edit post
    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }
 
    // update post
    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->update($request->all());
 
        return response()->json('The post successfully updated');
    }
 
    // delete post
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
 
        return response()->json('The post successfully deleted');
    }
}