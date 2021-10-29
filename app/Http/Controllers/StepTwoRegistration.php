<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Address;
use App\Models\Dratshang;
use App\Models\Dzongkhag;
use App\Models\Education;
use App\Models\Gewog;
use App\Models\Position;
use App\Models\Rabdey;
use App\Models\Village;
use App\Models\Father;
use App\Models\Mother;

class StepTwoRegistration extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    public function createMonk(){
        return view('auth.register.monk.create',[
            'positions' => Position::all(),
            'rabdeys' => Rabdey::all(),
            'educations' => Education::all(),
        ]);
    }     
    public function storeMonk(Request $request){
        
        if($request->hasFile('image')){
            $filename = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->image->getClientOriginalExtension();
            $filenameToStore = $filename.time().'.'.$extension;
            $path = $request->image->storeAs(
                'public/avater',
                $filenameToStore
            );
            $request->user()->monk()->create([
                'regno' => $request->regno,
                'regage' => $request->regage,
                'year' => $request->year,
                'cid' => $request->cid,
                'dob' => $request->dob,
                'choename' => $request->choename,
                'image' => $filenameToStore,
            ]);
        }
        return view('auth.register.address.create',[
            'dzongkhags' => Dzongkhag::all(),
        ]);
    }
    public function storeAddress(Request $request)
    {
        $address = new Address();
        
        $address->monk_id = $request->user()->monk->id;
        

        if(!Village::where('name',$request->village)->get()->isEmpty()){
            $village = Village::where('name',$request->village)->first();
            $address->village_id = $village->id;
        } else {
            $village = new Village();
            $village->name = $request->village;
            $village->save();
            $address->village_id = $village->id;
        }           
        
        $address->gewog_id = $gewog->id; 
        $address->dzongkhag_id = $request->dzongkhag;
        $address->save();

        return view('auth.register.parents.create');
    }

    public function storeParents(Request $request) {

        $user = $request->user();

        $user->monk->father()->updateOrCreate([
            "cid" => $request->f_cid,
            "name" => $request->f_name
        ]);
        $user->monk->mother()->updateOrCreate([
            "cid" => $request->m_cid,
            "name" => $request->m_name
        ]);

        return view('auth.register.others.create', [
            'educations' => Education::all(),
            'positions' => Position::all(),
            'rabdeys' => Rabdey::all(),
            'dratshangs' => Dratshang::all(),
        ]);
    }
    public function createOthers(){
        return view('auth.register.others.create', [
            'educations' => Education::all(),
            'positions' => Position::all(),
            'rabdeys' => Rabdey::all(),
            'dratshangs' => Dratshang::all(),
        ]);
    }
    public function storeOthers(Request $request){
        $user = $request->user();
        $user->monk->update([
            'education_id' => $request->education,
            'position_id' => $request->position,
            'dratshang_id' => $request->dratshang,
            'rabdey_id' => $request->rabdey
        ]);
        return redirect()->route('user.profile');
    }
}