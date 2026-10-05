<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\GalleryImage;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GalleryAdminController extends Controller
{
    public function __construct(private ImageService $images)
    {
        //
    }

    public function index(): View
    {
        $images = GalleryImage::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.gallery.index', compact('images'));
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function store(StoreGalleryRequest $request): RedirectResponse
    {
        $data = $request->only(['caption', 'sort_order']);
        $data['path'] = $this->images->store($request->file('image'), 'gallery');

        GalleryImage::create($data);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Image uploaded.');
    }

    public function edit(GalleryImage $image): View
    {
        return view('admin.gallery.edit', compact('image'));
    }

    public function update(UpdateGalleryRequest $request, GalleryImage $image): RedirectResponse
    {
        $data = $request->only(['caption', 'sort_order']);

        if ($request->hasFile('image')) {
            $this->images->delete($image->path);
            $data['path'] = $this->images->store($request->file('image'), 'gallery');
        }

        $image->update($data);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Image updated.');
    }

    public function destroy(GalleryImage $image): RedirectResponse
    {
        $this->images->delete($image->path);
        $image->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Image deleted.');
    }
}
