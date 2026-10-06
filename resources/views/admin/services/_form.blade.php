<div class="field">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $service->title ?? '') }}" required>
    @error('title')<div class="error">{{ $message }}</div>@enderror
</div>

<div class="field">
    <label for="summary">Summary</label>
    <input type="text" id="summary" name="summary" value="{{ old('summary', $service->summary ?? '') }}">
    <div class="hint">A short one-line description shown on the services list.</div>
</div>

<div class="field">
    <label for="what_is">What is it?</label>
    <textarea id="what_is" name="what_is" rows="3">{{ old('what_is', $service->what_is ?? '') }}</textarea>
</div>

<div class="field">
    <label for="who_for">Who is it for?</label>
    <textarea id="who_for" name="who_for" rows="3">{{ old('who_for', $service->who_for ?? '') }}</textarea>
</div>

<div class="field">
    <label for="what_happens">What happens during a session?</label>
    <textarea id="what_happens" name="what_happens" rows="3">{{ old('what_happens', $service->what_happens ?? '') }}</textarea>
</div>

<div class="field">
    <label for="duration">Duration</label>
    <input type="text" id="duration" name="duration" value="{{ old('duration', $service->duration ?? '') }}" placeholder="e.g. 60 minutes">
</div>

<div class="field">
    <label for="sort_order">Order</label>
    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $service->sort_order ?? 0) }}">
    <div class="hint">Lower numbers appear first.</div>
</div>
