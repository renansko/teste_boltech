<?php

namespace App;

enum TipoContatoEnum:string
{
    case Email = 'email';
    case Telefone = 'telefone';
    case Outro = 'outro';
}
