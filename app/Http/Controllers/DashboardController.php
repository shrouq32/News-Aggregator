<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Services\NewsService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index()
    {
        $topics = Topic::all();
        $userTopics = auth()->user()->preferences ? auth()->user()->preferences->pluck('name')->toArray() : [];
        $articles = [];

        // Fetch articles for each user-selected topic
        foreach ($userTopics as $topic) {
            $fetchedArticles = $this->newsService->getNewsByTopic($topic);
            $articles = array_merge($articles, $fetchedArticles);
        }

        return view('dashboard', compact('articles', 'topics'));
    }

    public function savePreferences(Request $request)
    {
        $request->validate(['topics' => 'required|array']);
        auth()->user()->preferences()->sync($request->topics);

        return redirect()->back()->with('status', 'Preferences updated!');
    }
}
