<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(count(Event::get()) > 5){
            $events = Event::paginate(5);
        }else{
            $events= Event::get();
        }

        return view('eventlist',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventlistcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->eventName = $request->eventName;
        $event->finished_at = $request->finished_at;
        
        if($event->save()){
            return redirect()->back()->with('success','Event Başarıyla Eklendi');
        }else{
            return redirect()->back()->with('error','Event Eklenemedi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('eventlistupdate',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        if($request->eventName){
            $event->eventName = $request->eventName;
        }
        if($request->finished_at){
            $event->finished_at = $request->finished_at;
        }
       if($event->save())
       {
        return redirect()->back()->with('success','Event Başarıyla Eklendi');

       }else{

        return redirect()->back()->with('error','Event Eklenemedi');

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::where('id',$id)->delete();
        return redirect()->back()->with('success','Event Başarıyla Silindi');
    }
    public function search()
    {
        $filter = $_GET['arama'];
        $events = Event::where('eventName','LIKE','%'.$filter.'%')->get();
        return view('eventlist',compact('events'));
       
    }
}
