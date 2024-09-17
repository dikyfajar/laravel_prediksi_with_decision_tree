<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    public $table = 'labels';
    protected $guarded = [''];
    public $timestamps = false;

    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }
}
