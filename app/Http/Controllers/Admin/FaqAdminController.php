<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFaqRequest;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FaqAdminController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(): View
    {
        return view('admin.faqs.create');
    }

    public function store(StoreFaqRequest $request): RedirectResponse
    {
        Faq::create($request->validated());

        return redirect()->route('admin.faqs.index')->with('success', 'Question added.');
    }

    public function edit(Faq $faq): View
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(StoreFaqRequest $request, Faq $faq): RedirectResponse
    {
        $faq->update($request->validated());

        return redirect()->route('admin.faqs.index')->with('success', 'Question updated.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'Question removed.');
    }
}
