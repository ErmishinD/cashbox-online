<?php

namespace App\Contracts;


use Illuminate\Database\Eloquent\Builder;

interface ShouldReturnGetForSelect
{
    public function scopePrepareForSelect(Builder $builder);
}
