<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReservationController extends Controller
{
    

    public function index()
    {
        $reservations = Reservation::with('_horaire')->get();
        return view('billet', compact('reservations'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'trajet' => 'required',
            'classe' => 'required',
            'date' => 'required',
            'horaire_id' => 'required|exists:_horaire,id', 
        ]);


        $reservation = new Reservation([
            'trajet' => $request->input('trajet'),
            'classe' => $request->input('classe'),
            'date' => $request->input('date'),
            'horaire_id' => $request->input('horaire_id'),
            'date_expiration' => now()->addDays(7),

        ]);

    
        $reservation->generateQRCode();
        $reservation->save();
        return redirect()->route('reservation')->with('success','Votre billet a été reservé !');   
    
    }


}
