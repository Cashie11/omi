<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachingTopicRequest;
use App\Models\TeachingTopic;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TeachingAdminController extends Controller
{
    public function index(): View
    {
        $topics = TeachingTopic::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.teachings.index', compact('topics'));
    }

    public function create(): View
    {
        return view('admin.teachings.create');
    }

    public function store(StoreTeachingTopicRequest $request): RedirectResponse
    {
        TeachingTopic::create($request->validated());

        return redirect()->route('admin.teachings.index')->with('success', 'Topic added.');
    }

    public function edit(TeachingTopic $topic): View
    {
        return view('admin.teachings.edit', compact('topic'));
    }

    public function update(StoreTeachingTopicRequest $request, TeachingTopic $topic): RedirectResponse
    {
        $topic->update($request->validated());

        return redirect()->route('admin.teachings.index')->with('success', 'Topic updated.');
    }

    public function destroy(TeachingTopic $topic): RedirectResponse
    {
        $topic->delete();

        return redirect()->route('admin.teachings.index')->with('success', 'Topic removed.');
    }
}
