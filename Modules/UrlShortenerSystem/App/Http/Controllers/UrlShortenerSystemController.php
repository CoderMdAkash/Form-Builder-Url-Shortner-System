<?php

namespace Modules\UrlShortenerSystem\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\UrlShortenerSystem\App\Http\Requests\UrlStore;
use Modules\UrlShortenerSystem\App\Models\Url;
use Auth;
use Modules\UrlShortenerSystem\App\Models\UrlClickInfo;
use Str;

class UrlShortenerSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = Url::with('user')->latest()->get();

        return view('urlshortenersystem::urls.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('urlshortenersystem::urls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UrlStore $request): RedirectResponse
    {
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['title'] = Str::ucfirst($request->title);
        $data['original_url'] = $request->original_url;
        $data['shortened_url'] = Str::random(5);
        
        Url::create($data);

        return redirect(route('urls.index'));
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $url = Url::with('visitors')->findOrFail($id);

        return view('urlshortenersystem::urls.visitors', compact('url'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $url = Url::findOrFail($id);
        return view('urlshortenersystem::urls.edit', compact('url'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UrlStore $request, $id): RedirectResponse
    {
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['title'] = Str::ucfirst($request->title);
        $data['original_url'] = $request->original_url;
        $data['shortened_url'] = Str::random(5);
        
        Url::findOrFail($id)->update($data);

        return redirect(route('urls.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Url::findOrFail($id)->delete();

        return redirect()->route( 'urls.index')->with(['success' => 'Url Deleted']);
    }

    public function shortenLink(Request $request, $shortener_url)
    {
        $find = Url::where('shortened_url', $shortener_url)->firstOrFail();

        if($find){
            $find->increment('click_count');

            $url = new UrlClickInfo();
            $url->url_id = $find->id;
            $url->ip = $request->ip();
            $url->save();
        }

        return redirect($find->original_url);
    }
}
