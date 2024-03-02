<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sendor',
        'sendor_id',
        'receiver',
        'receiver_id',
        'message',
        'status',
        'admin_status'
    ];

    public function files()
    {
        return $this->hasMany(ChatFile::class, 'chat_id', 'id');
    }
    
}
