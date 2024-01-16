<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Reservation extends Model
{
    protected $fillable = ['trajet', 'classe', 'date', 'horaire_id','qr_code', 'date_expiration'];

    public function _horaire()
{
    return $this->belongsTo(Horaire::class,);
}

public function generateQRCode()
    {
        if ($this->id) {
            $qrCode = QrCode::size(200)->generate((string) $this->id);
            $this->qr_code = base64_encode($qrCode);
    }}

}

