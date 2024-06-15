<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OS extends Model
{
    use HasFactory;


    public function cliente(): BelongsTo
    {
        return $this->BelongsTo(Cliente::class);
    }

    public function servico(): BelongsTo
    {
        return $this->BelongsTo(Servico::class);
    }

    
}
