<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:admin.links.index')->only('index');
        $this->middleware('can:admin.links.create')->only('create');
        $this->middleware('can:admin.links.edit')->only('edit', 'update');
    }
    public function index()
    {
        $links = Auth::user()->links()
            ->withCount('visits')
            ->with('latest_visit')
            ->get();

        return view('admin.links.index', [
            'links' => $links
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.links.create');
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
            'name' => 'required',
            'link' => 'required|url'
        ]);

        $link = Auth::user()->links()
            ->create($request->only(['name', 'link']));

        if ($link) {
            return redirect()->route('admin.links.index');
        }

        return redirect()->back();
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
    public function edit(Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(404);
        }

        return view('admin.links.edit', [
            'link' => $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Link $link, Request $request)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required',
            'link' => 'required|url'
        ]);

        $link->update($request->only(['name', 'link']));

        return redirect()->route('admin.links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link, Request $request)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(403);
        }

        $link->delete();

        return redirect()->route('admin.links.index');
    }
}
