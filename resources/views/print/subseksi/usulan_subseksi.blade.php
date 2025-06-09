<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Daftar Usulan Program</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 20px;
        }

        body {
            font-family: sans-serif;
            font-size: 11px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 5px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #eee;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    @php
        $firstItem = $listProgram->first();
    @endphp

    <!-- Tabel 3x3 -->
    <table>
        <tr>
            <td style="width: 300px"><strong>Nama Seksi</strong></td>
            <td>{{ $firstItem->seksi->nama_seksi ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Nama Sub Seksi</strong></td>
            <td>{{ $firstItem->sub_seksi->nama_sub_seksi ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Program Strategis</strong></td>
            <td>{{ $firstItem->program_strategis ?? '-' }}</td>
        </tr>
    </table>


  
    <!-- Tabel utama -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kegiatan Strategis</th>
                <th>Indikator</th>
                <th>Biaya</th>
                <th>Kelompok Sasaran</th>
                <th>Tempat</th>
                <th>Waktu Kegiatan</th>
                <th>Keterangan</th>
                <th>Status Usulan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listProgram as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->indikator }}</td>
                    <td>Rp{{ number_format($item->biaya, 0, ',', '.') }}</td>
                    <td>{{ $item->kelompok_sasaran }}</td>
                    <td>{{ $item->tempat_kegiatan }}</td>
                    <td>{{ $item->keterangan_waktu }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        @switch($item->status_usulan)
                            @case('1')
                                Tahap Usulan
                            @break

                            @case('2')
                                Tahap Pra Sidang
                            @break

                            @case('3')
                                Ditetapkan
                            @break

                            @case('4')
                                Ditolak
                            @break

                            @default
                                Tidak Diketahui
                        @endswitch
                    </td>
                </tr>
            @endforeach
        </tbody>

        <!-- Total Biaya -->
        <tfoot>
            <tr>
                <th colspan="3" style="text-align: right;">Total Biaya:</th>
                <th>Rp{{ number_format($listProgram->sum('biaya'), 0, ',', '.') }}</th>
                <th colspan="5"></th>
            </tr>
        </tfoot>
    </table>


</body>

</html>
