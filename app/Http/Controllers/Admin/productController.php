<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;  
use App\Models\Subcategory;  
 use App\Models\Productimage;
use App\Models\Product; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHelper; 
use Illuminate\Validation\ValidationException;
class productController extends Controller
{
    protected function generateUniqueNumber() {
        // Generate a unique ID based on the current timestamp
        $uniqueId = uniqid();

        // Extract the last 10 characters to get a 10-digit string
        $tenDigitNumber = substr($uniqueId, -10);

        return $tenDigitNumber;
    }
    
    public function createProduct()
    {
        $categories = Category::where('status',1)->get();
        return view('admin.pages.product.create-product',[ 'data' => $categories ]);
    }
    public function viewProduct()
    {
        return view('admin.pages.product.view-product');
    }
    public function storeProduct(Request $request)
    {
        $images = $request->file('images');
        
    
        try {  
            $title = strip_tags(trim($request->input('title')));
            $slug = Str::slug($title);
            $category_id = strip_tags(trim($request->input('category_id')));
            $subcategory_id = strip_tags(trim($request->input('subcategory_id')));
            $short_description = strip_tags(trim($request->input('short_description')));
            $long_description = strip_tags(trim($request->input('long_description')));
            $diseases_curable = strip_tags(trim($request->input('diseases_curable')));
            $mrp = strip_tags(trim($request->input('mrp')));
            $price = strip_tags(trim($request->input('price')));
            $discount = strip_tags(trim($request->input('discount')));
            $gst_rate = strip_tags(trim($request->input('gst_rate')));
            $status = strip_tags(trim($request->input('status')));
            $randomNumber = $this->generateUniqueNumber();

            $product = Product::create([
                'title' => $title,
                'slug' => $slug,
                'category_id' => $category_id,
                'subcategory_id' => $subcategory_id,
                'short_description' => $short_description,
                'long_description' => $long_description,
                'diseases_curable' => $diseases_curable,
                'mrp' => $mrp,
                'price' => $price,
                'discount' => $discount,
                'hsn_code' => $randomNumber,
                'gst_rate' => $gst_rate,
                'status' => $status,
            ]);
            
        
            // Handle images
            $images = $request->file('images');
            $imagePaths = [];
                 
            if ($request->hasFile('images')) {
                foreach ($images as $image) {
                    // Get the original name of the file
                    $originalName = $image->getClientOriginalName();
            
                    // Append current date and time to the original name
                    $fileName = date('YmdHis') . '_' . $originalName;
            
                    // Save the image to storage and get the path
                    $path = $image->storeAs('product_images', $fileName, 'public');
                    $imagePaths[] = $path;
            
                    // Save the image data to ProductImage model
                    $insertImage = Productimage::create([
                        'product_id' => $product->id,
                        'image' => $path,
                    ]);
                }
            }
     
            return redirect()->back()->with('success', 'Product created successfully.');
        } catch (ValidationException $e) {
             return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Error creating Product. Please try again.')->withInput();
        }
    }
  
    
    
}
