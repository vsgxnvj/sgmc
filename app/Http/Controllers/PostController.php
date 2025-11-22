<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    // Show all posts
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Show create form
    public function create()
    {
        return view('posts.create');
    }

    // Store post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Handle slug
        $slug = Str::slug($request->title);
        $count = Post::where('slug', 'LIKE', "$slug%")->count();
        $data['slug'] = $count ? "$slug-$count" : $slug;

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    // Show single post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function uploadCkeditorImage(Request $request)
    {
        // 1. Check if the 'upload' file field exists (CKEditor uses 'upload' as the field name)
        if ($request->hasFile('upload')) {
            try {
                $file = $request->file('upload');
                // Create a safe, unique filename
                $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());

                // 2. Store the file. 'public/uploads' is relative to storage/app/.
                // The file will go into: storage/app/public/uploads
               $file->storeAs('uploads', $filename, 'public');

                // 3. Generate the public URL using the asset helper and the storage link
                $url = asset('storage/uploads/' . $filename);

                // 4. *** CRITICAL FIX: CKEditor 5 SUCCESS RESPONSE FORMAT ***
                // Must return 'uploaded' => 1 and 'url'
                return response()->json([
                    'uploaded' => 1,
                    'fileName' => $filename,
                    'url' => $url,
                ]);
            } catch (\Exception $e) {
                // Log the exception for debugging
                Log::error('CKEditor Image Upload Failed: ' . $e->getMessage());

                // CKEditor 5 ERROR RESPONSE FORMAT
                return response()->json(
                    [
                        'uploaded' => 0,
                        'error' => [
                            'message' => 'File upload failed: ' . $e->getMessage(),
                        ],
                    ],
                    500,
                );
            }
        }

        // CKEditor 5 ERROR RESPONSE FORMAT for no file
        return response()->json([
            'uploaded' => 0,
            'error' => [
                'message' => 'No file uploaded or file field name is incorrect.',
            ],
        ]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Delete the featured image from storage if it exists
        if ($post->featured_image && Storage::exists($post->featured_image)) {
            Storage::delete($post->featured_image);
        }

        // Delete the post
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
