<div class="form-group">
    <label>H1 Title</label>
    <input type="text" name="h1_title" class="form-control" value="{{ old('h1_title', $slider->h1_title ?? '') }}">
</div>
<div class="form-group">
    <label>H2 Title</label>
    <input type="text" name="h2_title" class="form-control" value="{{ old('h2_title', $slider->h2_title ?? '') }}">
</div>
<div class="form-group">
    <label>H4 Title</label>
    <input type="text" name="h4_title" class="form-control" value="{{ old('h4_title', $slider->h4_title ?? '') }}">
</div>
<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $slider->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Button URL</label>
    <input type="text" name="button_url" class="form-control" value="{{ old('button_url', $slider->button_url ?? '') }}">
</div>
<div class="form-group">
    <label>Button Text</label>
    <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $slider->button_text ?? '') }}">
</div>
<div class="form-group">
    <label>Image URL</label>
    <input type="text" name="img_url" class="form-control" value="{{ old('img_url', $slider->img_url ?? '') }}">
</div>
