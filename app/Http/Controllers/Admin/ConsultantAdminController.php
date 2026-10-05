<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsultantRequest;
use App\Models\Consultant;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ConsultantAdminController extends Controller
{
    public function __construct(private ImageService $images)
    {
        //
    }

    public function index(): View
    {
        $consultants = Consultant::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.consultants.index', compact('consultants'));
    }

    public function create(): View
    {
        return view('admin.consultants.create');
    }

    public function store(StoreConsultantRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->images->store($request->file('photo'), 'consultants');
        }

        Consultant::create($data);

        return redirect()
            ->route('admin.consultants.index')
            ->with('success', 'Consultant added.');
    }

    public function edit(Consultant $consultant): View
    {
        return view('admin.consultants.edit', compact('consultant'));
    }

    public function update(StoreConsultantRequest $request, Consultant $consultant): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $this->images->delete($consultant->photo);
            $data['photo'] = $this->images->store($request->file('photo'), 'consultants');
        }

        $consultant->update($data);

        return redirect()
            ->route('admin.consultants.index')
            ->with('success', 'Consultant updated.');
    }

    public function destroy(Consultant $consultant): RedirectResponse
    {
        $this->images->delete($consultant->photo);
        $consultant->delete();

        return redirect()
            ->route('admin.consultants.index')
            ->with('success', 'Consultant removed.');
    }

    public function removePhoto(Consultant $consultant): RedirectResponse
    {
        $this->images->delete($consultant->photo);
        $consultant->update(['photo' => null]);

        return back()->with('success', 'Photo removed.');
    }
}
