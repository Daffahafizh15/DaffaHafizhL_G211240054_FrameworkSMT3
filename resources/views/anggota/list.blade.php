<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Anggota</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: 'Inter', sans-serif;
            padding: 40px 0;
            color: #fff;
        }

        .card {
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            animation: slideFadeIn 0.7s ease forwards;
        }

        @keyframes slideFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            background: transparent !important;
            border-bottom: none;
            padding: 1.8rem 2.5rem;
            font-size: 1.6rem;
            font-weight: 700;
            text-align: center;
            color: #fff;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.35);
            letter-spacing: 0.05em;
        }

        .btn-add {
            background: rgba(255, 255, 255, 0.75);
            color: #2575fc;
            font-weight: 700;
            border-radius: 16px;
            padding: 0.5rem 1.4rem;
            box-shadow: 0 4px 10px rgba(37, 117, 252, 0.5);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-add:hover {
            background: #fff;
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 117, 252, 0.7);
            color: #174a9b;
            text-decoration: none;
        }

        table {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 16px;
            overflow: hidden;
            color: #0e2a47;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        thead {
            background: rgba(255, 255, 255, 0.40);
            font-weight: 700;
            color: #112d57;
        }

        tbody tr {
            transition: background 0.3s ease, transform 0.2s ease;
        }

        tbody tr:hover {
            background: rgba(255, 255, 255, 0.6);
            transform: scale(1.02);
            color: #003077;
        }

        .btn-custom {
            border-radius: 14px;
            font-weight: 600;
            transition: transform 0.2s ease;
            padding: 0.3rem 0.8rem;
        }

        .btn-custom:hover {
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #f0ad4e;
            border: none;
            color: #fff;
            box-shadow: 0 4px 8px rgba(240, 173, 78, 0.6);
        }

        .btn-warning:hover {
            background-color: #ec971f;
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
            color: #fff;
            box-shadow: 0 4px 8px rgba(217, 83, 79, 0.6);
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .d-flex.justify-content-between {
            padding: 1.5rem 2rem;
        }

        .btn-back {
            border-radius: 16px;
            font-weight: 700;
            padding: 0.5rem 1.4rem;
            background: rgba(255, 255, 255, 0.75);
            color: #2575fc;
            box-shadow: 0 4px 10px rgba(37, 117, 252, 0.5);
            transition: transform 0.3s ease, background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #fff;
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 117, 252, 0.7);
            color: #174a9b;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="col-lg-10 mx-auto">
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>👥 Daftar Anggota</h2>
                <a href="{{ url('anggota/add') }}" class="btn btn-add btn-sm shadow-sm">+ Tambah Anggota</a>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead>
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Progdi</th>
                                <th style="width: 160px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($query as $row)
                            <tr>
                                <td>
                                    {{ ($query->currentPage() - 1) * $query->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $optprogdi[$row->progdi] ?? $row->progdi }}</td>
                                <td>
                                    <a href="{{ url('anggota/edit/'.$row->ID_Anggota) }}" 
                                       class="btn btn-warning btn-sm btn-custom">✏️ Edit</a>
                                    <a href="{{ url('anggota/delete/'.$row->ID_Anggota) }}"
                                       class="btn btn-danger btn-sm btn-custom"
                                       onclick="return confirm('Yakin ingin menghapus anggota ini?')">
                                       🗑️ Hapus
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Tidak ada data anggota.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 px-2">
                    <a href="{{ url('/perpus') }}" class="btn btn-back">← Kembali ke Home</a>
                    <div>{{ $query->links('pagination::bootstrap-4') }}</div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
