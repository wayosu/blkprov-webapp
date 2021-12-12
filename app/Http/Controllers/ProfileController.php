<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::findorfail(1);
        return view('admin.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findorfail($id);
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'profile' => ['required'],
            'visimisi' => ['required'],
            'sambutan' => ['required'],
            'struktur' => ['mimes:png,jpg,jpeg|max:2048'],
            'kurikulum' => ['mimes:pdf,xlsx,xls,xlx|max:2048'],
        ]);

        $profile = Profile::findorfail($id);

        if ($request->has('struktur')) {
            $destination = $request->struktur_lama;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $struktur = $request->struktur;
            $new_struktur = time().$struktur->getClientOriginalName();
            $struktur->move('uploads/other/', $new_struktur);

            $profile_data = [
                'profile' => $request->profile,
                'visimisi' => $request->visimisi,
                'sambutan' => $request->sambutan,
                'struktur' => 'uploads/other/'.$new_struktur,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'map' => $request->map
            ];
        } else {
            $profile_data = [
                'profile' => $request->profile,
                'visimisi' => $request->visimisi,
                'sambutan' => $request->sambutan,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'map' => $request->map
            ];
        }

        $profile->update($profile_data);

        if ($request->has('kurikulum')) {
            $destination_kuri = $request->kurikulum_lama;
            if (File::exists($destination_kuri)) {
                File::delete($destination_kuri);
            }

            $kurikulum = $request->kurikulum;
            $new_kurikulum = time().$kurikulum->getClientOriginalName();
            $kurikulum->move('uploads/other/', $new_kurikulum);

            $kurikulum_data = [
                'kurikulum' => 'uploads/other/'.$new_kurikulum
            ];

            $profile->update($kurikulum_data);
        }

        session()->flash('success', 'Profile updated successfully.');

        return redirect('admin/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
