<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserStudent;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'family' => 'required|string',
            'name' => 'required|string',
            'parentname' => 'required|string',
            'dr' => 'nullable|date',
            'image' => 'nullable|file',
        ]);
        dd($data);
        try {
            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/student', $data['image']);
            }
        
            UserStudent::firstOrCreate($data);
        
            dd($data);
        } catch (\Exception $exception) {
            abort(404);
        }
        
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd('Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('Запись удалена');
    }
}
