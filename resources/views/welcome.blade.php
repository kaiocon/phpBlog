@extends('layouts.app')

@section('content')
            <div class="container">
                <h1 class="display-4 text-center">Laravel - Blog</h1>
				 <div class="row justify-content-center">
				  <div class="col-md-8">
				  
				  	@if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
					@endif
					
					@foreach($blogPosts as $blogPost)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $blogPost->postTitle }}</h2>
							<h5 class="card-subtitle mb-2 text-muted">{{ $blogPost->postSummary }}</h5>
                            <p class="card-text">
                                {{ $blogPost->postBody }}
                            </p>
                            <p class="card-text"><small class="text-muted">{{ $blogPost->postTime}}</small></p>
                        	@if (Auth::check())
						<a href="{{ route('editPost', ['blogPost_id' => $blogPost->id]) }}" class="card-link btn btn-primary" >Edit</a>
						<a href="{{ route('deletePost', ['blogPost_id' => $blogPost->id]) }}" class="card-link btn btn-danger" >Remove</a>
						@endif
						</div>
                    </div>
					@endforeach
				</div>
			   </div>
			</div>
    </body>
</html>

@endsection