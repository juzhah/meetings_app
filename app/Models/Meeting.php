<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Meeting extends Model
{
    /** @use HasFactory<\Database\Factories\MeetingFactory> */
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'banner_image',
        'ocurrence_day',
        'attendants_capacity_limit',
        'organizer_id',
        'category_id',
        'location_id',
        'modality_id'
    ];

    /**
     * Get the user Organizer.
     *
     * @return User
     */
    protected function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    /**
     * Get all the attendants to the meeting. If no attendants, returns null.
     *
     * @return array<users, null>
     */
    protected function attendants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_meeting');
    }

    /**
     * Get the meeting's category.
     *
     * @return Category
     */
    protected function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the meeting Location if it has any, otherwise it returns null.
     *
     * @return Location<Location, null>
     */
    protected function location(): HasOne
    {
        return $this->hasOne(Location::class, 'location_id');
    }

    /**
     * Get the meeting modality.
     *
     * @return Meeting<virtual, onSite, hybrid>
     */
    protected function modality(): HasOne
    {
        return $this->hasOne(Location::class, 'modality_id');
    }
}
