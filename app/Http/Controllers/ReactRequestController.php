<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Ressource;
use App\Models\Certificat;
use Illuminate\Http\Request;

class ReactRequestController extends Controller
{
    // renvoi le certificat d'une formation donnée
    public function getLiens($idFormation)
    {
        $liens = Array( ["certificat" => "", "ressource" => "", "faq" => ""] );

        $certificat = Certificat::where('formation_id', '=', $idFormation)
            ->get();

        if ($certificat->isEmpty()) {
            // return response()->json(['hide' => 'hide'], 200);
            $liens["certificat"] = 'hide';
        } else {
            // return $certificat;
            $liens["certificat"] = $certificat;
        }

        $ressource = Ressource::where('formation_id', '=', $idFormation)
            ->get();

        if ($ressource->isEmpty()) {
            // return response()->json(['hide' => 'hide'], 200);
            $liens["ressource"] = 'hide';
        } else {
            // return $ressource;
            $liens["ressource"] = $ressource;
        }

        $faq = Faq::where('formation_id', '=', $idFormation)
            ->get();

        if ($faq->isEmpty()) {
            // return response()->json(['hide' => 'hide'], 200);
            $liens["faq"] = 'hide';
        } else {
            // return $faq;
            $liens["faq"] = $faq;
        }

        return $liens;





        // $liens = [];

        // $certificat = Certificat::where('formation_id', '=', $idFormation)
        //     ->get();

        // if ($certificat->isEmpty()) {
        //     // return response()->json(['hide' => 'hide'], 200);
        //     array_push($liens, response()->json(['hide' => 'hide'], 200));
        // } else {
        //     // return $certificat;
        //     array_push($liens, $certificat);
        // }

        // $ressource = Ressource::where('formation_id', '=', $idFormation)
        //     ->get();

        // if ($ressource->isEmpty()) {
        //     // return response()->json(['hide' => 'hide'], 200);
        //     array_push($liens, response()->json(['hide' => 'hide'], 200));
        // } else {
        //     // return $ressource;
        //     array_push($liens, $ressource);
        // }

        // $faq = Faq::where('formation_id', '=', $idFormation)
        //     ->get();

        // if ($faq->isEmpty()) {
        //     // return response()->json(['hide' => 'hide'], 200);
        //     array_push($liens, response()->json(['hide' => 'hide'], 200));
        // } else {
        //     // return $faq;
        //     array_push($liens, $faq);
        // }

        // return $liens;
    }
}
