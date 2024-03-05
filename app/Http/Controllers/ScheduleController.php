<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $appointmentType = $request->input('type'); // Default value is 'firstyear' if not provided
    
        $query = Schedule::query();
    
        $query->where('appointment_type', $appointmentType)
            ->whereDate('date', '>', now()->toDateString()) 
            ->where('slot', '>', 0)
            ->orderBy('date', 'asc');
    
        $contentList = $query->paginate(10);
    
        return ScheduleResource::collection($contentList);
    }
    

    public function store(ScheduleRequest $request, $appointment_type) {
        $validatedData = $request->validated();
        

        // Iterate over selected times
        foreach ($validatedData['selectedTimes'] as $selectedTime) {
            // Iterate over selected dates
            foreach ($validatedData['selectedDates'] as $selectedDate) {
                // Check if a schedule entry already exists for the chosen date and time
                $existingSchedule = Schedule::where('appointment_type', $appointment_type)
                    ->where('date', $selectedDate)
                    ->where('time', $selectedTime)
                    ->first();
    
                if ($existingSchedule) {
                    // Update existing slot
                    $existingSchedule->update([
                        'slot' => $existingSchedule->slot + $validatedData['slotLimit'],
                    ]);
                } else {
                    // Create new schedule entry
                    Schedule::create([
                        'date' => $selectedDate,
                        'time' => $selectedTime,
                        'appointment_type' => $appointment_type,
                        'slot' => $validatedData['slotLimit'],
                    ]);
                }
            }
        }
    
        return response()->json(['message' => 'Schedule/s added/updated successfully']);
    }
    

    public function destroy($schedule_id) {
        //kulang ako sa pang email dito
        $schedule = Schedule::find($schedule_id);
    
        if ($schedule) {
            $date = Carbon::parse($schedule->date)->isoFormat('MMM DD, YYYY');
            
            $deleted = $schedule->delete();
    
            if ($deleted) {
                return response()->json(['message' => 'Schedule on ' . $date . ' deleted successfully']);
            } else {
                return response()->json(['message' => 'Failed to delete schedule']);
            }
        } else {
            return response()->json(['message' => 'Schedule not found']);
        }
    }

}
