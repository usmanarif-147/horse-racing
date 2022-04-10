<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Race;
use App\Models\Admin\Track;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TrackController extends Controller
{
    public function index()
    {
        return view('admin.tracks.track-list');
    }

    public function trackListAjax(Request $request)
    {
        if ($request->ajax()) {
            $tracks = Track::withCount('races');
            return Datatables::of($tracks)
                ->make(true);
        }
    }

    public function show($id)
    {
        $track = Track::withCount('races')->where('track_id', $id)->get();
        return view('admin.tracks.track_details', compact('track'));
    }

    public function trackRaceListAjax(Request $request)
    {
        if ($request->ajax()) {
            $races = Race::where('track_id', $request->track);
            return Datatables::of($races)
                ->make(true);
        }
    }
}
