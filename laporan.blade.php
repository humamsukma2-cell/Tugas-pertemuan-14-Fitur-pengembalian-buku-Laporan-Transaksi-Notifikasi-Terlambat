@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        <i class="bi bi-file-earmark-text"></i>
        Laporan Transaksi
    </h1>

    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

{{-- Filter --}}
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        Filter Laporan
    </div>

    <div class="card-body">
        <form action="{{ route('transaksi.laporan') }}" method="GET">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Tanggal Dari</label>
                    <input type="date"
                        name="tanggal_dari"
                        class="form-control"
                        value="{{ request('tanggal_dari') }}">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Tanggal Sampai</label>
                    <input type="date"
                        name="tanggal_sampai"
                        class="form-control"
                        value="{{ request('tanggal_sampai') }}">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>
                        <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>
                            Dikembalikan
                        </option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Anggota</label>
                    <select name="anggota_id" class="form-select">
                        <option value="">Semua Anggota</option>
                        @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->id }}" {{ request('anggota_id') == $anggota->id ? 'selected' : '' }}>
                            {{ $anggota->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Filter
            </button>

            <a href="{{ route('transaksi.laporan') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Reset
            </a>

            <a href="{{ route('transaksi.laporan.pdf', request()->query()) }}" class="btn btn-danger">
                <i class="bi bi-file-earmark-pdf"></i> Export PDF
            </a>
        </form>
    </div>
</div>

{{-- Ringkasan --}}
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card border-primary">
            <div class="card-body">
                <h6 class="text-muted">Total Transaksi</h6>
                <h2>{{ $totalTransaksi }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-danger">
            <div class="card-body">
                <h6 class="text-muted">Total Denda</h6>
                <h2>Rp {{ number_format($totalDenda, 0, ',', '.') }}</h2>
            </div>
        </div>
    </div>
</div>

{{-- Tabel Laporan --}}
<div class="card">
    <div class="card-header">
        Data Transaksi
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Denda</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><code>{{ $transaksi->kode_transaksi }}</code></td>
                        <td>{{ $transaksi->anggota->nama }}</td>
                        <td>{{ $transaksi->buku->judul }}</td>
                        <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>
                        <td>{{ $transaksi->tanggal_kembali->format('d M Y') }}</td>
                        <td>
                            @if ($transaksi->status == 'Dipinjam')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                            @else
                            <span class="badge bg-success">Dikembalikan</span>
                            @endif
                        </td>
                        <td>
                            Rp {{ number_format($transaksi->denda, 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">
                            Tidak ada data transaksi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="7" class="text-end">Total Denda</th>
                        <th>Rp {{ number_format($totalDenda, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection