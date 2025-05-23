<?php 

namespace App\Http\Controllers\Api;

use App\Models\Usulan;
use App\Models\Pengusulan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsulanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');

        $pengusulan = Pengusulan::where('user_id', $user->id)
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('bookTitle', 'like', '%' . $search . '%')
                        ->orWhere('genre', 'like', '%' . $search . '%')
                        ->orWhere('isbn', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('publicationYear', 'like', '%' . $search . '%')
                        ->orWhere('publisher', 'like', '%' . $search . '%')
                        ->orWhere('date', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        if ($request->expectsJson()) {
            $pengusulan = $pengusulan->map(function ($usul) {
                // Perubahan di sini - gunakan path yang konsisten
                $usul->bookImage = $usul->bookImage 
                    ? url('storage/usulan/' . $usul->bookImage)
                    : null;
                return $usul;
            });
            
            return response()->json([
                'status' => true,
                'message' => 'Data riwayat usulan berhasil diambil',
                'data' => $pengusulan
            ], 200);
        }
        // ... kode lainnya
    }   

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'bookTitle' => 'required|string',
            'genre' => 'required|string|max:255',
            'isbn' => 'nullable|string',
            'author' => 'required|string|max:255',
            'publicationYear' => 'required|string',
            'publisher' => 'required|string|max:255',
            'date' => 'required|date',
            'bookImage' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Simpan gambar jika ada
        $bookImagePath = null;
        if ($request->hasFile('bookImage')) {
            $originalName = $request->file('bookImage')->getClientOriginalName(); 
            
            $request->file('bookImage')->storeAs('usulan', $originalName, 'public');
            $bookImagePath = $originalName;
        }
        
        $usulan = Pengusulan::create([
            'bookTitle' => $request->bookTitle,
            'genre' => $request->genre,
            'isbn' => $request->isbn,
            'author' => $request->author,
            'publicationYear' => $request->publicationYear,
            'publisher' => $request->publisher,
            'date' => $request->date,
            'bookImage' => $bookImagePath,
            'status' => 'diproses',  
            'user_id' => Auth::id(),      
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Usulan berhasil dikirim',
            'data' => $usulan
        ], 201);
    }

 public function update(Request $request, $id)
{
    $pengusulan = Pengusulan::findOrFail($id);

    $validated = $request->validate([
        'bookTitle' => 'required|string',
        'genre' => 'required|string|max:255',
        'isbn' => 'nullable|string',
        'author' => 'required|string|max:255',
        'publicationYear' => 'required|string',
        'publisher' => 'required|string|max:255',        
        'bookImage' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('bookImage')) {
        // Delete old image if exists
        if ($pengusulan->bookImage) {
            Storage::disk('public')->delete($pengusulan->bookImage);
        }
        $validated['bookImage'] = $request->file('bookImage')->store('usulan', 'public');
    } elseif ($request->input('remove_image')) {
        // Handle explicit image removal
        if ($pengusulan->bookImage) {
            Storage::disk('public')->delete($pengusulan->bookImage);
        }
        $validated['bookImage'] = null;
    }

    $pengusulan->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Book updated successfully',
        'data' => $pengusulan->fresh(),
    ]);
}

public function destroy($id)
{
    try {
        $pengusulan = Pengusulan::findOrFail($id);
        
        // Delete associated image if exists
        if ($pengusulan->bookImage) {
            Storage::disk('public')->delete($pengusulan->bookImage);
        }
        
        $pengusulan->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Usulan berhasil dihapus'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus usulan: ' . $e->getMessage()
        ], 500);
    }
}

// In your UsulanController.php
public function deleteAll($userId)
{
    try {
        // Delete all usulan for this user
        $deleted = Pengusulan::where('user_id', $userId)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Semua usulan berhasil dihapus',
            'deleted_count' => $deleted
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus usulan: ' . $e->getMessage()
        ], 500);
    }
}

}
