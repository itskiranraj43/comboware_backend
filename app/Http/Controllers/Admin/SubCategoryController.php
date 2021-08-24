<?php

namespace App\Http\Controllers\Admin;

use App\SubCategory;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Gate;

class SubCategoryController extends Controller
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
        $SubCategories =   DB::table('sub_categories')
        ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
        ->select('sub_categories.*', 'categories.name as Cname' )
        ->get();
     
        return view('admin.subCategory.index', compact('SubCategories'));
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
        $categories = Category::get();

        return view('admin.subCategory.create', compact('categories'));
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
        SubCategory::create($request->all());

        return redirect()->route('admin.subCategory.index');
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
       //  $SubCategory =  SubCategory::where('id','=',$id)->first();
         $SubCategory =   DB::table('sub_categories')
         ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
         ->where('sub_categories.id','=',$id)
         ->select('sub_categories.*', 'categories.name as Cname' )
         ->first();

        return view('admin.subCategory.show', compact('SubCategory'));
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
        $categories = Category::get();
        $SubCategory =  SubCategory::where('id','=',$id)->first();
        return view('admin.subCategory.edit', compact('SubCategory', 'categories'));
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
        $subCategory = SubCategory::find($id);
        $subCategory->name  = $_REQUEST['name'];
        $subCategory->category_id = $_REQUEST['category_id'];
        $subCategory->save();

        return redirect()->route('admin.subCategory.index');
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
        $subCategory = SubCategory::find($id);
        $subCategory->delete();

        return redirect()->route('admin.subCategory.index');
    }
}
