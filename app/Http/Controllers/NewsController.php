<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(5);
        $recentNews = News::latest()->take(5)->get();
        $socialLinks = SocialLink::all();

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

    public function search(Request $request)
    {
        $query = $request->get('query');

        $news = News::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->latest()
            ->take(10)
            ->get();

        return response()->json($news);
    }
}
