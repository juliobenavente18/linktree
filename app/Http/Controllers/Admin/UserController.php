<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        $backgroundColor = $user->background_color;
        $textColor = $user->text_color;
        $titleColor = $user->title_color;
        $titulo = $user->titulo;
        $imagen = $user->imagen;
        $fuente = $user->fuente;
        $size_titulo = $user->size_titulo;
        $size_links = $user->size_links;


        $user->load('links');

        return view('admin.users.show', [
            'user' => $user,
            'backgroundColor' => $backgroundColor,
            'textColor' => $textColor,
            'titleColor' => $titleColor,
            'titulo' => $titulo,
            'imagen' => $imagen,
            'fuente' => $fuente,
            'size_titulo' => $size_titulo,
            'size_links' => $size_links

        ]);
    }

    public function edit()
    {
        return view('admin.users.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'background_color' => 'required|size:7|starts_with:#',
            'text_color' => 'required|size:7|starts_with:#',
            'title_color' => 'required|size:7|starts_with:#',
            'titulo' => 'required',
            'fuente' => 'required',
            'size_titulo' => 'required',
            'size_links' => 'required'
        ]);

        if ($request->hasFile('imagen')) {
            
            
            $imagen = $request->file('imagen')->store('public/imagenes');
            $url = Storage::url($imagen);
            Auth::user()->update(['imagen' => $url]);
            Auth::user()->update($request->only(['background_color', 'text_color', 'title_color', 'titulo', 'fuente', 'size_titulo', 'size_links']));
            return redirect()->route('admin.links.index', compact('url'))
                ->with(['success' => 'Changes saved successfully!']);
        } else {
            Auth::user()->update(['imagen' => null]);
            Auth::user()->update($request->only(['background_color', 'text_color', 'title_color', 'titulo', 'fuente', 'size_titulo', 'size_links']));
            return redirect()->route('admin.links.index')
                ->with(['success' => 'Changes saved successfully!']);
        }
    }
}
