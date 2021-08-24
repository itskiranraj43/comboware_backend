<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Category;
use App\SubCategory;
use App\Product;
use App\ProductImage;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $ProductData =   DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('sub_categories', 'products.category_id', '=', 'sub_categories.id')
        ->select('sub_categories.name as ScName', 'categories.name as Cname','products.*')
        ->get();
        // echo"<pre>";
        // print_r($ProductData);
        // exit;

        return view('admin.product.index', compact('ProductData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $categories = Category::all();
        // $ProductData = Product::all();
        $subCategories = SubCategory::all();
        return view('admin.product.create', compact('subCategories','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
      
        $Product = new Product ;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $name_img = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('/Product-Image/'), $name_img);  
            $Product->image = $name_img; 
        }
        if($request->hasfile('filenames'))
        {
           foreach($request->file('filenames') as $file)
           {
               $name = time().rand(1,100).'.'.$file->extension();
               $file->move(public_path('/Product-Image/'), $name);  
               $files[] = $name;  
           }
        }
     
        $Product->name = $request->get('name');
        $Product->category_id = $request->get('category_id');
        $Product->subCategory_id = $request->get('subCategory_id');
        $Product->description = $request->get('description');
        $Product->amount = $request->get('amount');
        $Product->save();

        if (isset($files) && count($files) > 0) {
            foreach($files as $img_file){
                $Product_img = new ProductImage ;
                $Product_img->name =  $img_file;
                $Product_img->product_id = $Product->id;
                $Product_img->save();
            }
        }
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $ProductData =   DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('sub_categories', 'products.category_id', '=', 'sub_categories.id')
        ->where('products.id','=',$id)
        ->select('sub_categories.name as ScName', 'categories.name as Cname','products.*')
        ->first();

        return view('admin.product.show', compact('ProductData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $categories = Category::all();
        $ProductData = Product::where('id','=',$id)->first();
        $subCategories = SubCategory::all();
        $ProductImages = ProductImage::where('product_id','=',$id)->get();
      
        return view('admin.product.edit', compact('ProductData','subCategories','categories','ProductImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }

        $Product = Product::find($id);
        if($request->hasfile('image'))
        {
            $img = $Product->image;
            $path = public_path('Product-Image/').$img;
            unlink($path);

            $image = $request->file('image');
            $name_img = time().rand(1,100).'.'.$image->extension();
            $image->move(public_path('/Product-Image/'), $name_img);  
            $Product->image = $name_img; 
        }

        $Product->name = $request->get('name');
        $Product->category_id = $request->get('category_id');
        $Product->subCategory_id = $request->get('subCategory_id');
        $Product->description = $request->get('description');
        $Product->amount = $request->get('amount');
        $Product->save();

        if($request->hasfile('filenames'))
        {
           // $Product->id;
           foreach($request->file('filenames') as $file)
           {
               $name = time().rand(1,100).'.'.$file->extension();
               $file->move(public_path('/Product-Image/'), $name);  
               $files[] = $name;  
           }
            foreach($files as $img_file){
                $Product_img = new ProductImage ;
                $Product_img->name =  $img_file;
                $Product_img->product_id = $Product->id;
                $Product_img->save();
            }
    }
        return redirect()->route('admin.product.index');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $Product = Product::find($id);
        $img = $Product->image;
        $path = public_path('Product-Image/').$img;
        unlink($path);

       $ProductImage = ProductImage::where('product_id','=',$id)->get();
            foreach($ProductImage as $pro_img){
                $path = public_path('Product-Image/').$pro_img->name;
                unlink($path);
                $pro_img -> delete();
            }
        $Product->delete();
        return redirect()->route('admin.product.index');
    }

    public function ImageDelete(Request $request , $id)
    {
        $ProductImage = ProductImage::find($id);
        $img = $ProductImage->name;
        $path = public_path('Product-Image/').$img;
        unlink($path);
        $ProductImage->delete();
        return response()->json(['success'=>'Image is successfully Deleted']);
    }
}
