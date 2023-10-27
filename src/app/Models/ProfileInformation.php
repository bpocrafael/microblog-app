<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileInformation extends Model
{
    protected $table = 'profile_information';

    protected $fillable = [
        'firstname',
        'middlename',
        'surname',
        'image',
        'about',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
