<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\OnlineClass;
use App\Services\ZoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ZoomMeetingController extends Controller
{
    public function index()
    {
        $online_classes = OnlineClass::all ();
        return view ('Pages.OnlineClasse.index', compact ('online_classes'));
    }

    public function create ()
    {
        $Grades = Grade::all ();
        return view ('Pages.OnlineClasse.add', compact ('Grades'));
    }


    public function indirectCreate ()
        {
        $Grades = Grade::all ();

        return view ('Pages.OnlineClasse.indirect', compact ('Grades'));
        }
    public function store (Request $request, ZoomService $zoom)
    {
            // return $request;
        $request->validate ([
            'Grade_id'     => 'required|exists:grades,id',
            'Classroom_id' => 'required|exists:classrooms,id',
            'Section_id'   => 'required|exists:sections,id',
            'topic'        => 'required|string|max:255',
            'start_time'   => 'required|date',
            'duration'     => 'required|integer|min:1',
        ]);

        try
        {
            $meeting = $zoom->createMeeting ([
                'topic'      => $request->topic,
                'start_time' => $request->start_time,
                'duration'   => $request->duration,
            ]);

            OnlineClass::create ([

                'integration'  => true,
                'Grade_id'     => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Section_id'   => $request->section_id,
                'user_id'      => auth ()->id (),
                'meeting_id'   => $meeting['id'],
                'topic'        => $meeting['topic'],
                'start_at'     => $meeting['start_time'],
                'duration'     => $meeting['duration'],
                'password'     => $meeting['password'],
                'start_url'    => $meeting['start_url'],
                'join_url'     => $meeting['join_url'],
            ]);

            toastr ()->success (trans ('messages.success'));
            return redirect ()->route ('OnlineClasse.index');
        }
        catch (\Exception $e)
        {
            return redirect ()->back ()->withInput ()->with (['error' => $e->getMessage ()]);
        }
    }

    public function storeIndirect (Request $request)
    {
        $request->validate ([
            'Grade_id'     => 'required|exists:grades,id',
            'Classroom_id' => 'required|exists:classrooms,id',
            // 'Section_id'   => '|exists:sections,id',
            'meeting_id'   => 'required',
            'topic'        => 'required|string|max:255',
            'start_time'   => 'required|date',
            'duration'     => 'required|integer|min:1',
            'join_url'     => 'required|url',
            'start_url'    => 'required|url',
        ]);

        try
        {

            OnlineClass::create ([
                'integration'  => false,
                'Grade_id'     => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Section_id'   => $request->section_id,
                'user_id'      => App::auth()->id,
                'meeting_id'   => $request->meeting_id,
                'topic'        => $request->topic,
                'start_at'     => $request->start_time,
                'duration'     => $request->duration,
                'password'     => $request->password,
                'start_url'    => $request->start_url,
                'join_url'     => $request->join_url,
            ]);

            toastr ()->success (trans ('messages.success'));
            return redirect ()->route ('online_classes.index');
        }
        catch (\Exception $e)
        {
            return redirect ()->back ()->withInput ()->with (['error' => $e->getMessage ()]);
        }
    }

    public function destroy (Request $request, ZoomService $zoom)
    {
        try
        {

            $online_class = OnlineClass::findOrFail ($request->id);
            if ($online_class->integration == true)
            {
                $zoom->deleteMeeting ($online_class->meeting_id);
            }
            $online_class->delete ();
            toastr ()->success (trans ('messages.Delete'));
            return redirect ()->route ('online_classes.index');
        }
        catch (\Exception $e)
        {
            return redirect ()->back ()->with (['error' => $e->getMessage ()]);
        }
        }

    }
