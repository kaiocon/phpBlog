@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>
                <div class="card-body">
                    <form action="{{ route('updatePost', ['blogPost_id' => $blogPost->id]) }}" method="post">
					   {{ csrf_field() }}
                        <div class="form-group">
                            <label for="postTitle">Title</label>
                            <input type="text" class="form-control" placeholder="Post title" name="postTitle" value="{{ $blogPost->postTitle }}" required>
                        </div>
						<div class="form-group">
                            <label for="postSummary">Summary</label>
                            <input type="text" class="form-control" placeholder="Post Summary" name="postSummary" value="{{ $blogPost->postSummary }}" required>
                        </div>
                        <div class="form-group">
                            <label for="postBody">Post Body</label>
                            <textarea class="form-control" rows="5" name="postBody" required>{{ $blogPost->postBody }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection