<?php


namespace App\Repositories\Eloquent;

use App\Http\Requests\SmokingBarRequest;
use App\Models\SmokingBar;
use App\Repositories\SmokingBarRepositoryInterface;
use Illuminate\Http\Request;


class SmokingBarRepository implements SmokingBarRepositoryInterface
{
    public function all() {
        $results = SmokingBar::all();
        return $results;
    }

    public function get($id) {
        return SmokingBar::with('Hookah')->find($id);
    }

    public function update(SmokingBarRequest $request, $id) {
        $smoking_bar = SmokingBar::findOrFail($id);
        $smoking_bar->fill($request);
        $smoking_bar->save();

        return response("success", 204);
    }

    public function save(SmokingBarRequest $request) {
        $smoking_bar = SmokingBar::create($request->all());

        return response("success", 204);
    }

    public function delete($id) {
        $smoking_bar = SmokingBar::findOrFail($id);

        if($smoking_bar->delete()) {
            return response("success", 204);
        }

//        SmokingBar::with('Hookah')->paginate(10)
//            ->map (
//                function ($bar) {
//                    return [
//                        'smoking_bar_id' => $bar->id,
//                        'smoking_bar_name' => $bar->name,
//                        'smoking_bar_hookah' => $bar->hookah,
//                    ];
//                }
//            )

    }
}
