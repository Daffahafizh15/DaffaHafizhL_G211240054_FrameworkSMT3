<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Anggota</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: 'Inter', sans-serif;
            padding-top: 40px;
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            padding: 2.5rem 3rem;
            max-width: 480px;
            width: 100%;
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
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            letter-spacing: 0.05em;
            color: #fff;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.35);
        }

        label {
            font-weight: 600;
            color: #f1f1f1;
            display: block;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 16px;
            border: none;
            background: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
            color: #111;
            transition: box-shadow 0.3s ease, transform 0.25s ease;
            outline-offset: 2px;
            outline-color: transparent;
        }

        input[type="text"]:focus,
        select:focus {
            box-shadow: 0 0 12px 3px #6a11cb;
            outline-color: transparent;
            transform: scale(1.04);
            background: rgba(255, 255, 255, 0.85);
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        button,
        a.btn {
            flex: 1;
            padding: 0.9rem 1.2rem;
            font-size: 1.1rem;
            font-weight: 700;
            border-radius: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.25s ease;
            text-align: center;
            color: #fff;
            text-decoration: none;
            user-select: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            display: inline-block;
        }

        button.btn-success {
            background: linear-gradient(135deg, #00f5a0 0%, #00d9f5 100%);
        }

        button.btn-success:hover {
            background: linear-gradient(135deg, #00c885 0%, #00b0cc 100%);
            transform: scale(1.05);
        }

        a.btn-secondary {
            background: linear-gradient(135deg, #7a11cb 0%, #2575fc 100%);
            color: #fff;
            box-shadow: 0 4px 10px rgba(106, 17, 203, 0.6);
        }

        a.btn-secondary:hover {
            background: linear-gradient(135deg, #5c09a8 0%, #1c5cd1 100%);
            transform: scale(1.05);
            color: #e0e0e0;
            text-decoration: none;
        }

        .alert-danger {
            background: rgba(255, 60, 60, 0.15);
            border: 1px solid rgba(255, 60, 60, 0.4);
            border-radius: 12px;
            padding: 1rem 1.2rem;
            color: #ff3c3c;
            font-weight: 600;
            box-shadow: 0 0 14px rgba(255, 60, 60, 0.3);
            margin-bottom: 1.5rem;
            user-select: none;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 1.2rem;
        }
    </style>
</head>
<body>

<div class="card" role="region" aria-label="Form Tambah Anggota">
    <div class="card-header">👥 Form Tambah Anggota</div>

    {{-- Pesan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('anggota/save') }}" method="POST" novalidate>
        @csrf

        <input type="hidden" name="id" value="" />
        <input type="hidden" name="is_update" value="{{ $is_update ?? 0 }}" />

        <div>
            <label for="nim">🆔 NIM</label>
            <input
                type="text"
                id="nim"
                name="nim"
                maxlength="20"
                required
                autocomplete="off"
                placeholder="Masukkan NIM"
                value="{{ old('nim') }}"
            />
        </div>

        <div>
            <label for="nama">👤 Nama</label>
            <input
                type="text"
                id="nama"
                name="nama"
                maxlength="100"
                required
                autocomplete="off"
                placeholder="Masukkan nama lengkap"
                value="{{ old('nama') }}"
            />
        </div>

        <div>
            <label for="progdi">🎓 Program Studi</label>
            <select id="progdi" name="progdi" required aria-required="true">
                @foreach ($optprogdi as $key => $value)
                    <option value="{{ $key }}" {{ old('progdi') == $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="btn-container">
            <button type="submit" class="btn btn-success" name="btn_simpan" aria-label="Simpan anggota baru">
                💾 Simpan
            </button>
            <a href="{{ url('anggota') }}" class="btn btn-secondary" aria-label="Kembali ke daftar anggota">
                ⬅️ Kembali
            </a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
