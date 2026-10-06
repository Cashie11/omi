<?php

namespace App\Http\Controllers;

use App\Models\TeachingTopic;
use Illuminate\View\View;

class TeachingController extends Controller
{
    public function index(): View
    {
        $topics = TeachingTopic::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('teachings', compact('topics'));
    }
}
