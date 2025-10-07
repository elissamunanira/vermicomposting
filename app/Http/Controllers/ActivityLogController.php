<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Str;

class ActivityLogController extends Controller
{
    //

    public function index()
    {
        // $activityLogs = Activity::all();

        // Retrieve the activity logs, along with the user who performed the activity
            $activityLogs = Activity::with('causer')->latest()->get();


        // Format the timestamp for display
             $formattedLogs = $activityLogs->map(function ($log) {
             $timestamp = $log->created_at->diffForHumans(); // Format the timestamp

             //$subjectModelClass = $subjectModel ? get_class($subjectModel) : $log->subject_type;



            return [
                'user' => $log->causer->name,
                 // Assuming the user model has a 'name' attribute
                'role' => $log->causer->roles->first()->name,
                'subject' => Str::afterLast($log->subject_type, '\\').': '.'with id'.'   ' .$log->subject_id,
                'activity' => $log->description,
                'timestamp' => $timestamp,
            ];
        });





        return view('activity-logs.index', compact('formattedLogs'));
    }
}
