<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman Buku</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Premium -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            background: #f8f7fc;
            padding: 30px 0;
            min-height: 100vh;
        }

        .main-wrapper {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 6px;
        }

        .page-subtitle {
            font-size: 14px;
            color: #6b7280;
            font-weight: 400;
        }

        .content-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
            border: 1px solid #e9e9f0;
        }

        .card-top {
            padding: 24px 28px;
            border-bottom: 1px solid #f0f0f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-top h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a2e;
            margin: 0;
        }

        .btn-add {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-add:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
            color: white;
            text-decoration: none;
        }

        .table-wrapper {
            padding: 28px;
        }

        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .custom-table thead th {
            background: #faf9fc;
            color: #4b5563;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            padding: 14px 16px;
            border: none;
            border-bottom: 2px solid #e9e9f0;
        }

        .custom-table thead th:first-child {
            border-radius: 8px 0 0 0;
        }

        .custom-table thead th:last-child {
            border-radius: 0 8px 0 0;
        }

        .custom-table tbody td {
            padding: 16px;
            border-bottom: 1px solid #f0f0f5;
            color: #374151;
            font-size: 14px;
            vertical-align: middle;
        }

        .custom-table tbody tr:last-child td {
            border-bottom: none;
        }

        .custom-table tbody tr {
            transition: background 0.15s ease;
        }

        .custom-table tbody tr:hover {
            background: #faf9fc;
        }

        .member-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .member-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #c084fc 0%, #e879f9 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
        }

        .member-details {
            display: flex;
            flex-direction: column;
        }

        .member-name {
            font-weight: 600;
            color: #1a1a2e;
            font-size: 14px;
            line-height: 1.3;
        }

        .member-nim {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 2px;
        }

        .book-title {
            font-weight: 500;
            color: #1f2937;
        }

        .date-badge {
            display: inline-block;
            padding: 4px 10px;
            background: #f3f4f6;
            border-radius: 6px;
            font-size: 13px;
            color: #4b5563;
            font-weight: 500;
        }

        .btn-delete {
            background: #fee;
            color: #dc2626;
            padding: 7px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete:hover {
            background: #fecaca;
            color: #b91c1c;
            text-decoration: none;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        .empty-text {
            color: #9ca3af;
            font-size: 15px;
        }

        .footer-section {
            padding: 20px 28px;
            border-top: 1px solid #f0f0f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-back {
            background: white;
            color: #6b7280;
            padding: 9px 18px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid #e5e7eb;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-back:hover {
            background: #f9fafb;
            border-color: #d1d5db;
            color: #4b5563;
            text-decoration: none;
        }

        .pagination {
            display: flex;
            gap: 4px;
            margin: 0;
        }

        .page-item .page-link {
            border: 1px solid #e5e7eb;
            color: #6b7280;
            padding: 8px 14px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            margin: 0 2px;
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
            border-color: #7c3aed;
            color: white;
        }

        .page-item .page-link:hover {
            background: #f9fafb;
            color: #374151;
        }

        @media (max-width: 768px) {
            .card-top {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
            }

            .footer-section {
                flex-direction: column;
                gap: 16px;
            }

            .table-wrapper {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="page-header">
            <h1 class="page-title">📚 Peminjaman Buku</h1>
            <p class="page-subtitle">Kelola dan pantau data peminjaman buku perpustakaan</p>
        </div>

        <div class="content-card">
            <div class="card-top">
                <h3>Daftar Peminjaman</h3>
                <a href="{{ url('pinjam/add') }}" class="btn-add">
                    <span>+</span> Tambah Peminjaman
                </a>
            </div>

            <div class="table-wrapper">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Anggota</th>
                            <th>Judul Buku</th>
                            <th style="width: 140px;">Tgl Pinjam</th>
                            <th style="width: 140px;">Tgl Kembali</th>
                            <th style="width: 100px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($query as $row)
                        <tr>
                            <td style="text-align: center; color: #9ca3af; font-weight: 600;">
                                {{ ($query->currentPage() - 1) * $query->perPage() + $loop->iteration }}
                            </td>
                            <td>
                                <div class="member-info">
                                    <div class="member-avatar">
                                        {{ strtoupper(substr($row->nama, 0, 1)) }}
                                    </div>
                                    <div class="member-details">
                                        <span class="member-name">{{ $row->nama }}</span>
                                        <span class="member-nim">{{ $row->nim }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="book-title">{{ $row->Judul }}</span>
                            </td>
                            <td>
                                <span class="date-badge">{{ $row->tgl_pinjam }}</span>
                            </td>
                            <td>
                                <span class="date-badge">{{ $row->tgl_kembali }}</span>
                            </td>
                            <td style="text-align: center;">
                                <a href="{{ url('pinjam/delete/'.$row->ID_Pinjam) }}"
                                    class="btn-delete"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-icon">📭</div>
                                    <p class="empty-text">Belum ada data peminjaman</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="footer-section">
                <a href="{{ url('/perpus') }}" class="btn-back">
                    <span>←</span> Kembali
                </a>
                <div>{{ $query->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>