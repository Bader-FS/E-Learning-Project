<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prof;
use App\Http\Requests\storeProfRequest;
use App\Http\Requests\updateProfRequest;



class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route'] = 'profs'; 
        $data['profs'] = Prof::select('id','name','email','phone')->get(); 
        return view('admin.prof.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] = 'profs'; 
        return view('admin.prof.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProfRequest $request)
    {
        try {
            $validate = $request->validated();

            $prof = new Prof();
            $prof->name =  $request->name;
            $prof->email = $request->email;
            $prof->phone = $request->phone;
            $prof->save();

            toastr()->success('Successfully saved', 'Congrats', ['timeOut' => 5000]);

            return redirect()->route('profs.index');

        } catch (Exception $e) {
            return redirect()->back()->with('error_catch',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prof $prof)
    {
        $data['route'] = 'profs'; 
        $data['prof'] = $prof;
        return view('admin.prof.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateProfRequest $request, Prof $prof)
    {
        try {
            $validated = $request->validated();

            $prof->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            return redirect()->route('profs.index')->with('success','Successfully Updated');
            
        } catch (\Exception $e) {
            return redirect()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prof $prof)
    {
        $prof->delete();
        return redirect()->route('profs.index')->with('success','Deleted Successfully');
    }
}
