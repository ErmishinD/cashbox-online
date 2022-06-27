<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetForSelectRequest;

/**
 * @authenticated
 * @group Get for select
 */
class GetForSelectController extends Controller
{
    public function __invoke(GetForSelectRequest $request)
    {
        $result = [];
        foreach ($request->validated()['entities'] as $entity) {
            $result[$entity] = ('App\\Models\\' . $entity)::prepareForSelect()->get();
        }
        return $result;
    }
}
