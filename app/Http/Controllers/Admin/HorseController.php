<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Horse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HorseController extends Controller
{
    public function index()
    {
        return view('admin.horses.horse_list');
    }

    public function horseListAjax(Request $request)
    {
        if ($request->ajax()) {
            $horses = Horse::withCount('races')->get();
            return Datatables::of($horses)
                ->make(true);
        }
    }

    public function show($id)
    {
        $horse = Horse::withCount('races')->where('horse_id', $id)->get();
//        dd($horse->toArray());
        return view('admin.horses.horse_details', compact('horse'));
    }

    public function horseRaceListAjax(Request $request)
    {
        if ($request->ajax()) {
            $races = Horse::with('races')->where('horse_id', $request->horse)->get()[0]->races;
            return Datatables::of($races)
                ->make(true);
        }
    }
}
