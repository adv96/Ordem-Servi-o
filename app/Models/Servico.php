<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Servico extends Model
{
    use HasFactory;


    public function os(): HasOne
    {
        return $this->HasOne(OS::class);
    }
}
