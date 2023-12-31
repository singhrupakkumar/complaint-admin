@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-md-12 grid-margin">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Add Recipt</h4>
            <div id="exTab2" class="container">
               <ul class="nav nav-tabs">
                  <li class="nav-item active">
                     <a  href="#sold_recipt" data-toggle="tab">Sold Recipt</a>
                  </li>
                  <li class="nav-item"><a href="#purchase_recipt" data-toggle="tab">Purchase Recipt</a>
                  </li>
               </ul>
               <div class="tab-content ">
                  <div class="tab-pane active" id="sold_recipt">
                     <div class="card-body">
                        <h4 class="card-title">Sold To</h4>
                        <form action="{{ route('admin.product-items-store.storeProductItems') }}" id="settings_form" class="form-sample" method="post" enctype='multipart/form-data'>
                           @csrf
                           <p class="card-description"></p>
                           <div class="row">
                              <div class="col-md-12 datainputs" id="req_input" >
                                 <div class="row">
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="name">Select Product</label>
                                          <select class="form-control @error('name') is-invalid @enderror"
                                             id="name" name="name[]">
                                             <option value="">Select Product</option>
                                             @foreach ($productItems as $val)
                                             <option value="{{ $val->id }}">
                                                {{ $val->name }}
                                             </option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="price">Price</label>
                                          <input type="number" class="form-control @error('price') is-invalid @enderror"
                                             id="price" name="price[]" value="{{ old('price') }}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="product_unit">Stock Qty</label>
                                          <input type="number" class="form-control @error('product_unit') is-invalid @enderror"
                                             id="product_unit" name="product_unit[]" value="{{ old('product_unit') }}">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <a href="#" id="addmore" class="add_input ">Add more</a>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="user_name">User Name</label>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                       id="user_name" name="user_name" value="{{ old('user_name') }}">
                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
								  <div class="form-group">
									 <label for="HKRN_Id">HKRN Id</label>
									 <input type="text" class="form-control @error('HKRN_Id') is-invalid @enderror"
										id="HKRN_Id" name="HKRN_Id" value="{{ old('HKRN_Id') }}" required>
									 @error('HKRN_Id')
									 <span class="invalid-feedback" role="alert">
									 <strong>{{ $message }}</strong>
									 </span>
									 @enderror
								  </div>
							   </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="price">Phone</label>
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                                       id="phone_number" name="phone_number" step=".01" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="upload_recipt">Upload Recipt</label>
                                    <input type="file" class="form-control @error('upload_recipt') is-invalid @enderror"
                                        id="city" name="upload_recipt" value="{{ old('upload_recipt') }}">
                                    @error('upload_recipt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="price">Location/ site for where the material has been issued</label>
                                    <input type="hidden" name="arrival_address_type" value="sold_to">
                                    <textarea name="address" class="form-control" rows="4"></textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="float-right">
                                 <input type="hidden" id="getProductUrl" value="{{route('admin.product-items.getProducts')}}">
                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                              </div>
                        </form>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="purchase_recipt">
                     <div class="card-body">
                        <h4 class="card-title">Purchase From</h4>
                        <form action="{{ route('admin.product-items-store.storeProductItems') }}" id="settings_form" class="form-sample" method="post" enctype='multipart/form-data'>
                           @csrf
                           <p class="card-description"></p>
                           <div class="row">
                              <div class="col-md-12 datainputs" id="req_input" >
                                 <div class="row">
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="name">Select Product</label>
                                          <select class="form-control @error('name') is-invalid @enderror"
                                             id="name" name="name[]">
                                             <option value="">Select Product</option>
                                             @foreach ($productItems as $val)
                                             <option value="{{ $val->id }}">
                                                {{ $val->name }}
                                             </option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="price">Price</label>
                                          <input type="number" class="form-control @error('price') is-invalid @enderror"
                                             id="price" name="price[]" value="{{ old('price') }}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="product_unit">Stock Qty</label>
                                          <input type="number" class="form-control @error('product_unit') is-invalid @enderror"
                                             id="product_unit" name="product_unit[]" value="{{ old('product_unit') }}">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <a href="#" id="addmore" class="add_input ">Add more</a>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="user_name">User Name</label>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                       id="user_name" name="user_name" value="{{ old('user_name') }}">
                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                             <div class="col-md-6">
								  <div class="form-group">
									 <label for="HKRN_Id">HKRN Id</label>
									 <input type="text" class="form-control @error('HKRN_Id') is-invalid @enderror"
										id="HKRN_Id" name="HKRN_Id" value="{{ old('HKRN_Id') }}" required>
									 @error('HKRN_Id')
									 <span class="invalid-feedback" role="alert">
									 <strong>{{ $message }}</strong>
									 </span>
									 @enderror
								  </div>
							   </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="price">Phone</label>
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                                       id="phone_number" name="phone_number" step=".01" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="upload_recipt">Upload Recipt</label>
                                    <input type="file" class="form-control @error('upload_recipt') is-invalid @enderror"
                                        id="city" name="upload_recipt" value="{{ old('upload_recipt') }}">
                                    @error('upload_recipt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="price">Location/ site for where the material has been issued</label>
                                    <input type="hidden" name="arrival_address_type" value="purchase_from">
                                    <textarea name="address" class="form-control" rows="4"></textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="float-right">
                                 <input type="hidden" id="getProductUrl" value="{{route('admin.product-items.getProducts')}}">
                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                              </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<style>
    .nav-tabs>li {
    float: left;
    margin-bottom: -1px;
}
.nav>li {
    position: relative;
    display: block;
}
.nav-tabs {
    border-bottom: 1px solid #ddd;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
}

    </style>
@endsection