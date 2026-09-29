<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::all()->pluck('value', 'Key')->toArray();

        return view('Pages.Setting.index', ['setting' => $setting]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name' => ['required', 'string', 'max:255'],
            'current_session' => ['required', 'string', 'max:20'],
            'school_title' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'school_email' => ['nullable', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'end_first_term' => ['nullable', 'string', 'max:50'],
            'end_second_term' => ['nullable', 'string', 'max:50'],
            'logo' => ['nullable', 'image', 'max:5120'],
        ]);

        try {
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $Key => $Value) {
                Setting::where('Key', $Key)->update(['Value' => $Value]);
            }

            if ($request->hasFile('logo')) {
                $logo_path = $request->file('logo')->store('attachments/logo', 'upload_attachments');
                $logo_name = basename($logo_path);
                Setting::where('Key', 'logo')->update(['Value' => $logo_name]);
            }

            toastr()->success(trans('messages.Update'));
            return back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
