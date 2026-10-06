<div class="field">
    <label for="question">Question</label>
    <input type="text" id="question" name="question" value="{{ old('question', $faq->question ?? '') }}" required>
    @error('question')<div class="error">{{ $message }}</div>@enderror
</div>

<div class="field">
    <label for="answer">Answer</label>
    <textarea id="answer" name="answer" rows="5">{{ old('answer', $faq->answer ?? '') }}</textarea>
    @error('answer')<div class="error">{{ $message }}</div>@enderror
</div>

<div class="field">
    <label for="sort_order">Order</label>
    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $faq->sort_order ?? 0) }}">
    <div class="hint">Lower numbers appear first.</div>
</div>
