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
                        <a href="{{ route('add.supplier') }}"
                            class="btn btn-primary rounded-pill waves-effect waves-light">add
                            Supplier</a>
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
                                        <th>Description</th>
                                        <th>address</th>
                                        <th>phone</th>



                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($supplier as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>


                                            <td>{{ $item->descreption }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->phone }}</td>





                                            <td> <a href="{{ route('edit.supplier', $item->id) }}"button type="button"
                                                    class="btn btn-warning btn-xs waves-effect waves-light">Edit</a>

                                                <a href="{{ route('delete.supplier', $item->id) }}" button type="button"
                                                    class="btn btn-danger btn-xs waves-effect waves-light">Delete</a>

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
