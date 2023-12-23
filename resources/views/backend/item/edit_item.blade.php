@extends('admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Item</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Edit Item</h4>
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
                                <form method="post" action="{{ route('update.item') }}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $item->id }}">

                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Edit Item
                                    </h5>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Name</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ $item->name }}">
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Weight</label>
                                                <input type="text" name="weight"
                                                    class="form-control @error('weight') is-invalid @enderror"
                                                    value="{{ $item->weight }}">
                                                @error('weight')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="firstname" class="form-label">UOM </label>
                                                <select name="uom_id" class="form-select" id="example-select">
                                                    <option selected disabled>Select uom </option>
                                                    @foreach ($uom as $uo)
                                                        <option value="{{ $uo->id }}"
                                                            {{ $uo->id == $item->uom_id ? 'selected' : '' }}>
                                                            {{ $uo->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="firstname" class="form-label">Supplier </label>
                                                <select name="supplier_id" class="form-select" id="example-select">
                                                    <option selected disabled>Select Supplier </option>
                                                    @foreach ($supplier as $sup)
                                                        <option value="{{ $sup->id }}"
                                                            {{ $sup->id == $item->supplier_id ? 'selected' : '' }}>
                                                            {{ $sup->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>



                                    </div> <!-- end row -->



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



    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
