<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('access', $user);

        if($user->profile->avatar_path)
        {
            unlink('storage/'.$user->profile->avatar_path);
        }

        $filename = $request->avatar->getClientOriginalName();

        $user->profile->update([
            'avatar_path' => $request->avatar->storeAs('avatars', $filename, 'public')
        ]);

        if ($request->expectsJson()) {
            return response ([], 204);
        }

        return back()->with([
            'message' => 'Your avatar has been updated.',
            'type' => 'danger'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
