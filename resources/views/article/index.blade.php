<!-- resources/views/articles/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bulletin Board') }}</div>

                <div class="card-body">
                    <!-- Bulletin Board Layout Goes Here -->
                    <main>
                        <div class="mb-3">
                            <a href="{{ route('article.create') }}" class="btn btn-primary">Create New Article</a>
                        </div>

                        @foreach($articles as $article)
                            <div class="post mt-4 mb-4 p-3 bg-white rounded">
                                <h2 class="mb-3">{{ $article->title }}</h2>
                                <p class="mb-3">{{ Str::limit($article->content, 150, '...') }}</p>
                                <div class="post-footer d-flex justify-content-between">
                                    <span class="text-muted">Posted on: {{ $article->created_at->format('F d, Y') }}</span>
                                    <span class="text-muted">Author: {{ $article->user->name }}</span>
                                    <a href="{{ route('article.show',  ['article' => $article]) }}" class="btn btn-sm btn-primary">View Details</a>

                                    <!-- Delete Button Triggering Modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $article->id }}">
                                        Delete
                                    </button>


                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $article->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                           <div class="modal-content">
                                              <div class="modal-header">
                                                 <h5 class="modal-title" id="deleteModalLabel">Delete Article</h5>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                 Are you sure you want to delete this article?
                                              </div>
                                              <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                 <form action="{{ route('article.delete', ['article' => $article]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                 </form>
                                              </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
