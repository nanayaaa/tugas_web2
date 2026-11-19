<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Shuttle</title>
    <style>
        .text-red {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>

<body>
    <h1>Tambah Armada Shuttle</h1>

    <form action="{{ route('shuttles.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama_armada">Nama Armada:</label><br>
            <input type="text" name="nama_armada" id="nama_armada"
                value="{{ old('nama_armada') }}">
            @error('nama_armada')
                <br><span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <label for="kapasitas">Kapasitas (Orang):</label><br>
            <input type="number" name="kapasitas" id="kapasitas" min="10" max="60"
            value="{{ old('kapasitas') }}">
            @error('kapasitas')
                <br><span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <label for="rute_operasional">Rute Operasional:</label><br>
            <input type="text" name="rute_operasional" id="rute_operasional"
                placeholder="Contoh: K" value="{{ old('rute_operasional') }}">
            @error('rute_operasional')
                <br><span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <label for="status_aktif">Status Aktif:</label><br>
            <select name="status_aktif" id="status_aktif">
                <option value="1" {{ old('status_aktif', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('status_aktif') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            @error('status_aktif')
                <br><span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <button type="submit">Simpan</button>
    </form>

    <br>
</body>

</html>
