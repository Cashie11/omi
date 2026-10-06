<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('services.index', compact('services'));
    }

    public function show(Service $service): View
    {
        return view('services.show', compact('service'));
    }
}
