<?php

namespace App\Models;

use App\Enums\ChargeStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Expr\Cast;

class OS extends Model
{
    use HasFactory;


    protected $casts = [

        'status' => ChargeStatusEnum::class,
    ];

    public function cliente(): BelongsTo
    {
        return $this->BelongsTo(Cliente::class);
    }

    public function servico(): BelongsTo
    {
        return $this->BelongsTo(Servico::class);
    }

    protected $fillable = ['quantidade'];

    public static function rules()
    {
        return [
            'quantidade' => 'required|integer|min:1|max:50',
        ];
    }
    
}
