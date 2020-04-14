<?php


namespace App\DBContext\Traits\ColumnMutator;

trait ProjectColumnMutatorTrait
{
    /** @noinspection PhpUnused */
    final public function setApiTokenAttribute(string $value): void
    {
        $this->attributes['api_token'] = hash('sha256', $value);
    }
}
