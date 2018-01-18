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
            ->orderBy('start_date','desc')
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
        $today = Carbon::today()->format('Y-m-d');

        $upcomingEvents = Ebent::where('end_date','>',$today)
            ->orderBy('start_date','desc')
            ->limit(10)
            ->get();
      return view('event.even-view')
          ->with('event',$event)
          ->with('upcomingEvents',$upcomingEvents);
    }

    public function add(){
        return view('event.event-add');
    }

    public function store(Request $request){

       $this->validate($request,[
            'title'=>'required',
            'address'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required',
            'lat'=>'required',
            'lng'=>'required',
        ]);

        $event = new Ebent();
        $event->title = $request->input('title');
        $event->address = $request->input('address');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->description = $request->input('description');
        $event->lat = $request->input('lat');
        $event->long = $request->input('lng');
        $event->user_id = $request->user()->id;
        $event->save();
        return redirect()->back()->with('success');
    }
}
