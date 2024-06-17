<?php

namespace App\Infrastructure\Traits;

trait Uuid
{
    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }
    // public function getIncrementing(): bool {
    //     return false;
    // }
    // public function getKeyType(): string {
    //     return 'string';
    // }
}
