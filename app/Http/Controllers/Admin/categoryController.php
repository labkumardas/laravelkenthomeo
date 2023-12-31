<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;  
use App\Models\Subcategory;  
use Illuminate\Support\Str;
 use Illuminate\Validation\ValidationException;
class categoryController extends Controller
{
   
    public function createCategory()
    {
        $categories = Category::all();
         return view('admin.pages.create-category',[ 'categories' => $categories ] );
    }
    public function viewCategory()
    {
        $categories = Category::all();
        return view('admin.pages.view-category',[ 'categories' => $categories ]);
     }
        
    public function storeCategory(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'title' => 'required',
            ]);
            Category::create([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'status'=>1,
               
            ]);
    
            return redirect()->back()->with('category_success', 'Category created successfully.');
        } catch (ValidationException $e) {
             return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
             return redirect()->back()->with('category_success_error', 'Error creating Category. Please try again.')->withInput();
        }
    }
    public function storeSubCategory(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'title' => 'required',
                'category_id'=> 'required',
            ]);
            Subcategory::create([
                'title' => $validatedData['title'],
                'category_id' => $validatedData['category_id'],
                'slug' => Str::slug($validatedData['title']),
             ]);
    
            return redirect()->back()->with('subcategory_success', 'SubCategory created successfully.');
        } catch (ValidationException $e) {
             return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
             return redirect()->back()->with('subcategory_success_error', 'Error creating SubCategory. Please try again.')->withInput();
        }
    }
    public function viewSubcategory($id){
        $subCategories = Subcategory::where('category_id',$id)->with('category')->get();
       
        return view('admin.pages.view-Subcategory',[ 'data' => $subCategories ] );
    }
    public function subcatById($id){
        $subcategories = Subcategory::where('category_id', $id)->get();

        // Prepare the response data in the format expected by your JavaScript
        $response = [];
        foreach ($subcategories as $subcategory) {
            $response[$subcategory->id] = $subcategory->title;
        }

        return response()->json($response); 
    }
    

}
