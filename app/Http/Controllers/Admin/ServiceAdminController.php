<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceAdminController extends Controller
{
    public function index(): View
    {
        $services = Service::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = $this->uniqueSlug($data['title']);

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service added.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(StoreServiceRequest $request, Service $service): RedirectResponse
    {
        $data = $request->validated();

        if ($service->title !== $data['title']) {
            $data['slug'] = $this->uniqueSlug($data['title'], $service->id);
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service removed.');
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 2;

        while (Service::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $original.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
