<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Saucer;
use App\Models\Saucer_Type;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categorys.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = $request->validate([
            'name' => 'required|min:3|max:50',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $url = Storage::put('categorys',$file);
        $newUser['image_url'] = $url;
        $newUser['image_name'] = $name;
        Saucer_Type::create($newUser);
        return redirect('categorys');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Saucer_Type $category)
    {
        return view('admin.categorys.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Saucer_Type $category)
    {
        return view('admin.categorys.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saucer_Type $category)
    {
        $newUser = $request->validate([
            'name' => 'required|min:3|max:50',
            'image' => 'image'
        ]);
        if($file = $request->file('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $url = Storage::put('categorys',$file);
            $newUser['image_url'] = $url;
            $newUser['image_name'] = $name;
        }
        $category->update($newUser);
        return redirect('categorys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saucer_Type $category)
    {
        Saucer_Type::where('id',$category->id)->delete();
        return view('admin.categorys.index');
    }
}