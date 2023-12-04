<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function artisanConsole(){
        return view('terminal');
    }

    public function runArtisanCommand(Request $request)
    {
        $komut = $request->input('komut');

        $exitCode = Artisan::call($komut);

        if ($exitCode === 0) {
            $message = 'Artisan command ran successfully!';
        } else {
            $message = 'An error occurred while running the Artisan command. Exit code: ' . $exitCode; 
        }

        return $message;
    }
}
