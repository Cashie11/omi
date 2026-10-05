<div class="field">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $consultant->name ?? '') }}" required>
    @error('name')<div class="error">{{ $message }}</div>@enderror
</div>

<div class="field">
    <label for="bio">Short biography</label>
    <textarea id="bio" name="bio" rows="6">{{ old('bio', $consultant->bio ?? '') }}</textarea>
    <div class="hint">A few short sentences about this consultant. Leave blank if you are not ready yet.</div>
    @error('bio')<div class="error">{{ $message }}</div>@enderror
</div>

<div class="field">
    <label for="sort_order">Order</label>
    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $consultant->sort_order ?? 0) }}">
    <div class="hint">Lower numbers appear first.</div>
    @error('sort_order')<div class="error">{{ $message }}</div>@enderror
</div>

<div class="field">
    <label for="photo">Photo</label>
    @if (! empty($consultant->photo))
        <p style="margin: 0 0 0.75rem;">
            <img src="{{ asset($consultant->photo) }}" alt="Current photo" class="thumb" style="width:110px; height:110px;">
        </p>
    @endif
    <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.webp">
    <div class="hint">JPG, PNG, or WebP only. Maximum 5MB. Images are resized and compressed automatically.</div>
    @error('photo')<div class="error">{{ $message }}</div>@enderror
</div>
