<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Car;

class PageController extends Controller
{
    public function blog() {
        return view('pages.blog');
    }

    public function blog_detail() {
        return view('pages.blog_detail');
    }

    public function about_us() {
        return view('pages.about_us');
    }

    public function team() {
        return view('pages.team');
    }

    public function terms() {
        return view('pages.terms');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function fleet(Request $rq){
        $searchText = $rq->searchText;
        $cars = Car::with('brand')->where('ten_xe','like', '%'.$searchText.'%')->paginate(6);

        $checkUserCar = Car::where([
            ['khach_hang_da_dat', 'LIKE', '%'.Session::get('ma_khach_hang').'%']
        ])->first();

    	return view('pages.car.fleet',[
    	    'searchText' => $searchText,
            'cars' => $cars,
            'checkUserCar' => $checkUserCar,
        ]);
    }
}
