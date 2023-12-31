<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog; // Make sure to import your Blog model
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHelper; // Import the ImageHelper
use Illuminate\Validation\ValidationException;

class ContentController extends Controller
{
   
    public function viewBlog()
    {
        return view('admin.pages.blog.view-blog');
    }
    public function createBlog()
    {
        return view('admin.pages.blog.create-blog');
    }
    
    public function storeBlog(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'content' => 'required',
            ]);
    
            // $imageName = time().'.'.$request->image->extension();  
            // $request->image->move(public_path('uploads'), $imageName);
            // $baseUrl = url('/');
            // Blog::create([
            //     'title' => $validatedData['title'],
            //     'slug' => Str::slug($validatedData['title']),
            //     'image' => $baseUrl . '/uploads/' . $imageName,
            //     'content' => $validatedData['content'],
            // ]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $imagePath = public_path('uploads') . '/' . $imageName;
            $svgPath = ImageHelper::convertToSvg($imagePath);

             Blog::create([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'image' => $svgPath,
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Blog post created successfully.');
        } catch (ValidationException $e) {
             return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Error creating blog post. Please try again.')->withInput();
        }
    }
    
   
}
