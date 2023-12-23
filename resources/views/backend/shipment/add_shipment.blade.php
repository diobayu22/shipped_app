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
                                <form method="post" action="{{ route('store.shipment') }}" enctype="multipart/form-data">
                                    @csrf

                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add
                                        Shipment
                                    </h5>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Name</label>
                                                <input type="text" name="name" id="input3"
                                                    class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="firstname" class="form-label">Container</label>
                                                <select name="container_id" class="form-select" id="pilihan"
                                                    onchange="updateInput3()">
                                                    <option selected disabled>Select Container </option>
                                                    @foreach ($container as $con)
                                                        <option value="{{ $con->name }}">{{ $con->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="firstname" class="form-label">Item </label>
                                                <select name="item_id" class="form-select" id="example-select">
                                                    <option selected disabled>Select Item </option>
                                                    @foreach ($item as $it)
                                                        <option value="{{ $it->id }}">{{ $it->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">QTY</label>
                                                <input type="number" name="qty"
                                                    class="form-control @error('qty') is-invalid @enderror">
                                                @error('qty')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
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
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Date</label>
                                                <input type="date" name="date" id="tanggal" oninput="updateInput3()"
                                                    class="form-control @error('date') is-invalid @enderror">
                                                @error('date')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <input type="hidden" name="status" value="draft">




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
    <script>
        function updateInput3() {
            // Mendapatkan nilai dari input tanggal
            var tanggalValue = document.getElementById('tanggal').value;

            // Mendapatkan nilai dari input pilihan (select)
            var pilihanValue = document.getElementById('pilihan').value;

            // Menggabungkan tanggal dan pilihan menjadi satu string
            var hasil = formatDate(tanggalValue) + pilihanValue;

            // Menetapkan nilai input ketiga dengan hasil gabungan
            document.getElementById('input3').value = hasil;
        }

        function formatDate(dateString) {
            // Mendapatkan nilai tahun, bulan, dan tanggal
            var date = new Date(dateString);
            var year = date.getFullYear();
            var month = ('0' + (date.getMonth() + 1)).slice(-2); // Menambah 1 karena indeks bulan dimulai dari 0
            var day = ('0' + date.getDate()).slice(-2);

            // Menggabungkan menjadi format "dd/mm/yyyy"
            return day + '/' + month + '/' + year + '/';
        }
    </script>
@endsection
