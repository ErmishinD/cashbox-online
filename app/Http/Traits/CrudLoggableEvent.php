<?php


namespace App\Http\Traits;


trait CrudLoggableEvent
{
    public function getLoggableType(): ?string
    {
        return get_class($this->object);
    }

    public function getLoggableId(): ?int
    {
        return $this->object->id;
    }

    public function getAdditionalData(): ?array
    {
        return null;
    }
}
