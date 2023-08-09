@extends('admin.layouts.app')
@section('content')

            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ $user ? $user->name : 'Guest' }}</h3>
                           
                        </div>
                    </div>
                </div>
            </div>
			
			    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <h4 class="card-title">Dashboard</h4>
                    </div>
					
					<form role="search">
						<div class="row" style="margin-bottom: 10px;">  

							<div class="col-md-4 col-xs-12">   
								<div class="input-group-sm">   
									<label>REG.DATE</label>     
									<input type="date" class="form-control" name="from_date" id="from_date" value="{{Request('from_date')}}" />      
								</div> 
							</div> 

							<div class="col-md-4 col-xs-12">      
								<div class="input-group-sm"> 
									<label>To Date</label>          
									<div class="d-flex">
										<input type="date" class="form-control" name="to_date" id="to_date" value="{{Request('to_date')}}"/>            
									</div>  
								</div>

							</div>
							
							<div class="col-md-4 col-xs-12">      
								<div class="input-group-sm"> 
									<label>REJ. DEPT</label>          
									<div class="d-flex">
										
										<select name="rej_dept_id" class="form-control" id="rej_dept_id">
											<option value="">ALL</option>
									    @if($department->isNotEmpty())
											@foreach($department as $list)
											<option value="{{$list->id}}" data-department="{{$list->name}}" @if($list->id == Request('rej_dept_id')) selected @endif >{{$list->name}}</option>
											@endforeach
										@endif	
										</select>	
										<button type="submit" class="btn btn-outline-primary" style="margin-left:10px;">
											Search
										</button> 
									</div>  
								</div>

							</div>


				  

						</div>        
					</form> 

					<div class="row" style="margin-bottom: 10px;">     
						<div class="col-md-2 col-xs-2"> 
							<form role="search" onchange="this.submit();" style="width:inherit;float:left;">
								{{ csrf_field() }}
								<div class="input-group" style="width:100%">
									<select class="form-control" name="sort">
										<option value="">Sort By</option>   
										<option value="ASC" @if(Request('sort') =='ASC') selected @endif>ASC</option>
										<option value="DESC" @if(Request('sort') =='DESC') selected @endif>DESC</option>
									</select>
								</div>
							</form> 
						</div>
					</div>		
                    <div class="table-responsive">
                        <table class="table complain_datatable" id="complainTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>REG.DATE</th>
                                    <th>REJ.DEPT</th>
                                    <th>TANK</th>
                                    <th>JOB. NO</th>
									<th>CATEGORY</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							@if($complain->isNotEmpty())
								@foreach($complain as $key =>$list)
								<tr class="{{$key%2==0? 'even':'odd'}}">
									 <td>{{$key+1}}</td>
									 <td>{{$list->rej_date}}</td>
									 <td>{{$list->rejdept?$list->rejdept->name:''}}</td>
									 <td>{{$list->tank}}</td>
									 <td>{{$list->job_number}}</td>
									 <td>{{$list->category}}</td>
									 <td>
									 <a href="{{route('admin.complains.edit',$list->id)}}" class="btn btn-sm" title="Edit">
										<i class="mdi mdi-pencil"></i>
									  </a>
									  @if(Auth::user()->isAdmin())
									<!--a  onclick="if(confirm('Are you sure?')) { return true ;} else { return false ;}" href ="{{route('admin.complains.delete',$list->id)}}" data-id="{{$list->id}}" class="btn btn-sm" title="Delete">
										<i class="mdi mdi-delete"></i>
									 </a-->
									 @endif
									 </td>
								 </tr>
								@endforeach
							@endif	 
							 </tbody>
                        </table>
						{{ $complain->appends($_GET)->links('pagination::bootstrap-5') }} 
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
$( document ).ready(function() {
	//sortTable($('#complainTable'),'asc'); 
 
});

</script>
    <!-- main-panel ends -->
@endsection
