<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $primaryKey = 'report_id'; // ⬅️ ⬅️ INI WAJIB!

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'reporter_name',
        'reporter_phone',
        'title',
        'description',
        'location',
        'priority',
        'status',
        'image_path',
        'report_token',
        'user_id',
    ];
}
