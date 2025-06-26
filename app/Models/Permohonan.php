<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    protected $fillable = [
        'user_id',
        'jawatan_id',
        'catatan',
        'status',
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_REJECTED = 'rejected';

    public function jawatan()
    {
        return $this->belongsTo(Jawatan::class, 'jawatan_id', 'id');
    }
}
