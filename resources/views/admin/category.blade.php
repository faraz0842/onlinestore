@extends('master')
@section('content')
    <div class="d-flex flex-column-fluid mt-5">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">ٖٖ
                    <div class="card-title">
                        <h3>Category</h3></div>
                    <button type="button" class="btn btn-primary p-1" style="height: 40px; margin-top:10px;" data-toggle="modal"
                        data-target="#exampleModalSizeSm"> <i class="fa fa-plus"></i> Add Category</button>

                    <!--begin::Modal-->
                    <div class="modal fade" id="exampleModalSizeSm" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <form action="{{Route('category.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" class="form-control" name="cat_name"
                                                placeholder="Enter Category Name">
                                            @if($errors->has('cat_name'))
                                            <div class="text-danger">{{ $errors->first('cat_name') }}</div>
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
                    @if ($category->count() > 0)
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                        style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">ACIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td class="text-center">{{$item->cat_name}}</td>
                                <td class="text-center">
                                        <!--begin::Button-->
                                        <button type="button" class="btn" data-toggle="modal" title="Edit"
                                            data-target="#edititem{{$item->cat_id}}">
                                            <i class="la la-edit text-primary display-4 mr-3"></i>
                                        </button>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="button" class="btn" data-toggle="modal"
                                            data-target="#deleteitem{{$item->cat_id}}">
                                            <i class="la la-trash text-danger display-4"></i>
                                        </button>
                                        <!--end::Button-->
                                </td>
                            </tr>
                            <!--Edit::Modal-->
                            <div class="modal fade" id="edititem{{$item->cat_id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <form action="{{Route('category.update', $item->cat_id)}}" method="post">
                                            @csrf
                                            @if(session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                            @endif
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input type="text" class="form-control" name="cat_name"
                                                        value="{{old('cat_name', $item->cat_name)}}"
                                                        placeholder="Enter Product Type">
                                                    @if($errors->has('cat_name'))
                                                    <div class="text-danger">{{ $errors->first('cat_name') }}
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
                            <!--  Delete Modal -->
                            <div class="modal fade" id="deleteitem{{$item->cat_id}}" tabindex="-1"
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
                                            <a href="{{Route('category.delete', $item->cat_id)}}" type="submit"
                                                class="btn btn-primary font-weight-bold">Yes</a>
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
    {{-- <script src="{{asset('assets/js/pages/widgets.js')}}"></script> --}}
@endsection
