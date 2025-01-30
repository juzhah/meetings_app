<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Modality extends Model
{
    /** @use HasFactory<\Database\Factories\ModalityFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all user created meetings. 
     * If no meetings created, returns null
     *
     * @return  Meeting<Meeting, null>
     */
    protected function meetings(): BelongsToMany
    {
        return $this->belongsToMany(Meeting::class, 'meeting_modality');
    }
}
