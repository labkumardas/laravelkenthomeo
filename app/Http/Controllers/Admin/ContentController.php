<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog; // Make sure to import your Blog model
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHelper; // Import the ImageHelper
use Illuminate\Validation\ValidationException;
use Intervention\Image\ImageManagerStatic;

class ContentController extends Controller
{

    public function storeBlog(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'content' => 'required',
            ]);
            $image = ImageManagerStatic::make($request->file('image'))->encode('webp');
            $imageName = Str::random() . '.webp';
            $image->save(public_path('images/' . $imageName));

            $input['image'] = $imageName;
            $blog = Blog::create([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'image' => asset('uploads/' . pathinfo($imageName)['filename'] . '.webp'), // Updated path to WebP image
                'content' => $validatedData['content'],
            ]);
            return redirect()->back()->with('success', 'Blog post created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating blog post. Please try again.')->withInput();
        }
    }
    public function viewBlog()
    {
        $blogs = Blog::all();
        return view('admin.pages.blog.view-blog', ['blogs' => $blogs]);
    }
    public function createBlog()
    {
        return view('admin.pages.blog.create-blog');
    }
}
