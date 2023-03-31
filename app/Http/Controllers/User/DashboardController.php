<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Camps;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Content;
use App\Models\User;
use Auth;
use Illuminate\Contracts\Support\ValidatedData;

class DashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with('Camp')->whereUserId(Auth::id())->get();
        
        return view('user.dashboard', [
            'checkouts' => $checkouts
        ]);
    }

    public function profile()
    {
       return view('user.profile');
    }
    
    public function storeProfile(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->birth = $data['birth'];
        
        
        if ($user->save()) {
            $request->session()->flash('Success', "You already changes personally ");
                return redirect(route('user.profile'));
        }
    }
    
    public function class($id, $content_id)
    {
        
        // dd($id);
        $any = true;
        $camp = Camps::whereId($id)->first();
        $content = Content::where('camp_id', $id)->get();
        $titleContent = Content::whereId($content_id)->first();
        $idContent = $titleContent->id + 1;
        $video = Content::where('camp_id', $id)->where('id', $content_id)->first();
        if (count($content) != $idContent) {
            $any = false;
        }
        // dd($any);
       return view('user.class.index', [
        'camp' => $camp,
        'content' => $content,
        'title' => $titleContent,
        'video' => $video,
        'any' => $any
       ]);
    }

}
