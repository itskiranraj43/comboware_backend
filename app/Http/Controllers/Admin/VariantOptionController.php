<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Variants_names;
use App\VariantOptions;
use Illuminate\Support\Facades\Gate;

class VariantOptionController extends Controller
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
        $VariantOptions =   DB::table('variant_options')
        ->join('variants_names', 'variant_options.variant_id', '=', 'variants_names.id')
        ->select('variant_options.*', 'variants_names.name as Vname' )
        ->get();

        return view('admin.variantOption.index', compact('VariantOptions'));
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
            $variants_names = Variants_names::get();
    
        return view('admin.variantOption.create', compact('variants_names'));
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
        VariantOptions::create($request->all());

        return redirect()->route('admin.variantOption.index');
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
     
         $variants_names =   DB::table('variant_options')
         ->join('variants_names', 'variant_options.variant_id', '=', 'variants_names.id')
         ->where('variant_options.id','=',$id)
         ->select('variant_options.*', 'variants_names.name as Vname' )
         ->first();

        return view('admin.variantOption.show', compact('variants_names'));
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
        $variants_names = Variants_names::get();
        $VariantOptions =  VariantOptions::where('id','=',$id)->first();
        return view('admin.variantOption.edit', compact('VariantOptions', 'variants_names'));
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
        $VariantOptions = VariantOptions::find($id);
        $VariantOptions->name  = $_REQUEST['name'];
        $VariantOptions->variant_id = $_REQUEST['variant_id'];
        $VariantOptions->save();

        return redirect()->route('admin.variantOption.index');
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
        $VariantOptions = VariantOptions::find($id);
        $VariantOptions->delete();

        return redirect()->route('admin.variantOption.index');
    }
}
