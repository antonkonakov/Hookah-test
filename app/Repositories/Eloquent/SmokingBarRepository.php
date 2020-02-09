<?php


namespace App\Repositories\Eloquent;

use App\Http\Requests\SmokingBarRequest;
use App\Models\SmokingBar;
use App\Repositories\SmokingBarRepositoryInterface;


class SmokingBarRepository implements SmokingBarRepositoryInterface
{
    public function all() {
        return SmokingBar::all();
    }

    public function get($id) {
        return SmokingBar::with('Hookah')->find($id);
    }

    public function update(SmokingBarRequest $request, $id) {
        $smoking_bar = SmokingBar::findOrFail($id);
        $smoking_bar->fill($request->all());

        if($smoking_bar->save()) {
            return response("success", 204);
        }
    }

    public function save(SmokingBarRequest $request) {
        $smoking_bar = SmokingBar::create($request->all());

        if(isset($smoking_bar)) {
            return response("success", 204);
        }
    }

    public function delete($id) {
        $smoking_bar = SmokingBar::findOrFail($id);

        if($smoking_bar->delete()) {
            return response("success", 204);
        }
    }
}
