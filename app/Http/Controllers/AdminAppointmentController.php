<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Validation\Rule;

class AdminAppointmentController extends Controller
{

    public function index()
    {

        $events = [];
 
        $appointments = Appointment::get();
 
        foreach ($appointments as $appointment) {
            $events[] = [
                // 'title' => $appointment->name,
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
                'id' => $appointment->id,
            ];
        }
 
        return view('admin.appointments.calendar', compact('events'));
    }

    public function create()
    {
        return view('admin.appointment.create');
    }

    public function store()
    {
        Appointment::create(array_merge($this->validateAppointment(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('calendar');
    }

    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit', ['appointment' => $appointment]);
    }

    public function update(Appointment $appointment)
    {
        $attributes = $this->validateAppointment($appointment);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $appointment->update($attributes);

        return back()->with('success', 'Cita modificada');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return back()->with('success', 'Cita borrada correctamente');
    }

    protected function validateAppointment(?Appointment $appointment = null): array
    {
        $appointment ??= new Appointment();

        return request()->validate([
            'start_time' => 'required',
            'finish_time' => 'required',
            'thumbnail' => $appointment->exists ? ['appointment'] : ['required', 'appointment']
        ]);
    }
}
