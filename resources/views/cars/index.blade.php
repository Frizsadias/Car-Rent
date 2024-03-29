@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mobil</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Mobil</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            @include('alert')
            <div class="container-fluid">
                <form method="GET">
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <a href="{{ route('cars.create') }}" class="btn btn-block btn-primary btn-md"><i
                                    class="nav-icon fas fa-plus"></i> Add Mobil</a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="GET">
                                    <div class="row float-right">
                                        <div class="col-lg-6">
                                            <select name="status" class="form-control">
                                                <option value="Tersedia" @if (request()->get('status') == 'Tersedia') selected @endif>
                                                    Tersedia</option>
                                                <option value="Disewa" @if (request()->get('status') == 'Disewa') selected @endif>
                                                    Disewa</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" id="search" name="search"
                                                value="{{ request()->get('search') }}" class="form-control"
                                                placeholder="Search..." aria-label="Search" aria-describedby="button-addon2"
                                                autocomplete="off">
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-info" id="button-addon2">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Merek</th>
                                            <th>Model</th>
                                            <th>Tahun</th>
                                            <th>Warna</th>
                                            <th>Plat Nomor</th>
                                            <th>Harga Sewa/Hari</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cars as $sw)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sw->merek }}</td>
                                                <td>{{ $sw->model }}</td>
                                                <td>{{ $sw->tahun }}</td>
                                                <td>{{ $sw->warna }}</td>
                                                <td>{{ $sw->plat_nomor }}</td>
                                                <td>Rp. {{ number_format($sw->harga_sewa) }}</td>
                                                <td>
                                                    @if ($sw->status == 'Tersedia')
                                                        <span class="badge badge-success">Tersedia</span>
                                                    @elseif ($sw->status == 'Disewa')
                                                        <span class="badge badge-danger">Disewa</span>
                                                    @else
                                                        <span class="badge badge-warning">Dibooking</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('cars.edit', $sw->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('cars.destroy', $sw->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                                {{ $cars->withQueryString()->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        function clear() {
            console.log('clear');
        }
    </script>
@endsection
