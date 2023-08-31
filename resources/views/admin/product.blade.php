@extends('master')
@section('content')
    <div class="d-flex flex-column-fluid mt-5">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">ٖٖ
                    <div class="card-title">
                        <h3>Products</h3>
                    </div>
                    <button type="button" class="btn btn-primary p-1" style="height: 40px; margin-top:10px;"
                        data-toggle="modal" data-target="#exampleModalSizeSm"> <i class="fa fa-plus"></i> Add
                        Product</button>

                    <!--begin::Modal-->
                    <div class="modal fade" id="exampleModalSizeSm" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <form action="{{ Route('product.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Product Type</label>
                                            <input type="text" class="form-control" name="product_type"
                                                placeholder="Enter Product Type">
                                            @if ($errors->has('product_type'))
                                                <div class="text-danger">{{ $errors->first('product_type') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                        <label>Category Name <span class="required">*</span></label>
                                        <select name="cat_id" class="form-control">
                                            <option value="">Select Category Name</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->cat_id }}" @if (old('cat_id') == $cat->cat_id) {{ 'selected' }}
                                            @endif>
                                            {{ $cat->cat_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('cat_name'))
                                            <span class="form-text">{{ $errors->first('cat_name') }}</span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" name="product_name"
                                                placeholder="Enter Product Name">
                                            @if ($errors->has('product_name'))
                                                <div class="text-danger">{{ $errors->first('product_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <input type="text" class="form-control" name="product_description"
                                                placeholder="Enter Product Description">
                                            @if ($errors->has('product_description'))
                                                <div class="text-danger">{{ $errors->first('product_description') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input type="number" class="form-control" name="price"
                                                placeholder="Enter Product Price">
                                            @if ($errors->has('price'))
                                                <div class="text-danger">{{ $errors->first('price') }}
                                                </div>
                                            @endif
                                        </div>
                                        <label>Product Image</label>
                                        <div class="form-group">
                                            <input type="file" class="form-control" placeholder="Enter Product Image"
                                                name="product_image" value="{{ old('product_image') }}">
                                            @if ($errors->has('product_image'))
                                                <div class="text-danger">{{ $errors->first('product_image') }}</div>
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
                    @if ($product->count() > 0)
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                            style="margin-top: 13px !important">
                            <thead>
                                <tr>
                                    <th class="text-center">Product id</th>
                                    <th class="text-center">Product Type</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Product Description</th>
                                    <th class="text-center">Product Price</th>
                                    <th class="text-center">Product Image</th>
                                    <th class="text-center">ATIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->product_id }}</td>
                                        <td class="text-center">{{ $item->product_type }}</td>
                                        <td class="text-center">{{ $item->cat_name }}</td>
                                        <td class="text-center">{{ $item->product_name }}</td>
                                        <td class="text-center">{{ $item->product_description }}</td>
                                        <td class="text-center">{{ $item->price }}</td>
                                        <td class="text-center">
                                            <img src="{{ URL::asset($item->product_image_path . $item->product_image_name) }}"
                                                class="img-rounded" width="70px" height="70px">
                                        </td>

                                        <td class="text-center">
                                            <!--begin::Button-->
                                            <button type="button" class="btn p-0" data-toggle="modal" title="Edit"
                                                data-target="#edititem{{ $item->product_id }}">
                                                <i class="la la-edit text-primary display-4"></i>
                                            </button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="button" class="btn p-0" data-toggle="modal" title="Image"
                                                data-target="#editimg{{ $item->product_id }}">
                                                <i class="la la-image text-success display-4"></i>
                                            </button>
                                            <!--end::Button-->
                                            <button type="button" class="btn p-0" data-toggle="modal"
                                                data-target="#deleteitem{{ $item->product_id }}">
                                                <i class="la la-trash text-danger display-4"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!--Edit::Modal-->
                                    <div class="modal fade" id="edititem{{ $item->product_id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ Route('product.update', $item->product_id) }}"
                                                    method="post">
                                                    @csrf
                                                    @if (session('error'))
                                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                                    @endif
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Product Type</label>
                                                            <input type="text" class="form-control" name="product_type"
                                                                value="{{ old('product_type', $item->product_type) }}"
                                                                placeholder="Enter Product Type">
                                                            @if ($errors->has('product_type'))
                                                                <div class="text-danger">
                                                                    {{ $errors->first('product_type') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Category Name:</label>
                                                            <select name="cat_id" class="form-control">
                                                                @foreach ($category as $cate)
                                                                    @if ($item->cat_id == $cate->cat_id)
                                                                        <option value="{{ $cate->cat_id }}" selected>
                                                                            {{ $cate->cat_name }}</option>
                                                                    @else
                                                                        <option value="{{ $cate->cat_id }}">
                                                                            {{ $cate->cat_name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('cat_name'))
                                                                <span
                                                                    class="form-text">{{ $errors->first('cat_name') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <input type="text" class="form-control" name="product_name"
                                                                value="{{ old('product_name', $item->product_name) }}"
                                                                placeholder="Enter Product Name">
                                                            @if ($errors->has('product_name'))
                                                                <div class="text-danger">
                                                                    {{ $errors->first('product_name') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Product Description</label>
                                                            <input type="text" class="form-control"
                                                                name="product_description"
                                                                value="{{ old('product_description', $item->product_description) }}"
                                                                placeholder="Enter Product Description">
                                                            @if ($errors->has('product_description'))
                                                                <div class="text-danger">
                                                                    {{ $errors->first('product_description') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Product Price</label>
                                                            <input type="number" class="form-control"
                                                                name="price"
                                                                value="{{ old('price', $item->price) }}"
                                                                placeholder="Enter Product Price">
                                                            @if ($errors->has('price'))
                                                                <div class="text-danger">
                                                                    {{ $errors->first('price') }}
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

                                    <!--Edit Image::Modal-->
                                    <div class="modal fade" id="editimg{{ $item->product_id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Product Image
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ Route('product.update.image', $item->product_id) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @if (session('error'))
                                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                                    @endif
                                                    <div class="modal-body">
                                                        <div class="image-input image-input-empty image-input-outline ml-5"
                                                            id="kt_user_edit_avatar"
                                                            style="background-image: url({{ asset($item->product_image_path . $item->product_image_name) }});">
                                                            <div class="image-input-wrapper"></div>
                                                            <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="product_image"
                                                                    accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="product_image_remove" />
                                                            </label>
                                                            <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="cancel" data-toggle="tooltip"
                                                                title="Cancel avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                            <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="remove" data-toggle="tooltip"
                                                                title="Remove avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
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
                                    <!--Edit Image::Modal-->
                                    <!--  Delete Modal -->
                                    <div class="modal fade" id="deleteitem{{ $item->product_id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
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
                                                    <a href="{{ Route('product.destroy', $item->product_id) }}"
                                                        type="submit" class="btn btn-primary font-weight-bold">Yes</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!--  Delete Modal -->
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
    <script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
@endsection
