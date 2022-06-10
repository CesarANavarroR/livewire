<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Saucer;
use App\Models\Saucer_Type;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
 
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Saucer_Type::all();
        return view('admin.products.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newSaucer = $request->validate([
            'name'=>'required',
            'description' => 'required',
            'price'=>'required',
            'saucer_type_id' =>'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $url = Storage::put('products',$file);
        $newSaucer['image_url'] = $url;
        $newSaucer['image_name'] = $name;
        Saucer::create($newSaucer);
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Saucer $product)
    {
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Saucer $product)
    {
        $categorys = Saucer_Type::all();
        return view('admin.products.edit',compact('product','categorys'));
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
        $newSaucer = $request->validate([
            'name'=>'required',
            'description' => 'required',
            'price'=>'required',
            'saucer_type_id' =>'required',
            'image' => 'image'
        ]);
        if($request->file('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $url = Storage::put('products',$file);
            $newSaucer['image_url'] = $url;
            $newSaucer['image_name'] = $name;
        }
        $saucer = Saucer::where('id',$id)->first();
        $saucer->update($newSaucer);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($saucer)
    {
        Saucer::where('id',$saucer)->delete();
        return redirect('products');
    }
}
