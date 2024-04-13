@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data</h3>
                            <a href="{{ route('admin.cars.index') }}" class="btn btn-success shadow-sm float-right"> <i
                                    class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.bookings.update', $booking) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row border-bottom pb-4">
                                    <label for="nama_mobil" class="col-sm-2 col-form-label">Nama Mobil</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                            value="{{ old('nama_mobil', $booking->car->nama_mobil ?? '') }}" id="nama_mobil"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="plate" class="col-sm-2 col-form-label">Nopol</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="plate" id="plate">
                                            @foreach (explode(',', $booking->car->plate) as $plate)
                                                <option value="{{ $plate }}">{{ $plate }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="approval" class="col-sm-2 col-form-label">Approval</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="approved" id="approved">
                                            @foreach ($statuses as $no => $status)
                                                <option {{ old('status') == $no ? 'selected' : null }}
                                                    value="{{ $no }}">{{ $status ? 'Pending' : 'Setuju' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
