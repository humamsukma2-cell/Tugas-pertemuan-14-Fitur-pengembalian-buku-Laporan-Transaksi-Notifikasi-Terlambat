@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        <i class="bi bi-receipt"></i>
        Detail Transaksi
    </h1>

    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

@if ($transaksi->status == 'Dipinjam' && $transaksi->terlambat > 0)
<div class="alert alert-danger">
    <i class="bi bi-exclamation-triangle"></i>
    <strong>Peringatan!</strong>
    Buku ini terlambat dikembalikan selama
    <strong>{{ $transaksi->terlambat }} hari</strong>.
</div>
@endif

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    Informasi Transaksi
                </h5>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Kode Transaksi</th>
                        <td>
                            <code>{{ $transaksi->kode_transaksi }}</code>
                        </td>
                    </tr>

                    <tr>
                        <th>Nama Anggota</th>
                        <td>{{ $transaksi->anggota->nama }}</td>
                    </tr>

                    <tr>
                        <th>Kode Anggota</th>
                        <td>{{ $transaksi->anggota->kode_anggota }}</td>
                    </tr>

                    <tr>
                        <th>Judul Buku</th>
                        <td>{{ $transaksi->buku->judul }}</td>
                    </tr>

                    <tr>
                        <th>Kode Buku</th>
                        <td>{{ $transaksi->buku->kode_buku }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Pinjam</th>
                        <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Kembali</th>
                        <td>{{ $transaksi->tanggal_kembali->format('d M Y') }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Dikembalikan</th>
                        <td>
                            @if ($transaksi->tanggal_dikembalikan)
                            {{ $transaksi->tanggal_dikembalikan->format('d M Y') }}
                            @else
                            <span class="text-muted">Belum dikembalikan</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if ($transaksi->status == 'Dipinjam')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                            @else
                            <span class="badge bg-success">Dikembalikan</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Denda</th>
                        <td>
                            <strong>
                                Rp {{ number_format($totalDenda, 0, ',', '.') }}
                            </strong>
                        </td>
                    </tr>

                    <tr>
                        <th>Keterangan</th>
                        <td>
                            {{ $transaksi->keterangan ?? '-' }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Aksi</h5>
            </div>

            <div class="card-body">
                @if ($transaksi->status == 'Dipinjam')
                <form action="{{ route('transaksi.kembalikan', $transaksi->id) }}"
                    method="POST"
                    onsubmit="return confirm('Apakah buku ini sudah dikembalikan?')">

                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-check-circle"></i>
                        Kembalikan Buku
                    </button>
                </form>
                @else
                <div class="alert alert-success mb-0">
                    <i class="bi bi-check-circle"></i>
                    Buku sudah dikembalikan.
                </div>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-light">
                <h5 class="mb-0">Informasi Denda</h5>
            </div>

            <div class="card-body">
                <p class="mb-1">
                    Denda keterlambatan:
                </p>

                <h5>
                    Rp 5.000 / hari
                </h5>

                <hr>

                <p class="mb-1">
                    Total denda:
                </p>

                @if ($transaksi->status == 'Dipinjam' && $transaksi->terlambat > 0)
                <p class="mb-1">
                    Terlambat:
                </p>

                <h6 class="text-danger">
                    {{ $transaksi->terlambat }} hari
                </h6>
                @endif

                <p class="mb-1">
                    Total denda:
                </p>

                <h4 class="text-danger">
                    Rp {{ number_format($totalDenda, 0, ',', '.') }}
                </h4>
            </div>
        </div>
    </div>
</div>
@endsection