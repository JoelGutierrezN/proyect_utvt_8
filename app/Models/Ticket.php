<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'date',
        'time',
        'created_by'
    ];

    protected $atttributes = [
        'total' => 0,
    ];

    public function user(){
        return $this->belongsTo( User::class , 'created_by' );
    }
}
