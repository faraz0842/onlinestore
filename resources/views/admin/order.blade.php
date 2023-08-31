@extends('master')
@section('content')
    <div class="d-flex flex-column-fluid mt-5">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header d-flex justify-content-center">ٖٖ
                    <div class="card-title">
                        <h3 class="text-center">ORDER</h3>
                    </div>
                </div>
                <div class="card-body">
                    @if ($order->count() > 0)
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                            style="margin-top: 13px !important">
                            <thead>
                                <tr>
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Zip Code</th>
                                    <th class="text-center">City</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Order Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->first_name }}</td>
                                        <td class="text-center">{{ $item->last_name }}</td>
                                        <td class="text-center">{{ $item->address }}</td>
                                        <td class="text-center">{{ $item->zip }}</td>
                                        <td class="text-center">{{ $item->city }}</td>
                                        <td class="text-center">{{ $item->phone }}</td>
                                        <td class="text-center">
                                            <a href="{{Route('order.detail.show', $item->order_id)}}"> <i class="ki ki-eye"></i></a>
                                        </td>
                                    </tr>
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
