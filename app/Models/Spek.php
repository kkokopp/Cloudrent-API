<?php

namespace App\Models;

use App\Models\Mobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spek extends Model
{
    use HasFactory;

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
