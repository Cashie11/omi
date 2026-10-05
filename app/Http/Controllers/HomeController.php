<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
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

        return view('home', compact('gallery'));
    }
}
