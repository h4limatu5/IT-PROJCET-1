<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use App\Models\Bimbingan;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->get('role', 'mahasiswa');
        $userId = $request->get('user_id');

        return view('kalender.index', compact('role', 'userId'));
    }

    public function events(Request $request)
    {
        $role = $request->get('role', 'mahasiswa');
        $userId = $request->get('user_id');

        $events = [];

        // Fetch seminars based on role
        if ($role === 'mahasiswa' && $userId) {
            $seminars = Seminar::where('mahasiswa_id', $userId)->get();
        } elseif ($role === 'dosen' && $userId) {
            $seminars = Seminar::where('dosen_id', $userId)->get();
        } elseif (in_array($role, ['kaprodi', 'admin'])) {
            $seminars = Seminar::all();
        } else {
            $seminars = collect();
        }

        foreach ($seminars as $seminar) {
            $events[] = [
                'id' => 'seminar-' . $seminar->id,
                'title' => 'Seminar: ' . $seminar->title,
                'start' => $seminar->date . 'T' . $seminar->time,
                'description' => $seminar->description,
                'location' => $seminar->location,
                'status' => $seminar->status,
                'type' => 'seminar',
            ];
        }

        // Fetch bimbingans based on role
        if ($role === 'mahasiswa' && $userId) {
            $bimbingans = Bimbingan::where('mahasiswa_id', $userId)->get();
        } elseif ($role === 'dosen' && $userId) {
            $bimbingans = Bimbingan::where('dosen_id', $userId)->get();
        } elseif (in_array($role, ['kaprodi', 'admin'])) {
            $bimbingans = Bimbingan::all();
        } else {
            $bimbingans = collect();
        }

        foreach ($bimbingans as $bimbingan) {
            $events[] = [
                'id' => 'bimbingan-' . $bimbingan->id,
                'title' => 'Bimbingan: ' . $bimbingan->title,
                'start' => $bimbingan->date . 'T' . $bimbingan->time,
                'description' => $bimbingan->description,
                'location' => $bimbingan->location,
                'status' => $bimbingan->status,
                'type' => 'bimbingan',
            ];
        }



        return response()->json($events);
    }
}
