<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'total_score', 'diagnosis_id'

    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function diagnosis() {
        return $this->belongsTo(Diagnosis::class);
    }
}
