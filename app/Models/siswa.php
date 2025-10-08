<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class siswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ekskul(): BelongsTo
    {
        return $this->belongsTo(ekskul::class);
    }
 

}
