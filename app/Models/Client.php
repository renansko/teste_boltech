<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'telefone',
        'document',
    ];

    public function clientContato() 
    {
        return $this->hasMany(ClientContato::class);
    }


}
