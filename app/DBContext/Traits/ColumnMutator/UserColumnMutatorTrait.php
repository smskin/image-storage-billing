<?php


namespace App\DBContext\Traits\ColumnMutator;

use Hash;

trait UserColumnMutatorTrait
{
    /** @noinspection PhpUnused */
    final public function setApiTokenAttribute(string $value): void
    {
        $this->attributes['api_token'] = hash('sha256', $value);
    }

    /** @noinspection PhpUnused */
    final public function setPasswordAttribute(string $value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
