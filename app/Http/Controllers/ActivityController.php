<?php

namespace App\Http\Controllers;

use App\Activity;
use carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ActivityController extends Controller
{
    //public $activity;
    public function __construct()
    {
        $this->activity = new Activity;
    }
    public function index()
    {
        $activity = Activity::all();
        
        return view('backend.kegiatan.index',compact('activity'));
        
    }

    public function create()
    {
        $getkode = $this->activity->generateCode();

        return view('backend.kegiatan.create',compact('getkode'));
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('backend.kegiatan.edit',compact('activity'));
    }

    public function store()
    {
        $activity = Activity::create($this->validateRequest());
        $this->storeImage($activity);

        return redirect()->back()->with(['success' => 'Activity berhasil dibuat']);

    }

    public function update(activity $activity)
    {
        $activity->update($this->validateRequest());
        $this->storeImage($activity);

        return redirect()->back()->with(['success' => 'Activity berhasil dibuat']);

    }

    public function destroy(activity $activity)
    {
        $activity->delete();
        if(\File::exist(public_path('storage/', $activity->images)));
        {
            \File::delete(public_path('storage/', $activity->images));
        }
        return redirect()->back()->with(['success' => 'Activity berhasil dihapus']);
    }

    private function validateRequest()
    {
        return tap(request()->validate([
            'code_activity' => 'required',
            'name' => 'required',
            'date' => 'required',
            'information' => 'required',
            'status' => 'required',
            'price' => 'required',
            'images' => 'file|image|max:5000',
            'capacity' => 'required',
        ]), function(){
            if(request()->hasFile('images')){
                request()->validate([
                    'images' => 'file|image|max:5000',
                ]);
            }
        }); 
    }
    public function storeImage($activity){
        if(request()->has('images')){
            $activity->update([
                'images' => request()->images->store('uploads','public'),
            ]);
            $image = Image::make(public_path('storage/'. $activity->images))->fit(300,300,null,'top-left');
            
            $image->save();
        }
    }
}
