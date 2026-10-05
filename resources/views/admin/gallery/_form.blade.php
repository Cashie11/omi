<div class="field">
    <label for="image">Image</label>
    @if (! empty($image->path))
        <p style="margin: 0 0 0.75rem;">
            <img src="{{ $image->url() }}" alt="Current image" style="width: 100%; max-width: 320px; border-radius: 8px;">
        </p>
    @endif
    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp" {{ empty($image) ? 'required' : '' }}>
    <div class="hint">JPG, PNG, or WebP only. Maximum 5MB. Images are resized and compressed automatically.</div>
    @error('image')<div class="error">{{ $message }}</div>@enderror
</div>

<div class="field">
    <label for="caption">Caption</label>
    <input type="text" id="caption" name="caption" value="{{ old('caption', $image->caption ?? '') }}">
    <div class="hint">Optional short caption shown under the image.</div>
    @error('caption')<div class="error">{{ $message }}</div>@enderror
</div>

<div class="field">
    <label for="sort_order">Order</label>
    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $image->sort_order ?? 0) }}">
    <div class="hint">Lower numbers appear first.</div>
    @error('sort_order')<div class="error">{{ $message }}</div>@enderror
</div>
