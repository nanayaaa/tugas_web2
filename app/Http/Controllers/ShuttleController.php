<?php
namespace App\Http\Controllers;
use App\Models\Shuttle;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ShuttleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Logika Filtering berdasarkan input 'search' dari form
        $shuttles = Shuttle::when($request->search, function ($query, $search) {
            return $query->where('nama_armada', 'like', "%{$search}%");
        })->get();

        return view('shuttles.index', compact('shuttles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shuttles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_armada' => 'required|string|max:50',
            'kapasitas' => 'required|numeric|min:10|max:60',
            'rute_operasional' => 'required|string'
        ]);

        // boolean() membaca checkbox/select/radio; kalau tidak dikirim, hasilnya false
        $validated['status_aktif'] = $request->boolean('status_aktif');

        Shuttle::create($validated);

        return redirect()->route('shuttles.index')->with('succes', 'Data armada berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shuttle = Shuttle::findOrFail($id);
        return view('shuttles.edit', compact('shuttle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_armada' => 'required|string|max:50',
            'kapasitas' => 'required|numeric|min:10|max:60',
            'rute_operasional' => 'required|string'
        ]);

        $validated['status_aktif'] = $request->boolean('status_aktif');

        $shuttle = Shuttle::findOrFail($id);
        $shuttle->update($validated);

        return redirect()->route('shuttles.index')->with('succes', 'Data armada berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shuttle = Shuttle::findOrFail($id);
        $shuttle->delete();

        return redirect()->route('shuttles.index')->with('succes', 'Data armada berhasil dihapus.');
    }

    /**
     * -----------------------------------------------------------------
     * TAMBAHAN: Method untuk Ekspor PDF (Modul Praktikum)
     * -----------------------------------------------------------------
     */
    public function exportPdf()
    {
        // Ambil data armada dari database
        $shuttles = Shuttle::all();

        // Load view PDF yang nanti akan kita buat
        $pdf = Pdf::loadView('shuttles.pdf', compact('shuttles'));

        // Unduh file hasil render PDF
        return $pdf->download('laporan-armada-shuttle.pdf');
    }
}
