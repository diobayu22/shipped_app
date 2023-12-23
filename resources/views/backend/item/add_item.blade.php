@extends('admin_dashboard')
@section('admin')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}


    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb mt-4">


                            </ol>
                        </div>
                        <h4 class="page-title">Add Item</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">


                <div class="col-lg-8 col-xl-12">
                    <div class="card">
                        <div class="card-body">





                            <!-- end timeline content-->

                            <div class="tab-pane" id="settings">
                                <form method="post" action="{{ route('item.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add
                                        Item
                                    </h5>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Name</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="firstname" class="form-label">UOM </label>
                                                <select name="uom_id" class="form-select" id="example-select">
                                                    <option selected disabled>Select UOM </option>
                                                    @foreach ($uom as $u)
                                                        <option value="{{ $u->id }}">{{ $u->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Weight</label>
                                                <input type="number" name="weight" step="0.01"
                                                    class="form-control @error('weight') is-invalid @enderror">
                                                @error('weight')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="firstname" class="form-label">Supplier </label>
                                                <select name="supplier_id" class="form-select" id="example-select">
                                                    <option selected disabled>Select Supplier </option>
                                                    @foreach ($supplier as $sup)
                                                        <option value="{{ $sup->id }}">{{ $sup->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>


                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                                    class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                </form>
                            </div>
                            <!-- end settings content-->


                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
@endsection
