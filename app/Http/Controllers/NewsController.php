<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $news = News::where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->latest()
                ->paginate(5);
        } else {
            $news = News::latest()->paginate(5);
        }

        $recentNews = News::latest()->take(5)->get();
        $socialLinks = SocialLink::all();

        return view('news.index', compact('news', 'socialLinks', 'recentNews'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        $recentNews = News::latest()->take(5)->get();
        $socialLinks = SocialLink::all();

        return view('news.show', compact('newsItem', 'socialLinks', 'recentNews'));
    }
}
