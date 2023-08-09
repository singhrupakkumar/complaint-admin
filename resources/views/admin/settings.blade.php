@extends('admin.layouts.app')



@section('content')
    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">
						<h2 class="card-title">Settings</h4>
					 <div class="table-responsive">

                        <table class="table complain_datatable dataTable" id="userTable">

                            <thead>

                                <tr>

                                    <th id="userName" class="sorting">USER</th>

                                    <th>PASS</th>

                                    <th>Email</th>
									
									<th>Is Receive Email</th>

                                    <th>USR. TYPE</th>

                                    <th>MOBILE</th>
									
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>
					@if($alluser->isNotEmpty())
						@foreach($alluser as $key => $list)
							  <tr class="{{$key%2==0? 'even':'odd'}}">
								<td>{{$list->name}}</td>
								<td>********</td>
								<td>{{$list->email}}</td>
								<td>{{$list->is_email}}</td>
								<td>{{ucfirst($list->role_type)}}</td>
								<td>{{$list->phone}}</td>
								<td>
								  @if(Auth::user()->isAdmin())
								  <a href="{{route('admin.users.edit',$list->id)}}" class="btn btn-sm" title="Edit">
									<i class="mdi mdi-pencil"></i>
								  </a>
								  <a  onclick="deleteProductItems(this)" data-url ="{{route('admin.users.delete')}}" data-id="{{$list->id}}" class="btn btn-sm" title="Delete">
									<i class="mdi mdi-delete"></i>
								  </a>
								  @endif
								</td>
							  </tr>
					@endforeach
					@endif					
							  
							</tbody>

                        </table>
						
						
						
						<div class="col-md-12">

                                 <div class="form-group">
								  @if(Auth::user()->isAdmin())
									<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#addUserModal">ADD USER</button>
								 
		
								 @endif
								 </div>
						</div>	

                    </div>
					
					
					 <div class="table-responsive">

                        <table class="table complain_datatable" id="regDTable">

                            <thead>

                                <tr>

                                    <th>REJ. DEPARTMENT</th>

                                    <th>CATEGORIES</th>
									
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>
							@if($department->isNotEmpty())
								@foreach($department as $key => $dlist)
								  <tr class="{{$key%2==0? 'even':'odd'}}">
									<td>{{$dlist->name}}</td>
									<td>{{$dlist->category}}</td>
									<td>
									
									 <a href="{{route('admin.departments.edit',$dlist->id)}}" class="btn btn-sm" title="Edit">
									  <i class="mdi mdi-pencil"></i>
								     </a>
									<a  onclick="if(confirm('Are you sure?')) { return true ;} else { return false ;}" href ="{{route('admin.departments.delete',$dlist->id)}}" data-id="{{$dlist->id}}" class="btn btn-sm" title="Delete">
										<i class="mdi mdi-delete"></i>
									  </a>
									</td>
								  </tr>
								@endforeach
							@endif	 
							</tbody>

                        </table>
						
						<div class="col-md-12">

                                 <div class="form-group">
									<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#addDepartModal">ADD REG.DEPT/CAT.</button>
								 
								 </div>
						</div>	

                    </div>
					
					<div class="table-responsive">

                        <table class="table complain_datatable" id="tankTable">

                            <thead>

                                <tr>

                                    <th>TANK</th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>
							 @if($tank->isNotEmpty())
								@foreach($tank as $key => $tlist)
								  <tr class="{{$key%2==0? 'even':'odd'}}">
									<td>{{$tlist->name}}</td>
									<td>
									<a  onclick="if(confirm('Are you sure?')) { return true ;} else { return false ;}" href ="{{route('admin.tanks.delete',$tlist->id)}}" data-id="{{$tlist->id}}" class="btn btn-sm" title="Delete">
										<i class="mdi mdi-delete"></i>
									 </a>
									</td>
								  </tr>
								@endforeach
							@endif	
							  
							</tbody>

                        </table>
						
						<div class="col-md-12">

                                 <div class="form-group">
									<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#addTankModal">ADD TANK</button>
								 </div>
						</div>	

                    </div>
					
					
					<div class="table-responsive">

                        <table class="table complain_datatable" id="codeTable">

                            <thead>

                                <tr>

                                    <th>CUST CODE</th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>
							 @if($custCode->isNotEmpty())
								@foreach($custCode as $key => $clist)
								  <tr class="{{$key%2==0? 'even':'odd'}}">
									<td>{{$clist->code}}</td>
									<td>
									<a  onclick="if(confirm('Are you sure?')) { return true ;} else { return false ;}" href ="{{route('admin.custcodes.delete',$clist->id)}}" data-id="{{$clist->id}}" class="btn btn-sm" title="Delete">
										<i class="mdi mdi-delete"></i>
									  </a>
									</td>
								  </tr>
								@endforeach
							@endif	
							  
							</tbody>

                        </table>
						
						<div class="col-md-12">

                                 <div class="form-group">
									<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#addcustCodeModal">ADD CUST CODE</button>
								 </div>
						</div>	

                    </div>
					
					
					
					 <form action="{{route('admin.dbBackup')}}"  class="form-sample" method="post" >

                        @csrf

                        <div class="row">

                            <div class="col-md-2">

                                 <div class="form-group">
									 <input type="checkbox" id="is_database_backup" name="is_database_backup" value="1" style="margin-top: 30px;" @if($setting->is_database_backup==1) checked @endif >
                                </div>

                            </div> 
							
							<div class="col-md-10">

                                 <div class="form-group">

                                    <label for="database_backup">BACKUP DATABASE</label>
								
										<select name="database_backup" class="form-control">
											<option value="7" @if($setting->database_backup==7) selected @endif >Every Week</option>
											<option value="14" @if($setting->database_backup==14) selected @endif >Every 2 Weeks</option>
										</select>
								

                                </div>

                            </div> 
							
							<div class="col-md-12">

                                 <div class="form-group">
							 <label for="new_password11"></label>

									<button type="submit" class="btn btn-outline-primary">SAVE ALL SETTINGS</button>

		
								 
								 </div>
							</div>	 

                        </div>

                    </form>

                

            </div>

        </div>

    </div>
	
	<!-- User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	   <form action="{{ route('admin.users.store') }}" class="form-sample" method="post" autocomplete="off" enctype='multipart/form-data'>
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
			<div class="form-group row">
				<label for="name" class="col-md-2">Name</label>
				 <div class="col-md-10">
				<input type="text" class="form-control @error('name') is-invalid @enderror"
					id="title" name="name" value="{{ old('name') }}">
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
					id="email" name="email" value="{{ old('email') }}" autocomplete="off" />
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
				<label for="password" class="col-md-2">Password</label>
				 <div class="col-md-10">
				<input type="password" class="form-control @error('password') is-invalid @enderror"
					id="password" name="password" value="{{ old('password') }}" autocomplete="off"  />
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
				<label for="phone" class="col-md-2">Mobile</label>
				 <div class="col-md-10">
				<input type="tel" class="form-control @error('phone') is-invalid @enderror"
					id="phone" name="phone" value="{{ old('phone') }}" autocomplete="off"  />
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
						<option value="planner">Planner</option>
						<option value="admin">Admin</option>
					</select>
				
				 </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group row">
				<label for="is_email" class="col-md-3">Is Receive Email</label>
				 <div class="col-md-9">
				 <input type="checkbox" class="@error('is_email') is-invalid @enderror"
					id="is_email" name="is_email" value="1">
				
				 </div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
	  
	   </form>
    </div>
  </div>
</div>

	<!-- ADD REG.DEPT/CAT. Modal -->
<div class="modal fade" id="addDepartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	   <form action="{{ route('admin.departments.store') }}" class="form-sample" method="post" enctype='multipart/form-data'>
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD REG.DEPT/CAT.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
			<div class="form-group row">
				<label for="name" class="col-md-3">REJ. DEPARTMENT</label>
				 <div class="col-md-9">
				<input type="text" class="form-control @error('name') is-invalid @enderror"
					id="title" name="name" value="{{ old('name') }}">
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
					id="category" name="category" value="{{ old('category') }}">
				@error('category')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				 </div>
			</div>
		</div>
	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
	  
	   </form>
    </div>
  </div>
</div>



<!-- ADD TANK. Modal -->
<div class="modal fade" id="addTankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	   <form action="{{ route('admin.tanks.store') }}" class="form-sample" method="post" enctype='multipart/form-data'>
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD TANK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
			<div class="form-group row">
				<label for="name" class="col-md-2">TANK</label>
				 <div class="col-md-10">
				<input type="text" class="form-control @error('name') is-invalid @enderror"
					id="name" name="name" value="{{ old('name') }}">
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				 </div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
	  
	   </form>
    </div>
  </div>
</div>


<!-- ADD CUST CODE Modal -->
<div class="modal fade" id="addcustCodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	   <form action="{{ route('admin.custcodes.store') }}" class="form-sample" method="post" enctype='multipart/form-data'>
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD CUST CODE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
			<div class="form-group row">
				<label for="code" class="col-md-3">CUST CODE</label>
				 <div class="col-md-9">
				<input type="text" class="form-control @error('code') is-invalid @enderror"
					id="code" name="code" value="{{ old('code') }}">
				@error('code')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				 </div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
	  
	   </form>
    </div>
  </div>
</div>

<script>
$( document ).ready(function() {
	sortTable($('#userTable'),'asc');
	sortTable($('#regDTable'),'asc');
	sortTable($('#tankTable'),'asc');
	sortTable($('#codeTable'),'asc');
	
	$('#userTable').delegate("th", "click",function(){
		
		     var hasCl = $('th').hasClass("asc");
			if (hasCl)
			{
				 $(this).removeClass('sorting_desc');  
				 $(this).addClass('sorting_asc');

				 $(this).removeClass('asc');  
				 $(this).addClass('desc');
				 sortTable($('#userTable'),'desc');
			}
			else
			{
				 $(this).removeClass('sorting_asc');  
				 $(this).addClass('sorting_desc');
				 
				 $(this).removeClass('desc');  
				 $(this).addClass('asc');
				 
				sortTable($('#userTable'),'asc');
			}
		
		
	});
	
});

</script>
@endsection

