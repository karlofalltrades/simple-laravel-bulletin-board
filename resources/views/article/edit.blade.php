<!-- resources/views/articles/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Article') }}</div>

                <div class="card-body">
                    <form action="{{ route('article.update', ['article' => $article]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Article Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Article Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $article->content }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
