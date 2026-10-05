<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\View\View;

class ConsultantController extends Controller
{
    public function index(): View
    {
        $consultants = Consultant::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('consultants', compact('consultants'));
    }
}
