@extends('master')
@section('content')
    <div class="d-flex flex-column-fluid mt-5">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">ٖٖ
                    <div class="card-title">
                        <h3>Products Detail</h3></div>
                    <button type="button" class="btn btn-primary p-1" style="height: 40px; margin-top:10px;" data-toggle="modal"
                        data-target="#exampleModalSizeSm"> <i class="fa fa-plus"></i> Add Product Details</button>

                    <!--begin::Modal-->
                    <div class="modal fade" id="exampleModalSizeSm" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Product Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <form action="{{Route('product.detail.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Size</label>
                                            <input type="number" class="form-control" name="size"
                                                placeholder="Enter Size">
                                            @if($errors->has('size'))
                                            <div class="text-danger">{{ $errors->first('size') }}</div>
                                            @endif
                                        </div>
                                        {{-- <div class="col-lg-4"> --}}
                                            <label>Product Name <span class="required">*</span></label>
                                            <select name="product_id" class="form-control">
                                                <option value="">Select Product Name</option>
                                                @foreach ($product as $productss)
                                                <option value="{{$productss->product_id}}"
                                                    @if(old('product_id')==$productss->product_id) {{ 'selected' }}
                                                    @endif>
                                                    {{$productss->product_name}}
                                                </option>
                                                @endforeach

                                            </select>
                                            @if($errors->has('product_name'))
                                            <span class="form-text">{{ $errors->first('product_name') }}</span>
                                            @endif
                                        {{-- </div> --}}
                                        <div class="form-group">
                                        <label>Quantity</label>
                                            <input type="number" class="form-control" name="quantity"
                                                placeholder="Enter Quantity">
                                            @if($errors->has('quantity'))
                                            <div class="text-danger">{{ $errors->first('quantity') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-info font-weight-bold"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info font-weight-bold">Add</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--end::Modal-->

                </div>
                <div class="card-body">
                    @if ($product_detail->count() > 0)
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                        style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th class="text-center">Product Detail Id</th>
                                <th class="text-center">Product Size</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Product Quantity</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_detail as $item)
                            <tr>
                                <th class="text-center">{{$item->product_detail_id}}</th>
                                <td class="text-center">{{$item->size}}</td>
                                <td class="text-center">{{$item->product_name}}</td>
                                <td class="text-center">{{$item->quantity}}</td>
                                <td class="text-center">
                                        <!--begin::Button-->
                                        <button type="button" class="btn" data-toggle="modal" title="Edit"
                                            data-target="#edititem{{$item->product_detail_id}}">
                                            <i class="la la-edit text-primary display-4 mr-3"></i>
                                        </button>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="button" class="btn" data-toggle="modal"
                                        data-target="#deleteitem{{$item->product_detail_id}}">
                                        <i class="la la-trash text-danger display-4"></i>
                                        </button>
                                        <!--end::Button-->
                                </td>
                            </tr>

                            <!--  Delete Modal -->
                            <div class="modal fade" id="deleteitem{{$item->product_detail_id}}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Product Details</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you really want to delete this data ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                                data-dismiss="modal">No</button>
                                            <a href="{{Route('product-detail.delete', $item->product_detail_id)}}" type="submit"
                                                class="btn btn-primary font-weight-bold">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  Delete Modal -->
                            @endforeach

                            @foreach ($product_detail as $item)
                            <!--Edit::Modal-->
                            <div class="modal fade" id="edititem{{$item->product_detail_id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Product Detail</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <form action="{{Route('product.detail.update', $item->product_detail_id)}}" method="post">
                                            @csrf
                                            @if(session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                            @endif
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Product Size</label>
                                                    <input type="text" class="form-control" name="size"
                                                        value="{{old('size', $item->size)}}"
                                                        placeholder="Enter Size">
                                                    @if($errors->has('size'))
                                                    <div class="text-danger">{{ $errors->first('size') }}
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Name:</label>
                                                <select name="product_id" class="form-control">
                                                    @foreach ($product as $products)
                                                    @if ($item->product_id == $products->product_id)
                                                    <option value="{{ $products->product_id}}" selected>
                                                        {{ $products->product_name }}</option>
                                                    @else
                                                    <option value="{{ $products->product_id }}">
                                                        {{ $products->product_name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_name'))
                                                <span class="form-text">{{ $errors->first('product_name') }}</span>
                                                @endif
                                                </div>

                                                <div class="form-group">
                                                    <label>Product Quantity</label>
                                                    <input type="text" class="form-control" name="quantity"
                                                        value="{{old('quantity', $item->quantity)}}"
                                                        placeholder="Enter Quantity">
                                                    @if($errors->has('quantity'))
                                                    <div class="text-danger">{{ $errors->first('quantity') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit"
                                                    class="btn btn-primary font-weight-bold">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Edit::Modal-->
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <h3 class="text-center">No Record Found</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/pages/features/datatables/data-sources/html.js') }}"></script>
    {{-- <script src="{{asset('assets/js/pages/widgets.js')}}"></script> --}}
@endsection
