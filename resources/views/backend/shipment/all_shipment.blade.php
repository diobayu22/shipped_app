@extends('admin_dashboard')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <br>
                        <br>
                        <a href="{{ route('add.shipment') }}"
                            class="btn btn-primary rounded-pill waves-effect waves-light">add
                            Shipment </a>
                    </div>
                </div>
            </div>

            <br>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Container</th>
                                        <th>Item</th>
                                        <th>QTY</th>
                                        <th>Weight</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($shipment as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>

                                            <td>{{ $item['container']['name'] }}</td>
                                            <td>{{ $item['Item']['name'] }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td> {{ number_format($item->weight, 1) }}</td>
                                            <td>{{ $item->date }}</td>

                                            <td>


                                                @if ($item->status == 'draft')
                                                    <span class="badge bg-primary">{{ $item->status }}</span>
                                                @endif
                                                @if ($item->status == 'shipped')
                                                    <span class="badge bg-danger">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 'draft')
                                                    <a href="{{ route('send.shipment', $item->id) }}"button type="button"
                                                        class="btn btn-warning btn-xs waves-effect waves-light">Send</a>
                                                @endif

                                                @if ($item->status == 'shipped')
                                                    <a href="#"button type="button"
                                                        class="btn btn-danger btn-xs waves-effect waves-light">Receive</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->




        </div> <!-- container -->

    </div> <!-- content -->
@endsection
