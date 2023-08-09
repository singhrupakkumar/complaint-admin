@extends('admin.layouts.app')

@section('content')
	

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
					<h2 class="card-title">Edit User</h4>
                   <form action="{{ route('admin.users.update', $id) }}" class="form-sample" method="post" enctype='multipart/form-data'>
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">
                             <div class="col-md-12">
			<div class="form-group row">
				<label for="name" class="col-md-2">Name</label>
				 <div class="col-md-10">
				<input type="text" class="form-control @error('name') is-invalid @enderror"
					id="title" name="name" value="{{ old('name',$user->name) }}">
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				 </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group row">
				<label for="email" class="col-md-2">Email</label>
				 <div class="col-md-10">
				<input type="email" class="form-control @error('email') is-invalid @enderror"
					id="email" name="email" value="{{ old('email',$user->email) }}">
				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				 </div>
			</div>
		</div>

		
		<div class="col-md-12">
			<div class="form-group row">
				<label for="phone" class="col-md-2">Mobile</label>
				 <div class="col-md-10">
				<input type="tel" class="form-control @error('phone') is-invalid @enderror"
					id="phone" name="phone" value="{{ old('phone',$user->phone) }}">
				@error('phone')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				 </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group row">
				<label for="phone" class="col-md-2">User Type</label>
				 <div class="col-md-10">
				 
					<select name="role_type" class="form-control">
						<option value="planner" @if($user->role_type=='planner') selected @endif >Planner</option>
						<option value="admin" @if($user->role_type=='admin') selected @endif >Admin</option>
					</select>
				
				 </div>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="form-group row">
				<label for="password" class="col-md-2">Password</label>
				 <div class="col-md-10">
				<input type="password" class="form-control @error('password') is-invalid @enderror"
					id="password" name="password">
				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				 </div>
			</div>
		</div>
		
		
		<div class="col-md-12">
			<div class="form-group row">
				<label for="is_email" class="col-md-3">Is Receive Email</label>
				 <div class="col-md-9">
				 <input type="checkbox" class="@error('is_email') is-invalid @enderror"
					id="is_email" name="is_email" value="1" @if($user->is_email==1) checked @endif >
				
				 </div>
			</div>
		</div>
		
                            </div>
                            

                        
                        <div class="float-right">
                          
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
