<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::latest()->paginate(3);

        $recentNews = News::latest()->take(5)->get();

        $socialLinks = SocialLink::all();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json($recentNews);
        }

        return view('news.index', compact('news', 'socialLinks', 'recentNews'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->incrementView();

        $recentNews = News::latest()->take(5)->get();
        $socialLinks = SocialLink::all();

        return view('news.show', compact('newsItem', 'socialLinks', 'recentNews'));
    }
}
