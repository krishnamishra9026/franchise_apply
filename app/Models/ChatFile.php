<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatFile extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'chat_id',
        'name',
        'type',
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'id', 'chat_id');
    }
}
