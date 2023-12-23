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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Supplier</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Edit Supplier</h4>
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
                                <form method="post" action="{{ route('update.supplier') }}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $supplier->id }}">

                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Edit
                                        Supplier
                                    </h5>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Name</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ $supplier->name }}">
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Descreption</label>
                                                <input type="text" name="descreption"
                                                    class="form-control @error('qty') is-invalid @enderror"
                                                    value="{{ $supplier->descreption }}">
                                                @error('descreption')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Address</label>
                                                <input type="text" name="address"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    value="{{ $supplier->address }}">
                                                @error('address')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Phone</label>
                                                <input type="text" name="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    value="{{ $supplier->phone }}">
                                                @error('phone')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                                    class="mdi mdi-content-save"></i> Save</button>
                                        </div>
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
