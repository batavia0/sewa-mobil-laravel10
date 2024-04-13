@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Semua Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Nomer HP/Whatsap</th>
                                            <th>Mobil</th>
                                            @can('is_admin')
                                                <th>Disetujui</th>
                                            @endcan
                                            <th>Dikembalikan Tanggal</th>
                                            <th>Tgl Kapan Dipinjam</th>
                                            <th>Durasi pinjam</th>
                                            <th>Hari tersisa</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucwords($booking->nama_lengkap ?? '') }}</td>
                                                <td>{{ $booking->alamat_lengkap ?? '' }}</td>
                                                <td>
                                                    <a
                                                        href="https://wa.me/{{ $booking->nomer_wa ?? '' }}">{{ $booking->nomer_wa ?? '' }}</a>
                                                </td>
                                                <td>{{ $booking->car->nama_mobil ?? '' }}</td>
                                                @can('is_admin')
                                                    <td>
                                                        <i
                                                            class="{{ $booking->approved ? 'text-success fas fa-check-circle' : 'text-warning fas fa-exclamation-circle' }}"></i>
                                                    </td>
                                                @endcan
                                                <td>{{ Carbon\Carbon::parse($booking->car_returned_at)->format('d-M-Y H:i:s') ?? '-' }}
                                                </td>

                                                <td>{{ Carbon\Carbon::parse($booking->date_start)->format('d-M-Y') }}</td>
                                                <td>{{ Carbon\Carbon::parse($booking->date_end)->format('d-M-Y') }}
                                                    {{ Carbon\Carbon::parse($booking->date_start)->diffInDays(Carbon\Carbon::parse($booking->date_end)) }}
                                                    hari
                                                </td>
                                                <td>{{ Carbon\Carbon::parse(date('Y-m-d'))->diffInDays(Carbon\Carbon::parse($booking->date_end)) }}
                                                    hari
                                                </td>
                                                <td>
                                                    <?php $price_per_hour = $booking->car->price / 24; ?>
                                                    @if ($booking->car_returned_at)
                                                        {{ __('IDR 0') }}
                                                    @else
                                                        {{ __('IDR ' . number_format($price_per_hour * Carbon\Carbon::parse($booking->date_start)->diffInHours(Carbon\Carbon::now()))) }}
                                                    @endif
                                                </td>
                                                <td>

                                                    @can('is_admin')
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('admin.bookings.edit', $booking) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form onclick="return confirm('Konfirmasi Hapus')"
                                                                action="{{ route('admin.bookings.destroy', $booking) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger" booking="submit"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    @endcan
                                                    @can('is_rent_user')
                                                        @if (!$booking->car_returned_at)
                                                            <form onclick="return confirm('Konfirmasi Pengembalian Mobil')"
                                                                action="{{ route('user_rent.bookings.car_return', $booking) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="car_returned_at"
                                                                    value="{{ now() }}">
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="text-mute fas fa-sign-out-alt"></i>Kembalikan</button>
                                                            </form>
                                                        @endif
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">Data Kosong !</td>
                                            </tr>
                                        @endforelse
                                </table>
                            </div>
                        </div>
                        {{-- @can('is_rent_user')
                            <p>TODO this is for User Rent data -- load the table includes Cars is already Rented
                                "Nama Mobil", "Sewa Per Hari", "tanggal mulai", "tanggal selesai". Add Button "Pesan Mobil"
                            </p>
                        @endcan --}}
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

@push('style-alt')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush

@push('script-alt')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
        $("#data-table").DataTable();
    </script>
@endpush
