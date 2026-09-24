<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['payload'])]
class Contacto extends Model
{
    public $timestamps = false;

    public const CREATED_AT = 'created_at';

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'created_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Contacto $contacto): void {
            $contacto->created_at ??= now();
        });
    }
}
