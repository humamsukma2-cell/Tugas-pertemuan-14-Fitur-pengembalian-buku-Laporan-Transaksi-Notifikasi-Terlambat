<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        p {
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background-color: #eeeeee;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi Peminjaman Buku</h2>
    <p>Sistem Perpustakaan</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Anggota</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Denda</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($transaksis as $transaksi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaksi->kode_transaksi }}</td>
                <td>{{ $transaksi->anggota->nama }}</td>
                <td>{{ $transaksi->buku->judul }}</td>
                <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>
                <td>{{ $transaksi->tanggal_kembali->format('d M Y') }}</td>
                <td>{{ $transaksi->status }}</td>
                <td>Rp {{ number_format($transaksi->denda, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center;">
                    Tidak ada data transaksi.
                </td>
            </tr>
            @endforelse
        </tbody>

        <tfoot>
            <tr>
                <th colspan="7" class="text-right">Total Transaksi</th>
                <th>{{ $totalTransaksi }}</th>
            </tr>
            <tr>
                <th colspan="7" class="text-right">Total Denda</th>
                <th>Rp {{ number_format($totalDenda, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>