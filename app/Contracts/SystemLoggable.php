<?php

namespace App\Contracts;


interface SystemLoggable
{
    public function getTextForAudit(string $action): string;

    public function getVueRoute(string $action): ?string;

    public function getVueParams(string $action): array;
}
