@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit REJ. DEPARTMENT</h4>
                   <form action="{{ route('admin.departments.update', $id) }}" class="form-sample" method="post" enctype='multipart/form-data'>
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">
											 <div class="col-md-12">
							<div class="form-group row">
								<label for="name" class="col-md-3">REJ. DEPARTMENT</label>
								 <div class="col-md-9">
								<input type="text" class="form-control @error('name') is-invalid @enderror"
									id="title" name="name" value="{{ old('name',$department->name) }}">
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
								<label for="category" class="col-md-3">CATEGORIES</label>
								 <div class="col-md-9">
								<input type="text" class="form-control @error('category') is-invalid @enderror"
									id="category" name="category" value="{{ old('category',$department->category) }}">
								@error('category')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
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
