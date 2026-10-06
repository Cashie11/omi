<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Faq;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\TeachingTopic;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $gallery = GalleryImage::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->limit(6)
            ->get();

        $services = Service::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->limit(6)
            ->get();

        $topics = TeachingTopic::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $faqs = Faq::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->limit(5)
            ->get();

        $consultants = Consultant::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('home', compact('gallery', 'services', 'topics', 'faqs', 'consultants'));
    }
}
