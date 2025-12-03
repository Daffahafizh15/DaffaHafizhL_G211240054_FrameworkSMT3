<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Buku</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

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
            max-width: 680px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #5b21b6;
            margin-bottom: 6px;
        }

        .page-header p {
            color: #7c3aed;
            font-size: 15px;
            opacity: 0.8;
        }

        .form-container {
            background: white;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.12);
            border: 1px solid #e9d5ff;
        }

        .alert {
            border-radius: 10px;
            border: none;
            padding: 14px 16px;
            margin-bottom: 24px;
            background: #fef3f2;
            border-left: 3px solid #ef4444;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert li {
            color: #dc2626;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .alert li:last-child {
            margin-bottom: 0;
        }

        .form-row-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #6b21a8;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 15px 16px;   /* ukuran lebih tebal */
            font-size: 15px;      /* teks lebih besar */
            height: 56px;         /* tinggi dropdown */
            border: 1.5px solid #ddd6fe;
            border-radius: 12px;
            transition: all 0.2s ease;
            background: #fafafa;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.15);
            background: white;
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1.5L6 6.5L11 1.5' stroke='%238b5cf6' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 40px;
            background-color: #fafafa;
        }

        select.form-control:focus {
            background-color: white;
        }

        input[type="date"].form-control {
            cursor: pointer;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: opacity(0.6);
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #f3e8ff;
        }

        .btn {
            padding: 11px 24px;
            font-size: 15px;
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

        .btn-primary {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            color: white;
            flex: 1;
            box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(139, 92, 246, 0.4);
            color: white;
        }

        .btn-outline {
            background: white;
            color: #7c3aed;
            border: 1.5px solid #ddd6fe;
            flex: 1;
        }

        .btn-outline:hover {
            background: #faf5ff;
            border-color: #c4b5fd;
            color: #6d28d9;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #f3e8ff;
        }

        .back-link a {
            color: #7c3aed;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .back-link a:hover {
            color: #6d28d9;
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 24px 20px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .form-row-group {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }
        }

        .form-container {
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

        .info-box {
            background: #f3e8ff;
            border-left: 3px solid #8b5cf6;
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
        }

        .info-box p {
            margin: 0;
            font-size: 14px;
            color: #5b21b6;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="page-header">
            <h1>Form Peminjaman Buku</h1>
            <p>Isi data peminjaman buku untuk anggota perpustakaan</p>
        </div>

        <div class="form-container">
            <div class="info-box">
                <p>💡 Pastikan semua data terisi dengan benar sebelum menyimpan</p>
            </div>

            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('pinjam/save') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="ID_Anggota">Anggota</label>
                    <select name="ID_Anggota" id="ID_Anggota" class="form-control" required>
                        <option value="">Pilih anggota yang meminjam</option>
                        @foreach ($optanggota as $key => $value)
                            <option value="{{ $key }}" {{ old('ID_Anggota') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ID_Buku">Buku</label>
                    <select name="ID_Buku" id="ID_Buku" class="form-control" required>
                        <option value="">Pilih buku yang dipinjam</option>
                        @foreach ($optbuku as $key => $value)
                            <option value="{{ $key }}" {{ old('ID_Buku') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row-group">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                        <input 
                            type="date" 
                            name="tgl_pinjam" 
                            id="tgl_pinjam" 
                            class="form-control"
                            value="{{ old('tgl_pinjam') }}" 
                            required
                        >
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label for="tgl_kembali">Tanggal Kembali</label>
                        <input 
                            type="date" 
                            name="tgl_kembali" 
                            id="tgl_kembali" 
                            class="form-control"
                            value="{{ old('tgl_kembali') }}" 
                            required
                        >
                    </div>
                </div>

                <div class="action-buttons">
                    <button type="reset" class="btn btn-outline">Reset Form</button>
                    <button type="submit" class="btn btn-primary">Simpan Peminjaman</button>
                </div>
            </form>

            <div class="back-link">
                <a href="{{ url('perpus') }}">← Kembali ke Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>