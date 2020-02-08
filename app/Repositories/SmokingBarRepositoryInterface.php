<?php

namespace App\Repositories;

use App\Http\Requests\SmokingBarRequest;

interface SmokingBarRepositoryInterface
{
    public function all();

    public function get($id);

    public function save(SmokingBarRequest $request);

    public function update(SmokingBarRequest $request, $id);

    public function delete($id);
}
