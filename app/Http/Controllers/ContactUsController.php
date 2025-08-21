<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{

    

    // Simpan pesan Contact Us
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:150',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactUs::create($request->all());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim. Terima kasih!');
    }

    // Tampilkan semua pesan di admin
    public function index()
    {
        $messages = ContactUs::latest()->get();
        return view('admin.admin-massage', compact('messages'));
    }

    // Hapus pesan
    public function destroy($id)
    {
        $message = ContactUs::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
