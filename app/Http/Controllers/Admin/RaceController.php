<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Horse;
use App\Models\Admin\Race;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RaceController extends Controller
{
    public function index()
    {
        return view('admin.races.race_list');
    }

    public function raceListAjax(Request $request)
    {
        if ($request->ajax()) {
            $races = Race::withCount('horses')->get();
            return Datatables::of($races)
                ->make(true);
        }
    }

    public function show($id)
    {
        $race = Race::withCount('horses')->where('race_id', $id)->get();
        return view('admin.races.race_details', compact('race'));
    }

    public function raceHorseListAjax(Request $request)
    {
        if ($request->ajax()) {
            $horces = Race::with('horses')->where('race_id', $request->race)->get()[0]->horses;
//            $horse_ids = Race::with('horses')->where('race_id', $request->race)->get()[0]->horses->pluck('horse_id')->toArray();
//            $horces = Horse::with('races')->withCount('races')->whereIn('horse_id', $horse_ids)->get();
            return Datatables::of($horces)
                ->make(true);
        }
    }
}
