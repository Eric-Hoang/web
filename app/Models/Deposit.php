<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'deposit';
    protected $guarded = [];

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id', 'id');
    }
}
