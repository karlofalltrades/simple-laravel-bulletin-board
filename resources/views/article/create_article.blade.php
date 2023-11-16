
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Article') }}</div>

                <div class="card-body">
                    <form action="/article" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Article Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Article Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
