<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Display the page based on slugs
    public function show($slug1 = null, $slug2 = null, $slug3 = null, $slug4 = null)
    {
        $slugs = array_filter([$slug1, $slug2, $slug3, $slug4]);
        $page = null;

        foreach ($slugs as $currentSlug) {
            $page = Page::where('slug', $currentSlug)
                ->when($page, function ($query) use ($page) {
                    $query->where('parent_id', $page->id);
                })
                ->first();

            if (!$page) {
                abort(404);
            }
        }

        return view('pages.show', compact('page'));
    }

  
    public function index()
    {
        $pages = Page::with('children')->whereNull('parent_id')->get();
        return view('pages.index', compact('pages'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('pages.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ]);

        Page::create($request->all());
        return redirect()->route('pages.index');
    }

    public function edit(Page $page)
    {
        $pages = Page::all();
        return view('pages.edit', compact('page', 'pages'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ]);

        $page->update($request->all());
        return redirect()->route('pages.index');
    }

    public function destroy(Page $page)
    {
        
        $page->children()->delete(); 
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }
}
