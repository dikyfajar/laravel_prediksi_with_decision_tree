<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    public $table = 'samples';
    protected $guarded = [''];
    public $timestamps = false;

    public function label()
    {
        return $this->hasOne(Label::class);
    }
}
