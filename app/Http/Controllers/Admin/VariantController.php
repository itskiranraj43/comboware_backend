<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Variants_names;
use Illuminate\Support\Facades\Gate;

class VariantController extends Controller
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
        $Variants = Variants_names::all();
        return view('admin.variant.index', compact('Variants'));
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
        return view('admin.variant.create');
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
        Variants_names::create($request->all());

        return redirect()->route('admin.variant.index');
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
         
            $Variants = Variants_names::where('id','=',$id)->first();
         
            return view('admin.variant.show', compact('Variants'));
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
        $Variants = Variants_names::where('id','=',$id)->first();
        return view('admin.variant.edit', compact('Variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if (! Gate::allows('admin')) {
            return abort(401);
        }
        $Variants_names = Variants_names::find($id);
        $Variants_names->name  = $_REQUEST['name'];
        $Variants_names->save();

        return redirect()->route('admin.variant.index');
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
        $Variants_names = Variants_names::find($id);
        $Variants_names->delete();
        return redirect()->route('admin.variant.index');
    }
}
