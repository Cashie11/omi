<div class="field">
    <label for="title">Topic</label>
    <input type="text" id="title" name="title" value="{{ old('title', $topic->title ?? '') }}" required>
    @error('title')<div class="error">{{ $message }}</div>@enderror
</div>

<div class="field">
    <label for="summary">Summary</label>
    <textarea id="summary" name="summary" rows="3">{{ old('summary', $topic->summary ?? '') }}</textarea>
    <div class="hint">A short description of this topic.</div>
</div>

<div class="field">
    <label for="sort_order">Order</label>
    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $topic->sort_order ?? 0) }}">
    <div class="hint">Lower numbers appear first.</div>
</div>
