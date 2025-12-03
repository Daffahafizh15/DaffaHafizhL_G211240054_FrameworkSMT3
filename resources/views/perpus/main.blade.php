<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f5f3ff 0%, #faf5ff 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .dashboard-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .dashboard-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #5b21b6;
            margin-bottom: 8px;
        }

        .dashboard-header p {
            font-size: 15px;
            color: #7c3aed;
            opacity: 0.8;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .menu-card {
            background: white;
            border-radius: 16px;
            padding: 32px 28px;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.12);
            border: 1px solid #e9d5ff;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
            position: relative;
            overflow: hidden;
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #8b5cf6, #a78bfa);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(139, 92, 246, 0.2);
            border-color: #c4b5fd;
            text-decoration: none;
        }

        .menu-card:hover::before {
            transform: scaleX(1);
        }

        .menu-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #f3e8ff, #e9d5ff);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 28px;
        }

        .menu-card:hover .menu-icon {
            background: linear-gradient(135deg, #e9d5ff, #ddd6fe);
        }

        .menu-title {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .menu-desc {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.5;
            margin: 0;
        }

        .logout-section {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.12);
            border: 1px solid #e9d5ff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .logout-info {
            flex: 1;
        }

        .logout-info h3 {
            font-size: 16px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 4px;
        }

        .logout-info p {
            font-size: 14px;
            color: #6b7280;
            margin: 0;
        }

        .btn-logout {
            padding: 11px 24px;
            font-size: 15px;
            font-weight: 500;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
            background: white;
            color: #dc2626;
            border: 1.5px solid #fecaca;
        }

        .btn-logout:hover {
            background: #fef2f2;
            border-color: #fca5a5;
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 28px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .logout-section {
                flex-direction: column;
                text-align: center;
            }

            .btn-logout {
                width: 100%;
            }
        }

        .dashboard-container {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .menu-card:nth-child(1) {
            animation: slideIn 0.4s ease 0.1s backwards;
        }

        .menu-card:nth-child(2) {
            animation: slideIn 0.4s ease 0.2s backwards;
        }

        .menu-card:nth-child(3) {
            animation: slideIn 0.4s ease 0.3s backwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Dashboard Perpustakaan</h1>
            <p>Sistem Manajemen Perpustakaan FTIK USM</p>
        </div>

        <div class="menu-grid">
            <a href="{{ url('buku') }}" class="menu-card">
                <div class="menu-icon">📚</div>
                <div class="menu-title">Data Buku</div>
                <p class="menu-desc">Kelola koleksi buku perpustakaan, tambah, edit, dan hapus data buku</p>
            </a>

            <a href="{{ url('anggota') }}" class="menu-card">
                <div class="menu-icon">👥</div>
                <div class="menu-title">Data Anggota</div>
                <p class="menu-desc">Manajemen data anggota perpustakaan dan informasi keanggotaan</p>
            </a>

            <a href="{{ url('pinjam') }}" class="menu-card">
                <div class="menu-icon">📦</div>
                <div class="menu-title">Transaksi Peminjaman</div>
                <p class="menu-desc">Catat dan kelola peminjaman serta pengembalian buku anggota</p>
            </a>
        </div>

        <div class="logout-section">
            <div class="logout-info">
                <h3>Selesai menggunakan sistem?</h3>
                <p>Jangan lupa logout untuk keamanan akun anda</p>
            </div>
            <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">
                    Keluar
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>