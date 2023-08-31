@extends('master')
@section('content')
    <div class="d-flex flex-column-fluid mt-5">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header d-flex justify-content-center">ٖٖ
                    <div class="card-title">
                        <h3 class="text-center">ORDER Detail</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable"
                    id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Images</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_detail as $order_details)
                            <tr>
                                <td class="text-center">
                                    {{ $order_details->product_name }}</td>
                                <td class="text-center">
                                    {{ $order_details->quantity }}</td>
                                <td class="text-center">
                                    {{ $order_details->price }}</td>
                                <td class="text-center">
                                    <img src="{{ URL::asset($order_details->product_image_path . $order_details->product_image_name) }}"
                                        class="img-rounded" width="70px"
                                        height="70px">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container justify-content-between">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 style="color: #e7ab3c">Subtotal :</h3>
                            <h3>{{ $order_details->sub_total }}</h3>
                        </div>
                        <div class="col-md-6">
                            <h3 style="color: #e7ab3c">Total :</h3>
                            <h3>{{ $order_details->grand_total }}</h3>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/pages/features/datatables/data-sources/html.js') }}"></script>
    {{-- <script src="{{asset('assets/js/pages/widgets.js')}}"></script> --}}
@endsection
