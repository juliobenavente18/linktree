<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        $backgroundColor = $user->background_color;
        $textColor = $user->text_color;
        $titleColor = $user->title_color;

        $user->load('links');

        return view('admin.users.show', [
            'user' => $user,
            'backgroundColor' => $backgroundColor,
            'textColor' => $textColor,
            'titleColor' => $titleColor,
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
            'title_color' => 'required|size:7|starts_with:#'
        ]);

        Auth::user()->update($request->only(['background_color', 'text_color', 'title_color']));

        return redirect()->route('admin.links.index')
            ->with(['success' => 'Changes saved successfully!']);
    }
}
