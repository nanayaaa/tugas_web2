<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Shuttle</title>
    <style>
        .text-red {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>

<body>
    <h2>Edit Armada Shuttle</h2>
    <body>
    <h2>Daftar Armada Shuttle</h2>

    @if (session('succes'))
        <p style="color: green;">{{ session('succes') }}</p>
    @endif

    <a href="{{ route('shuttles.create') }}">Tambah Armada Baru</a>
    <br><br>

    <form action="{{ route('shuttles.update', $shuttle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_armada">Nama Armada:</label><br>
            <input type="text" name="nama_armada" id="nama_armada"
                value="{{ old('nama_armada', $shuttle->nama_armada) }}">
            @error('nama_armada')
                <br><span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <label for="kapasitas">Kapasitas (Orang):</label><br>
           <input type="number" name="kapasitas" id="kapasitas" min="10" max="60"
                value="{{ old('kapasitas', $shuttle->kapasitas) }}">
            @error('kapasitas')
                <br><span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <label for="rute_operasional">Rute Operasional:</label><br>
            <input type="text" name="rute_operasional" id="rute_operasional"
                value="{{ old('rute_operasional', $shuttle->rute_operasional) }}">
            @error('rute_operasional')
                <br><span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <label for="status_aktif">Status Aktif:</label><br>
            <select name="status_aktif" id="status_aktif">
                <option value="1"
                    {{ old('status_aktif', $shuttle->status_aktif) == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0"
                    {{ old('status_aktif', $shuttle->status_aktif) == '0' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            @error('status_aktif')
                <br><span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <button type="submit">Update</button>
        <a href="{{ route('shuttles.index') }}">Batal</a>
    </form>
</body>

</html>
