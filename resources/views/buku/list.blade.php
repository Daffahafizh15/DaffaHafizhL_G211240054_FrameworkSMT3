<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f3ff 0%, #faf5ff 100%);
            font-family: "Inter", -apple-system, BlinkMacSystemFont, sans-serif;
            padding: 20px 0;
            min-height: 100vh;
        }

        .main-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #5b21b6;
            margin: 0;
        }

        .btn {
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-add {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);
        }

        .btn-add:hover {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
            color: white;
        }

        .table-container {
            background: white;
            border-radius: 16px;
            padding: 0;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.12);
            border: 1px solid #e9d5ff;
            overflow: hidden;
        }

        .table {
            margin: 0;
            width: 100%;
        }

        .table thead {
            background: #faf5ff;
            border-bottom: 2px solid #e9d5ff;
        }

        .table thead th {
            padding: 16px 20px;
            font-size: 13px;
            font-weight: 600;
            color: #6b21a8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        .table tbody td {
            padding: 18px 20px;
            vertical-align: middle;
            border-top: 1px solid #f3e8ff;
            border-left: none;
            border-right: none;
            color: #374151;
            font-size: 14px;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background: #faf5ff;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .number-cell {
            color: #9ca3af;
            font-weight: 500;
            font-size: 13px;
        }

        .book-title {
            font-weight: 600;
            color: #1a1a1a;
        }

        .category-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            background: #f3e8ff;
            color: #7c3aed;
            border: 1px solid #e9d5ff;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn-edit {
            background: #f3e8ff;
            color: #7c3aed;
            padding: 6px 14px;
            font-size: 13px;
            border: 1px solid #e9d5ff;
        }

        .btn-edit:hover {
            background: #e9d5ff;
            color: #6d28d9;
            transform: translateY(-1px);
        }

        .btn-delete {
            background: #fef2f2;
            color: #dc2626;
            padding: 6px 14px;
            font-size: 13px;
            border: 1px solid #fecaca;
        }

        .btn-delete:hover {
            background: #fee2e2;
            color: #b91c1c;
            transform: translateY(-1px);
        }

        .table-footer {
            padding: 20px 24px;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f3e8ff;
            flex-wrap: wrap;
            gap: 16px;
        }

        .btn-back {
            background: white;
            color: #7c3aed;
            border: 1.5px solid #ddd6fe;
            padding: 8px 18px;
            font-size: 14px;
        }

        .btn-back:hover {
            background: #faf5ff;
            border-color: #c4b5fd;
            color: #6d28d9;
        }

        .pagination {
            margin: 0;
        }

        .page-link {
            color: #7c3aed;
            border: 1px solid #e9d5ff;
            padding: 8px 14px;
            margin: 0 3px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
        }

        .page-link:hover {
            background: #f3e8ff;
            border-color: #c4b5fd;
            color: #6d28d9;
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            border-color: #7c3aed;
            color: white;
        }

        .page-item.disabled .page-link {
            color: #d1d5db;
            border-color: #f3f4f6;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
        }

        .empty-state p {
            font-size: 15px;
            margin: 0;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .table-container {
                overflow-x: auto;
            }

            .table {
                min-width: 700px;
            }

            .table-footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        .table-container {
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="page-header">
            <h1>Daftar Buku</h1>
            <a href="{{ url('buku/add') }}" class="btn btn-add">Tambah Buku Baru</a>
        </div>

        <div class="table-container">
            <div style="overflow-x: auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 70px; text-align: center;">No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th style="width: 150px; text-align: center;">Kategori</th>
                            <th style="width: 180px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($query as $row)
                        <tr>
                            <td class="text-center number-cell">
                                {{ ($query->currentPage() - 1) * $query->perPage() + $loop->iteration }}
                            </td>
                            <td class="book-title">{{ $row['Judul'] }}</td>
                            <td>{{ $row['Pengarang'] }}</td>
                            <td class="text-center">
                                <span class="category-badge">
                                    {{ $optkategori[$row['Kategori']] ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ url('buku/edit/'.$row['ID_Buku']) }}" class="btn btn-edit">
                                        Edit
                                    </a>
                                    <a href="{{ url('buku/delete/'.$row['ID_Buku']) }}" 
                                       class="btn btn-delete"
                                       onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                        Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="empty-state">
                                <p>Belum ada data buku. Klik tombol "Tambah Buku Baru" untuk menambahkan.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="table-footer">
                <a href="{{ url('/perpus') }}" class="btn btn-back">Kembali</a>
                <div>
                    {{ $query->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>