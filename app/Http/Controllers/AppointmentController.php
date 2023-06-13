<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __invoke()
    {
        $events = [];
 
        $appointments = Appointment::get();
 
        foreach ($appointments as $appointment) {
            if( $appointment->reserved == null || $appointment->reserved == auth()->user()->username){
                $events[] = [
                    // 'title' => $appointment->client->name,
                    'start' => $appointment->start_time,
                    'end' => $appointment->finish_time,
                    'id' => $appointment->id,
                ];
            }
        }
 
        return view('appointments.calendar', compact('events'));
    }


    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', ['appointment' => $appointment]);
    }

    public function update(Appointment $appointment)
    {
        $attributes = $this->validateAppointment($appointment);
        // $attributes = "'user_id' => request()->user()->id";

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }


        $appointment->update($attributes);

        return back()->with('success', 'Cita modificada');
    }

    protected function validateAppointment(?Appointment $appointment = null): array
    {
        $appointment ??= new Appointment();

        return request()->validate([
            'reserved' => 'required',
            'telephone' => 'required',
            'name' => 'required',
            'thumbnail' => $appointment->exists ? ['appointment'] : ['required', 'appointment']
        ]);
    }
}
