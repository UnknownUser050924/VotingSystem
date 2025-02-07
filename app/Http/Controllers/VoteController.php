<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|in:apple,orange,pineapple,watermelon,mango',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Vote::create([
            'subject' => $request->subject,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Your vote has been submitted.');
    }

    public function showResults()
    {
        // Get vote counts grouped by subject
        $votes = \App\Models\Vote::selectRaw('subject, COUNT(*) as total')
            ->groupBy('subject')
            ->pluck('total', 'subject');
    
        return view('vote_results', compact('votes'));
    }

    public function showRatings()
    {
        // Get the average rating for each subject
        $ratings = Vote::selectRaw('subject, AVG(rating) as avg_rating')
            ->groupBy('subject')
            ->get()
            ->pluck('avg_rating', 'subject'); // Pluck average rating for each subject
    
        return view('vote_ratings', compact('ratings'));
    }      
}

