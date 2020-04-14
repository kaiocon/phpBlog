@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Post</div>
                <div class="card-body">
                    <form action="{{ route('newPost') }}" method="post" enctype="multipart/form-data">
					   {{ csrf_field() }}
                        <div class="form-group">
                            <label for="postTitle">Title</label>
                            <input type="text" class="form-control" placeholder="Post title" name="postTitle" required>
                        </div>
						<div class="form-group">
                            <label for="postSummary">Summary</label>
                            <input type="text" class="form-control" placeholder="Post Summary" name="postSummary" required>
                        </div>
						<div class="form-group">
                            <label for="postImage">Banner</label>
                            <input type="file" class="form-control" name="postImage">
                        </div>
                        <div class="form-group">
                            <label for="postBody">Post Body</label>
                            <textarea class="form-control postBody" rows="5" name="postBody"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
