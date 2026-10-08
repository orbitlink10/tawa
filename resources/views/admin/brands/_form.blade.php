@php
    $brand = $brand ?? null;
@endphp

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm border-0">
    @csrf
    @if(($method ?? 'POST') !== 'POST')
        @method($method)
    @endif

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $brand->name ?? '') }}"
                   placeholder="e.g. MikroTik" required>
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug"
                   class="form-control @error('slug') is-invalid @enderror"
                   value="{{ old('slug', $brand->slug ?? '') }}"
                   placeholder="Leave blank to auto-generate from the name">
            @error('slug')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="short_description" class="form-label">Short Description</label>
        <textarea name="short_description" id="short_description" rows="2"
                  class="form-control @error('short_description') is-invalid @enderror"
                  placeholder="A one-line summary shown in listings">{{ old('short_description', $brand->short_description ?? '') }}</textarea>
        @error('short_description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" rows="6"
                  class="form-control @error('description') is-invalid @enderror"
                  placeholder="Full brand content">{{ old('description', $brand->description ?? '') }}</textarea>
        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" name="meta_title" id="meta_title"
                   class="form-control @error('meta_title') is-invalid @enderror"
                   value="{{ old('meta_title', $brand->meta_title ?? '') }}"
                   placeholder="SEO page title">
            @error('meta_title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea name="meta_description" id="meta_description" rows="2"
                      class="form-control @error('meta_description') is-invalid @enderror"
                      placeholder="SEO meta description">{{ old('meta_description', $brand->meta_description ?? '') }}</textarea>
            @error('meta_description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>

    @if($brand && $brand->logo)
        <div class="mb-3">
            <label class="form-label d-block">Current Image</label>
            <img src="{{ $brand->logo }}" alt="{{ $brand->name }}" class="img-thumbnail"
                 style="max-width: 160px; max-height: 140px; object-fit: contain;">
        </div>
    @endif

    <div class="mb-3">
        <label for="logo" class="form-label">Brand Image / Logo</label>
        <input type="file" name="logo" id="logo" accept="image/*"
               class="form-control @error('logo') is-invalid @enderror">
        <small class="text-muted">PNG, JPG, GIF, WEBP or SVG. Max 4 MB. If no logo is set, the frontend shows the brand's latest product image.</small>
        @error('logo')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
               {{ old('is_active', $brand->is_active ?? true) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_active">Active (visible on the website)</label>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="noindex" id="noindex" value="1"
               {{ old('noindex', $brand->noindex ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="noindex">Hide from search engines (noindex)</label>
    </div>

    <div class="text-end">
        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary me-2">Cancel</a>
        <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/tinymce@6.4.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#description',
        plugins: 'image link lists media table code wordcount fullscreen',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image media | code fullscreen',
        menubar: 'file edit view insert format tools table help',
        height: 420,
        branding: false,
        file_picker_types: 'image',
        automatic_uploads: true,
        image_title: true,
        promotion: false,
        file_picker_callback: function (cb, value, meta) {
            let input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
                let file = this.files[0];
                let reader = new FileReader();
                reader.onload = function () {
                    let id = 'blobid' + (new Date()).getTime();
                    let blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    let base64 = reader.result.split(',')[1];
                    let blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };
            input.click();
        },
    });
</script>
