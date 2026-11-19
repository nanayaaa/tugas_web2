<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Shuttle</title>
</head>
<body>
    <h2>Daftar Armada Shuttle</h2>

    <a href="{{ route('shuttles.create') }}">Tambah Armada Baru</a>
    <br><br>

    <!-- Form Pencarian (GET) -->
    <form action="{{ route('shuttles.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari nama armada..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </form>

    <br>

    <!-- Tabel Data -->
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Armada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($shuttles as $index => $shuttle)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $shuttle->nama_armada }}</td>
                    <td>
                        <a href="{{ route('shuttles.edit', $shuttle->id) }}">Edit</a>

                        <!-- Form Hapus Data (Method Spoofing DELETE) -->
                        <form action="{{ route('shuttles.destroy', $shuttle->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Data armada tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('shuttles.export-pdf') }}" class="btn">Unduh Laporan PDF</a>
</body>
</html>
