<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::where('is_public',1)
                                ->orWhere('user_id',Auth::user()->id)
                                ->orderBy('created_at','desc')
                                ->paginate(17);
        //dd($pages);
        return view('Admin.Pages.index',['pages'=> $pages]); 
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Page();
        $p->page_title = $request->page_title;
        $p->user_id = Auth::user()->id;
        $p->is_public = isset($request->is_public[0])?1:0;
        $p->page_slug = $request->page_slug;
        $p->page_summary = $request->page_summary;
        $p->page_body = $request->page_body;
        $p->save();
        return redirect("admin/pages")->with(Session::flash('success','your page has been created!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('Admin.Pages.edit')->with(['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $p = Page::findOrFail($id);
        $p->user_id = Auth::user()->id;
        $p->page_slug = $request->page_slug;
        $p->is_public = isset($request->is_public[0])?1:0;
        $p->page_slug = $request->page_slug;
        $p->page_summary = $request->page_summary;
        $p->page_body = $request->page_body;
        $p->updated_at = Carbon::now();
        $p->save();
        return redirect('admin/pages')->with(Session::flash('warning','your page has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
        $page->delete();
        return redirect('admin/pages')->with(Session::flash('success','your page has been remove!'));
    }
}
