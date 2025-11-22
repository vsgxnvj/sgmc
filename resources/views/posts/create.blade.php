<!-- posts/create.blade.php -->
@extends('layouts.app')

@push('styles')
    <!-- Remove Quill CSS -->
    <!-- CKEditor 5 uses its own inline styles -->
@endpush

@section('content')
    <input type="hidden" name="content" id="content">

    <div class="container py-4">
        <div class="card shadow-sm border-0 p-4">
            <h2 class="fw-bold mb-4">Create New Post</h2>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Author</label>
                    <input type="text" name="author" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Category</label>
                        <input type="text" name="category" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Tags (comma separated)</label>
                        <input type="text" name="tags" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Content</label>
                        <textarea name="content_editor" id="editor" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="content" id="post_content_hidden">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-success px-4 mt-2">Publish Post</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- CKEditor 5 Classic Build -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}"
                },
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'toggleImageCaption',
                        'imageStyle:inline',
                        'imageStyle:block',
                        'imageStyle:side',
                        'imageStyle:alignLeft', // Optional, if using Classic Editor
                        'imageStyle:alignRight' // Optional, if using Classic Editor
                    ],



                },

                // Updated Toolbar Configuration
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'link', '|',
                    'alignment', '|',
                    'bulletedList', 'numberedList', 'blockQuote', '|',
                    'insertTable', 'undo', 'redo',
                    // imageUpload handles the file upload button
                    'imageUpload',
                    // Resizing is often automatically added with the image feature,
                    // but these styles help with alignment/flow
                    'imageStyle:full', 'imageStyle:side'
                ]
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    // Change #content to #post_content_hidden
                    document.querySelector('#post_content_hidden').value = editor.getData();
                });
            })
            .catch(error => console.error(error));
    </script>
@endpush
