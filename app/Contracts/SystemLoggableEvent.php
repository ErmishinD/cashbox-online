<?php

namespace App\Contracts;


interface SystemLoggableEvent
{
    public function getLoggableType(): ?string;

    public function getLoggableId(): ?int;

    public function getAdditionalText(): ?string;
}
