<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Productreview;
use App\Models\Productimage;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHelper;
use Illuminate\Validation\ValidationException;

class productController extends Controller
{

    public function viewProduct()
    {
        $products = Product::with('category', 'subcategory', 'reviews.reviewer')
            ->select(
                'products.id',
                'products.title',
                'products.short_description',
                'products.long_description',
                'products.diseases_curable',
                'products.mrp',
                'products.price',
                'products.discount',
                'products.hsn_code',
                'products.gst_rate',
                'products.status',
                'products.category_id',
                'products.stock',
                'products.packing_size',
                'categories.title as category_name',
                'subcategories.title as subcategory_name'
                // Add other columns as needed
            )
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('productreviews', 'products.id', '=', 'productreviews.product_id')
            ->groupBy(
                'products.id',
                'products.title',
                'products.short_description',
                'products.long_description',
                'products.diseases_curable',
                'products.mrp',
                'products.price',
                'products.discount',
                'products.hsn_code',
                'products.gst_rate',
                'products.status',
                'products.category_id',
                'products.stock',
                'products.packing_size',
                'categories.title',
                'subcategories.title'
            )
            ->get();


        return view('admin.pages.product.view-product', ['productData' => $products]);
    }

    protected function generateUniqueNumber()
    {
        // Generate a unique ID based on the current timestamp
        $uniqueId = uniqid();

        // Extract the last 10 characters to get a 10-digit string
        $tenDigitNumber = substr($uniqueId, -10);

        return $tenDigitNumber;
    }

    public function createProduct()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.pages.product.create-product', ['data' => $categories]);
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
            $stock = strip_tags(trim($request->input('stock')));
            $packingsize = strip_tags(trim($request->input('packing_size')));
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
                'stock' => $stock,
                'packing_size' => $packingsize,
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
