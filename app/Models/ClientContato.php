<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientContato extends Model
{
    use HasFactory;

    protected $table = 'clientes_contatos';

    protected $fillable = [
        'tipo',
        'valor',
        'principal',
        'client_id',
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
