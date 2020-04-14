@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
		@endif
			@if (session('redStatus'))
            <div class="alert alert-danger">
                {{ session('redStatus') }}
            </div>
		@endif
            <div class="card">
                <div class="card-header">User Management</div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created</th>
						<th scope="col"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
							<td>
								@if(Auth::user()->id != $user->id)
								<a href="{{ route('deleteUser', ['user_id' => $user->id]) }}" class="card-link btn btn-danger">Remove</a>
								@endif
							</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                </div>
            </div>
			<br/>
			<div class="card">
                <div class="card-header">New User</div>
                <div class="card-body">
                    <form action="{{ route('newUser') }}" method="post">
					   {{ csrf_field() }}
                        <div class="form-group">
                            <label for="userName">Name</label>
                            <input type="text" class="form-control" placeholder="Username" name="userName" required>
                        </div>
						<div class="form-group">
                            <label for="userEmail">Email</label>
                            <input type="text" class="form-control" placeholder="User Email" name="userEmail" required>
                        </div>
						<div class="form-group">
                            <label for="userPassword">Password</label>
                            <input type="password" class="form-control" name="userPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm</label>
                            <input type="password" class="form-control" name="confirmPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
