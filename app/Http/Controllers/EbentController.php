<?php

namespace App\Http\Controllers;

use App\Ebent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EbentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');

        $upcomingEvents = Ebent::where('end_date','>',$today)
            ->orderBy('start_date','asc')
            ->limit(5)
            ->get();

        $pastEvents = Ebent::where('end_date','<',$today)
            ->orderBy('start_date','desc')
            ->limit(3)
            ->get();

        return view('event.event-list')
            ->with('upcomingEvents',$upcomingEvents)
            ->with('pastEvents',$pastEvents);
    }
    public function view(Ebent $event){

      return view('event.even-view')
          ->with('event',$event);
    }
}
