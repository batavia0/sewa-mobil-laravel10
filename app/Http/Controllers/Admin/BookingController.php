<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('is_admin')) {
            $bookings = Booking::with('car')->get();
            return view('admin.bookings.index', compact('bookings'));
        }
        if (Gate::allows('is_rent_user')) {
            $bookings = Booking::with('car')->where('approved', true)
            ->where('nomer_wa', auth()->user()->tel)
            ->get();
            return view('admin.bookings.index', compact('bookings'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $statuses = Booking::statuses();
        $booking = Booking::with('car')->findOrFail($booking->id);
        return view('admin.bookings.edit', compact('booking','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'approved' => 'required',
        ]);
    
        // Mendapatkan nilai 'approved' dari request
        $approved = $request->input('approved');
    
        // Memperbarui data booking dengan nilai 'approved' yang baru
        $booking->update(['approved' => $approved]);
        return redirect()->route('admin.bookings.index')->with([
            'message' => 'berhasil di edit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Update the car returned
     */
    public function carReturn(Request $request, Booking $booking)
    {
        $request->validate([
            'car_returned_at' => 'required',
        ]);
    
        $returned = $request->input('car_returned_at');
    
        $booking->update(['car_returned_at' => $returned]);
        return redirect()->route('user_rent.bookings.index')->with([
            'message' => 'Mobil berhasil dikembalikan',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus !',
            'alert-type' => 'danger'
        ]);
    }
}
