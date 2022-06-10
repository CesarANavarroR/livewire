<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QRController extends Controller
{
    public function index()
    {
        return view('admin.qr.index');
    }
    public function show($id){
        $table = Table::all()->where('slug',$id)->first();
        return response()->download(public_path('storage\\'.$table->image));
    }
}
