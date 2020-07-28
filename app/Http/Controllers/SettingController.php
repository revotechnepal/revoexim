<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index()
    {
        $setting = Setting::first();

        return view('backend.settings.index',compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'site_name'     => 'required|max:250',
            'site_logo'     => 'nullable|image|mimes:png',
            'site_favicon'  => 'nullable',
            'email'         => 'required|max:250',
            'facebook'      => 'nullable|url',
            'twitter'       => 'nullable|url',
            'linkedin'      => 'nullable|url',
            'instagram'     => 'nullable|url',
            'youtube'       => 'nullable|url',
            'about'         => 'nullable|string',
            'service'       => 'nullable|string',
            'address'       => 'nullable|max:250'
        ]);

        $setting = new Setting();

        if ($request->hasFile('site_logo')) {
            $site_logo = $request->site_logo->store('site_logo', 'uploads');

        }elseif($request->site_logo){
            $site_logo = $request->site_logo;
        }else{
            $site_logo = 'logo.png';
        }

        if ($request->hasFile('site_favicon')) {
            $site_favicon = $request->site_favicon->store('site_favicon', 'uploads');

        }elseif($request->site_favicon){
            $site_logo = $request->site_favicon;
        }else{
            $site_favicon = 'favicon.ico';
        }

        $setting->updateOrCreate(['id' => 1],
          [
            'site_name'     => $request->site_name,
            'site_logo'     => $site_logo,
            'site_favicon'  => $site_favicon,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'facebook'      => $request->facebook,
            'twitter'       => $request->twitter,
            'linkedin'      => $request->linkedin,
            'instagram'      => $request->instagram,
            'youtube'       => $request->youtube,
            'about'         => $request->about,
            'service'       => $request->service,
            'address'       => $request->address
          ]
        );

        return back()->with('message', 'Setting updated successfully.');
    }
}
