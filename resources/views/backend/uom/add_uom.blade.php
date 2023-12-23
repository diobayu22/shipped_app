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
                        <h4 class="page-title">Add UOM</h4>
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
                                <form method="post" action="{{ route('uom.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add
                                        UOM
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
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Descreption</label>
                                                <input type="text" name="descreption"
                                                    class="form-control @error('descreption') is-invalid @enderror">
                                                @error('descreption')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
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
