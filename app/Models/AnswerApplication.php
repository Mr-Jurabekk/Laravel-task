<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerApplication extends Model
{
    use HasFactory;

    protected $fillable = ['applications_id', 'body'];


    public function application(){return $this->belongsTo(Applications::class); }
}
