<?php

namespace App\Http\Controllers\Api;

//import Model "Event"
use App\Models\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//import Resource "EventResource"
use App\Http\Resources\EventResource;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

//import Facade "Validator"
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all Events
        $events = Event::latest()->paginate(5);

        //return collection of Events as a resource
        return new EventResource(true, 'List Data Events', $events);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'poster'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required',
            'caption'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload poster
        $poster = $request->file('poster');
        $poster->storeAs('public/events', $poster->hashName());

        //create event
        $event = Event::create([
            'poster'     => $poster->hashName(),
            'title'     => $request->title,
            'caption'   => $request->caption,
        ]);

        //return response
        return new EventResource(true, 'Data Event Berhasil Ditambahkan!', $event);
    }

    /**
     * show
     *
     * @param  mixed $event
     * @return void
     */
    public function show($id)
    {
        //find event by ID
        $event = Event::find($id);

        //return single post as a resource
        return new EventResource(true, 'Detail Data Event!', $event);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $event
     * @return void
     */
    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'caption'   => 'required',
            // 'publish'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find event by ID
        $event = Event::find($id);

        //check if poster is not empty
        if ($request->hasFile('poster')) {

            //upload poster
            $poster = $request->file('poster');
            $poster->storeAs('public/events', $poster->hashName());

            //delete old poster
            Storage::delete('public/events/'.basename($event->poster));

            //update event with new poster
            $event->update([
                'poster'     => $poster->hashName(),
                'title'     => $request->title,
                'caption'   => $request->caption,
                'publish'   => $request->publish,
            ]);

        } else {

            //update event without poster
            $event->update([
                'title'     => $request->title,
                'caption'   => $request->caption,
                'publish'   => $request->publish,
            ]);
        }

        //return response
        return new EventResource(true, 'Data Event Berhasil Diubah!', $event);
    }

}
