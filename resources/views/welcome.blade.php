@extends('layouts.app')

@section('content')
            <div class="container">
                <h1 class="display-4 text-center">Laravel - Blog</h1>
				 <div class="row justify-content-center">
				  <div class="col-md-8">
					@foreach($blogPosts as $blogPost)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blogPost->postTitle }}</h5>
                            <p class="card-text">
                                {{ $blogPost->postBody }}
                            </p>
                            <p class="card-text"><small class="text-muted">{{ $blogPost->postTime}}</small></p>
                        </div>
                    </div>
					@endforeach
				</div>
			   </div>
			</div>
    </body>
</html>

@endsection