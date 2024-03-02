<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'meta_title',
        'meta_description',
        'section_1',
        'section_2',
        'section_3',
        'section_4',
        'section_5',
        'section_6',
        'section_7',
        'section_8'
    ];
}
