<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>

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
            padding: 11px 14px;
            font-size: 15px;
            border: 1.5px solid #ddd6fe;
            border-radius: 10px;
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

        .form-control::placeholder {
            color: #a78bfa;
            opacity: 0.6;
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
        }

        .btn-outline:hover {
            background: #faf5ff;
            border-color: #c4b5fd;
            color: #6d28d9;
        }

        .member-id-badge {
            display: inline-block;
            background: #f3e8ff;
            color: #7c3aed;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 24px;
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 24px 20px;
            }

            .page-header h1 {
                font-size: 24px;
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
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="page-header">
            <h1>Edit Anggota</h1>
            <p>Perbarui informasi anggota perpustakaan</p>
        </div>

        <div class="form-container">
            <div class="member-id-badge">ID Anggota: {{ $query->ID_Anggota }}</div>

            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('anggota/save') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $query->ID_Anggota }}">
                <input type="hidden" name="is_update" value="{{ $is_update ?? 1 }}">

                <div class="form-group">
                    <label for="NIM">NIM</label>
                    <input 
                        type="text" 
                        name="NIM" 
                        id="NIM" 
                        class="form-control" 
                        value="{{ $query->NIM }}" 
                        maxlength="20" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="Nama">Nama Lengkap</label>
                    <input 
                        type="text" 
                        name="Nama" 
                        id="Nama" 
                        class="form-control" 
                        value="{{ $query->Nama }}" 
                        maxlength="100" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="Progdi">Program Studi</label>
                    <select name="Progdi" id="Progdi" class="form-control" required>
                        @foreach ($optprogdi as $key => $value)
                            <option value="{{ $key }}" {{ $query->Progdi == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="action-buttons">
                    <a href="{{ url('anggota') }}" class="btn btn-outline">Batal</a>
                    <button type="submit" name="btn_simpan" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>