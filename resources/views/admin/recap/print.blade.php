<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Rekap Absensi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            color: #222;
            margin: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h2 {
            margin: 0 0 5px;
        }

        .header p {
            margin: 3px 0;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            font-size: 12px;
        }

        th {
            background: #eee;
            text-align: center;
        }

        td {
            vertical-align: middle;
        }

        .center {
            text-align: center;
        }

        .signature {
            margin-top: 60px;
            width: 250px;
            margin-left: auto;
            text-align: center;
        }

        @media print {
            body {
                margin: 15px;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="header">

        <h2>LAPORAN REKAP ABSENSI SISWA</h2>

        <p>Sistem Informasi Absensi Sekolah</p>

        <p>
            Dicetak pada:
            {{ now()->format('d-m-Y H:i') }}
        </p>

    </div>


    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($attendances as $attendance)

                <tr>

                    <td class="center">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d-m-Y') }}
                    </td>

                    <td>
                        {{ $attendance->waktu }}
                    </td>

                    <td>
                        {{ $attendance->student->nis ?? '-' }}
                    </td>

                    <td>
                        {{ $attendance->student->nama ?? '-' }}
                    </td>

                    <td>
                        {{ $attendance->student->schoolClass->nama_kelas ?? '-' }}
                    </td>

                    <td class="center">
                        {{ $attendance->status }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" class="center">
                        Belum ada data absensi.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>


    <div class="signature">

        Mengetahui,<br>
        Admin Absensi

        <br><br><br><br>

        ____________________

    </div>


    <script>
        window.onload = function () {
            window.print();
        };
    </script>

</body>

</html>