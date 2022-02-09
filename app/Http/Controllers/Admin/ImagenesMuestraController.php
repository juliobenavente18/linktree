<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImagenesMuestra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenesMuestraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:admin.imagenes.index')->only('index');
        $this->middleware('can:admin.imagenes.create')->only('create');
        $this->middleware('can:admin.imagenes.edit')->only('edit', 'update');
    }
    public function index()
    {
        $imagenesmuestra=ImagenesMuestra::all();
        return view('admin.imagenes.index', compact('imagenesmuestra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.imagenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|image|max:2048'
        ]);
        // $imagenesmuestra = $request->all();
        // if ($imagen  = $request->file('url')) {
        //     $rutaGuardarImg = 'imagen/';
        //     $imagenfondo = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
        //     $imagen->move($rutaGuardarImg, $imagenfondo);
        //     $imagenesmuestra['url'] = "$imagenfondo";
        // }

        // ImagenesMuestra::create($imagenesmuestra);

        $imagenesmuestra = $request->file('url')->store('public/imagenes');
        $url = Storage::url($imagenesmuestra);
        ImagenesMuestra::create([
            'url'=>$url,
        ]);
        
        return redirect()->route('admin.imagenes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagenesmuestra = ImagenesMuestra::find($id);
        $imagenesmuestra->delete();
        return redirect()->route('admin.imagenes.index');
    }
}
