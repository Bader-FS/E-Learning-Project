<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\storeDomainRequest;
use App\Models\Domain;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\updateDomainRequest;

class DomainController extends Controller
{
    
    public function index()
    {
        $data['route'] = 'domains'; 
        $data['domains'] = Domain::select('id','name','image','is_active','is_popular')->get(); 
        return view('admin.domain.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] = 'domains'; 
        return view('admin.domain.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeDomainRequest $request)
    {
        try {
            $validate = $request->validated();

            $image = $request->file('image')->store('public/assets/uploads/Domain');

            $domain = new Domain();
            $domain->name = $request->name;
            $domain->slug = $request->slug;
            $domain->description = $request->description;
            $domain->is_active = $request->is_active ? '1' : '0';
            $domain->is_popular = $request->is_popular ? '1' : '0';
            $domain->image = $image;
            $domain->save();
            

            toastr()->success('Successfully saved', 'Congrats', ['timeOut' => 5000]);

            return redirect()->route('domains.index');


        
        } catch (Exception $e) {
            return redirect()->back()->with('error_catch',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Domain $domain)
    {
        $data['route'] = 'domains'; 
        $data['domain'] = $domain;
        return view('admin.domain.show',$data);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domain $domain)
    {
        $data['route'] = 'domains'; 
        $data['domain'] =  $domain;
        return view('admin.domain.edit',$data);

    }

   
    public function update(updateDomainRequest $request, Domain $domain)
    {
        try {
            $validated = $request->validated();

            $image = $domain->image;

            if($request->hasFile('image')){
                Storage::delete($image);
                $image = $request->file('image')->store('public/assets/uploads/Domain');
            }

            $domain->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'is_active' => $request->is_active ? '1' : '0',
                'is_popular' => $request->is_popular ? '1' : '0',
                'image' => $image,
            ]);
            return redirect()->route('domains.index')->with('success','Successfully Updated');


        } catch (\Exception $e) {
            return redirect()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domain $domain)
    {
        Storage::delete($domain->image);
        $domain->delete();
        return redirect()->route('domains.index')->with('success','Deleted Successfully');
    }
}
