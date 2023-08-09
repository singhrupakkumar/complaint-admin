@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Complain</h4>
                   <form action="{{ route('admin.complains.update', $id) }}" class="form-sample" method="post" enctype='multipart/form-data'>
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">
						
							
                            <!--div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="title" class="col-md-2">Title</label>
									 <div class="col-md-10">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title',$complain->title) }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div-->
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="orginator_name" class="col-md-2">ORGINATOR NAME</label>
									 <div class="col-md-10">
                                    <input type="text" class="form-control @error('orginator_name') is-invalid @enderror"
                                        id="orginator_name" name="orginator_name" value="{{ old('orginator_name',$complain->orginator_name) }}">
                                    @error('orginator_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="rej_dept_id" class="col-md-2">REJ. DEPT</label>
									 <div class="col-md-10">
									 
									<select name="rej_dept_id" class="form-control" id="rej_dept_id">
									    @if($department->isNotEmpty())
											@foreach($department as $list)
											<option value="{{$list->id}}" data-department="{{$list->name}}" @if($list->id==$complain->rej_dept_id) selected @endif >{{$list->name}}</option>
											@endforeach
										@endif	
									</select>
                                   
									 </div>
                                </div>
                            </div>
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="rej_date" class="col-md-2">REJ. Date</label>
									 <div class="col-md-10">
                                    <input type="date" class="form-control @error('rej_date') is-invalid @enderror"
                                        id="rej_date" name="rej_date" value="{{ old('rej_date',$complain->rej_date) }}">
                                    @error('rej_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="prod_date" class="col-md-2">PROD. Date</label>
									 <div class="col-md-10">
                                    <input type="date" class="form-control @error('prod_date') is-invalid @enderror"
                                        id="prod_date" name="prod_date" value="{{ old('prod_date',$complain->prod_date) }}">
                                    @error('prod_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="prod_time" class="col-md-2">PROD. Time</label>
									 <div class="col-md-10">
                                    <input type="time" class="form-control @error('prod_time') is-invalid @enderror"
                                        id="prod_time" name="prod_time" value="{{ old('prod_time',$complain->prod_time) }}">
                                    @error('prod_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12 tank">
                                 <div class="form-group row">
                                    <label for="tank" class="col-md-2">TANK</label>
									 <div class="col-md-10">
									 
									<select name="tank" class="form-control" id="tank">
										@if($tank->isNotEmpty())
											@foreach($tank as $list)
											<option value="{{$list->name}}" data-tank="{{$list->name}}" @if($list->name==$complain->tank) selected @endif >{{$list->name}}</option>
											@endforeach
										@endif	
									</select>
                                   
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="cust_code_id" class="col-md-2">CUST. CODE</label>
									 <div class="col-md-10">
									 
									<select name="cust_code_id" class="form-control" id="cust_code_id">
										@if($custCode->isNotEmpty())
											@foreach($custCode as $list)
											<option value="{{$list->id}}" data-code="{{$list->code}}" @if($list->id==$complain->cust_code_id) selected @endif >{{$list->code}}</option>
											@endforeach
										@endif	
									</select>
                                   
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="job_number" class="col-md-2">JOB NO</label>
									 <div class="col-md-10">
                                    <input type="text" class="form-control @error('job_number') is-invalid @enderror"
                                        id="job_number" name="job_number" value="{{ old('job_number',$complain->job_number) }}">
                                    @error('job_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="cir" class="col-md-2">CIR.</label>
									 <div class="col-md-10">
                                    <input type="text" class="form-control @error('cir') is-invalid @enderror"
                                        id="cir" name="cir" value="{{ old('cir',$complain->cir) }}">
                                    @error('cir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="length" class="col-md-2">LENGTH</label>
									 <div class="col-md-10">
                                    <input type="number" class="form-control @error('length') is-invalid @enderror"
                                        id="length" name="length" value="{{ old('length',$complain->length) }}" min="0">
                                    @error('length')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="cyl_number" class="col-md-2">CYL NO</label>
									 <div class="col-md-10">
                                    <input type="text" class="form-control @error('cyl_number') is-invalid @enderror"
                                        id="cyl_number" name="cyl_number" value="{{ old('cyl_number',$complain->cyl_number) }}" min="0">
                                    @error('cyl_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="mt" class="col-md-2">MT</label>
									 <div class="col-md-10">
									 
									<select name="mt" class="form-control" id="mt">
										<option value="ST" @if('ST'==$complain->mt) selected @endif >ST</option>
										<option value="ALU" @if('ALU'==$complain->mt) selected @endif >ALU</option>
									</select>
                                   
                                    @error('mt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="category" class="col-md-2">CATEGORY</label>
									 <div class="col-md-10">
									 
									<select name="category" class="form-control" id="category">
										@if($department->isNotEmpty())
											@foreach($department as $list)
											<option value="{{$list->category}}" data-department="{{$list->category}}" @if($list->category==$complain->category) selected @endif >{{$list->category}}</option>
											@endforeach
										@endif
									</select>
                                   
									 </div>
                                </div>
                            </div>
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="mt" class="col-md-2">REMARK / COMMENTS</label>
									 <div class="col-md-10">
                                        <textarea name="remarks" class="form-control">{!! $complain->remarks !!}</textarea>
									 </div>
                                </div>
                            </div>
							
							
							<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="mt" class="col-md-2">ADD ATTACHMENTS</label>
									 <div class="col-md-10">
                                        <input type="file" class="form-control @error('attachments') is-invalid @enderror"
                                        id="attachments" name="attachments[]" value="{{ old('attachments') }}" multiple>
										@error('attachments')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									 </div>
                                </div>
								
								@if($complain->attachments != null || $complain->attachments != '')    
                                @foreach(json_decode($complain->attachments) as $img)
							
									<?php 
										$ext = pathinfo(
											parse_url($img, PHP_URL_PATH), 
											PATHINFO_EXTENSION
										);

									if($ext =='pdf' || $ext =='doc' || $ext =='PDF' || $ext =='DOC' || $ext =='docx' || $ext =='DOCX' ){
										$url = $img;
										echo "<a href='$url' ><i class='fa fa-file-text' style='font-size:48px;color:red'></i> </a>";
									}else{		
										?>
										 <a href='{{$img}}' ><img src="{{$img}}" height="150" width="150" /></a>
									<?php }?>
								  
								
								  
								@endforeach 
								@endif
									 
								 <input type="hidden" name="oldProductImg" value="{{$complain->attachments }}">
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
	
	<script>
	
	$( document ).ready(function() {
		let defaultval = '{{$complain->rej_dept_id}}';
		$.ajax({
               url: '{{route("admin.getDepartmentCat")}}',
               type: 'GET',
               data: {rej_dept_id:defaultval},
               dataType: 'json',
               success:function(response){
					$("#category").html('');
                     var len1 = response.length;

                     // Add data to state dropdown
                     for( var i = 0; i<len1; i++){
  
                           var category_name1 = response[i]['category'];
						   
						   let selectedcat1 = '';
						   
						   if(category_name1 == '{{$complain->category}}'){
							   let selectedcat1 = 'selected';
						   }

                           $("#category").append("<option value='"+ category_name1 +"' data-department='"+ category_name1 +"' selected='"+ selectedcat1 +"'>"+ category_name1 +"</option>");

                     }
               }
			});
		
		
		
		$('#rej_dept_id').on("change",function(){
			 let selectedItem = $(this).val();
			 var abc = $('option:selected',this).data("department");
			 if(abc =='COPPER' || abc =='CU' || abc =='Cu' || abc =='Copper' || abc =='CHROME' || abc =='Chrome'){
				 $('.tank').show();
			 }else{ 
				$('#tank').prop('selectedIndex',0);    
				$('.tank').hide(); 
			 }

			
			$.ajax({
               url: '{{route("admin.getDepartmentCat")}}',
               type: 'GET',
               data: {rej_dept_id:selectedItem},
               dataType: 'json',
               success:function(response){
					$("#category").html('');
                     var len = response.length;

                     // Add data to state dropdown
                     for( var i = 0; i<len; i++){
                           var category_name = response[i]['category'];
						  // console.log(category_name);
						   let selectedcat = '';
						   
						   if(category_name == '{{$complain->category}}'){
							   let selectedcat = 'selected';
						   }

                           $("#category").append("<option value='"+ category_name +"' data-department='"+ category_name +"' selected='"+ selectedcat +"' >"+ category_name +"</option>");

                     }
               }
			});
	
			
			

		});
		
	});
	
	</script>
@endsection
