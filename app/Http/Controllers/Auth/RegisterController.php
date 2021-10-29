<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = '3';
        $user->password = Hash::make($data['password']);
        $user->save();

        $filename = pathinfo($data['image']->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $data['image']->getClientOriginalExtension();
        $filenameToStore = $filename.time().'.'.$extension;
        $path = $data[image]->storeAs(
            'public/avater',
            $filenameToStore
        );
        $user->monk()->create([
            'regno' => $data['regno'],
            'regage' => $data['regage'],
            'year' => $data['year'],
            'cid' => $data['cid'],
            'dob' => $data['dob'],
            'choename' => $data['choename'],
            'image' => $filenameToStore,
        ]);
        $address = new Address();
        $address->monk_id = $user->monk->id;
        if(!Village::where('name',$request->village)->get()->isEmpty()){
            $village = Village::where('name',$request->village)->first();
            $address->village_id = $village->id;
        } else {
            $village = new Village();
            $village->name = $request->village;
            $village->save();
            $address->village_id = $village->id;
        }           

        $address->gewog_id = $data['gewog_id']; 
        $address->dzongkhag_id = $data['dzongkhag_id'];
        $address->save();
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'role_id' => '3',
        //     'password' => Hash::make($data['password']),
        // ]);
    }
}
