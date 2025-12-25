<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // 1. Carousel Items (Events per Division)
        $divisions = ['TECHNOLOGY', 'GREEN', 'CATALYST', 'ENERGY', 'ENTREPRENEURSHIP', 'SOCIAL', 'MARCOMM'];
        $carouselItems = [];
        
        foreach($divisions as $divisionName) {
            $event = Event::where('divisi', $divisionName)->whereNotNull('foto')->latest()->first();
            if($event) {
                $carouselItems[] = [
                    'image' => asset('storage/' . $event->foto), 
                    'program' => $event->nama_kegiatan, 
                    'division' => $divisionName
                ];
            }
        }

        // Fallback Data if empty
        if(empty($carouselItems)) {
            $carouselItems = [
                ['image' => 'images/divisi/Green.png', 'program' => '', 'division' => 'GREEN'],
                ['image' => 'images/divisi/Technology.png', 'program' => '', 'division' => 'TECHNOLOGY'],
                ['image' => 'images/divisi/Social.png', 'program' => '', 'division' => 'SOCIAL'],
                ['image' => 'images/divisi/Catalyst.png', 'program' => '', 'division' => 'CATALYST'],
                ['image' => 'images/divisi/Energy.png', 'program' => '', 'division' => 'ENERGY'],
                ['image' => 'images/divisi/Enterpreneurship.png', 'program' => '', 'division' => 'ENTREPRENEURSHIP'],
                ['image' => 'images/divisi/Marcomm.png', 'program' => '', 'division' => 'MARCOMM'],
            ];
        }

        // 2. Division List
        $divisionsList = [
            ['name' => 'TECHNOLOGY', 'desc' => 'Inovasi teknologi untuk perubahan positif.', 'image' => '/images/divisi/Technology.png'],
            ['name' => 'GREEN', 'desc' => 'Aksi nyata demi lingkungan berkelanjutan.', 'image' => '/images/divisi/Green.png'],
            ['name' => 'CATALYST', 'desc' => 'Ekosistem belajar yang seru dan bermanfaat.', 'image' => '/images/divisi/Catalyst.png'],
            ['name' => 'ENERGY', 'desc' => 'Kesehatan fisik dan mental untuk produktivitas.', 'image' => '/images/divisi/Energy.png'],
            ['name' => 'ENTREPRENEURSHIP', 'desc' => 'Semangat kewirausahaan dan kemandirian.', 'image' => '/images/divisi/Enterpreneurship.png'],
            ['name' => 'SOCIAL', 'desc' => 'Kepedulian sesama melalui kegiatan amal.', 'image' => '/images/divisi/Social.png'],
            ['name' => 'MARCOMM', 'desc' => 'Branding dan komunikasi yang berdampak.', 'image' => '/images/divisi/Marcomm.png'],
        ];

        // 3. Latest Events
        $latestEvents = Event::latest()->take(3)->get();

        return view('users.landingpage', compact('carouselItems', 'divisionsList', 'latestEvents'));
    }
}
