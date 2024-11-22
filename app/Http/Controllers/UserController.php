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
        $students = UserStudent::all();
        return view('users.index', compact('students'));
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
        try {
            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/user', $data['image']);
            }
        
            UserStudent::firstOrCreate($data);
        
            // dd($data);
        } catch (\Exception $exception) {
            abort(404);
        }
        
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = UserStudent::findOrFail($id);
        return view('users.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = UserStudent::findOrFail($id);
        return view('users.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = $request->validate([
            'family' => 'required|string',
            'name' => 'required|string',
            'parentname' => 'required|string',
            'dr' => 'nullable|date',
            'image' => 'nullable|file',
        ]);
        $student = UserStudent::findOrFail($id);
        try{
            if(isset($data['image'])){
                if($student->image){
                     Storage::disk('public')->delete($student->image);
                } 
                //сохраняем новое изображение 
                $data['image'] = Storage::disk('public')->put('/user', $data['image']);    
            }
            //обновляем данные студента 
            $student->update($data);;
            // return redirect()->route('users.show', $student->id);
            return redirect()->route('user.index');
        } catch(\Exception $e){
            //ловим ошибку и возвращаем
            return back()->withErrors(['error' => 'Не удалось обновить запись.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = UserStudent::findOrFail($id);
        try{
            if($student->image && Storage::disk('public')->exists($student->image)){
                Storage::disk('public')->delete($student->image);
            }
            $student->delete();
        } catch(\Exception $e){
            abort(404);

        }
        Storage::disk('public')->delete($student);
        return redirect()->route('user.index');
    }
}
