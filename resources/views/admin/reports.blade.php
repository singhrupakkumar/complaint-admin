@extends('admin.layouts.app')



@section('content')

    <div class="row">

        <div class="col-md-12 grid-margin">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Reports</h4>

                    <form role="search" action="{{route('generatePDF')}}">
                        <div class="row" style="margin-bottom: 10px;">  

                            <div class="col-md-6 col-xs-12">   
                                <div class="input-group-sm">   
                                    <label>REG. DATE</label>     
                                    <input type="date" class="form-control" name="from_date" id="from_date" value="{{Request('from_date')}}" />      
                                </div> 
                            </div> 

                            <div class="col-md-6 col-xs-12">      
                                <div class="input-group-sm"> 
                                    <label>To Date</label>          
                                    
                                        <input type="date" class="form-control" name="to_date" id="to_date" value="{{Request('to_date')}}"/>  
                                                  
                                   
                                </div>

                            </div>
 
                        </div>
						
						<div class="row" style="margin-bottom: 10px;">  

                            <div class="col-md-6 col-xs-12">   
                                <div class="input-group-sm">   
                                    <label>Rej. Dept</label>     
                                   <select name="rej_dept_id" class="form-control" id="rej_dept_id">
									    <option value="" data-department="">Select REJ. DEPT</option>
									    @if($department->isNotEmpty())
											@foreach($department as $list)
											<option value="{{$list->id}}" data-department="{{$list->name}}">{{$list->name}}</option>
											@endforeach
										@endif	
									</select>     
                                </div> 
                            </div> 

                            <div class="col-md-6 col-xs-12">      
                                <div class="input-group-sm"> 
                                    <label>Category</label>          
                                    
                                    <select name="category" class="form-control" id="category">
									<option value="" data-department="">Choose category</option>
										@if($department->isNotEmpty())
											@foreach($department as $list)
											<option value="{{$list->category}}" data-department="{{$list->category}}">{{$list->category}}</option>
											@endforeach
										@endif
									</select> 
                                                  
                                   
                                </div>

                            </div>
 
                        </div>

                        <div class="row" style="margin-top: 40px;">     
                            <div class="col-md-2 col-xs-2"> 

                                <div class="d-flex">
                               <button type="submit" name="rejectedbase" value="1" class="btn btn-outline-primary" style="margin-left:10px;">
                                            Rejected Bases  
                                        </button>  
                                <button type="submit" name="catrejectedbase" value="1" class="btn btn-outline-primary" style="margin-left:10px;">
                                            Category Rejects
                                        </button> 
                                 </div>        

                            </div>
                        </div>        
                    </form> 

                

            </div>

        </div>

    </div>
<script>
	
	$( document ).ready(function() {
		$('#rej_dept_id').on("change",function(){
			 let selectedItem = $(this).val();
			
			
			$.ajax({
               url: '{{route("admin.getDepartmentCat")}}',
               type: 'GET',
               data: {rej_dept_id:selectedItem},
               dataType: 'json',
               success:function(response){
					$("#category").html("<option value='' data-department='' >Choose Category</option>");
                     var len = response.length;

                     // Add data to state dropdown
                     for( var i = 0; i<len; i++){
                           var state_id = response[i]['id'];
                           var category_name = response[i]['category'];

                           $("#category").append("<option value='"+ category_name +"' data-department='"+ category_name +"' >"+ category_name +"</option>");

                     }
               }
			});
	
			
			

		});
		
	});
	
	</script>
@endsection

