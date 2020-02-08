<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface HookahRepositoryInterface
{
    public function all();

    public function get($id);

    public function update(Request $request, $id);

    public function delete($id);
}
