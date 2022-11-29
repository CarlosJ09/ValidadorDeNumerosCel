<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'email'
    ];

    public function report(){
        return $this->hasOne(Report::class);
    }

    

}
