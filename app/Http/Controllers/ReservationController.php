<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;

class ReservationController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $reserves = $user->reserves;
        return view('reserve.index', ['reserves' => $reserves]);
    }

    public function new(Request $request, $id){
        $input = $request->all();
        $input['shop_id'] = intval($id); //Int
        $input['user_id'] = auth()->user()->id; // Int
        unset($input['_token']);
        $request->session()->put("reserveData", $input);
        return redirect()->route('reserve.confirm');
    }
    
    public function confirm(Request $request)
    {
        $sessionReserveData = $request->session()->get("reserveData");
        $shop = Shop::find($sessionReserveData['shop_id']);
        if (!$sessionReserveData) {
            return redirect()->route('reserve.confirm');;
        }
        return view('reserve.confirm', ['reserveData' => $sessionReserveData, 'name'=> auth()->user()->name, 'email' => auth()->user()->email, 'shop_name' => $shop->name]);
    }
    
    public function store(Request $request)
    {
		$input = $request->session()->get("reserveData");
		
		if($request->has("back")){
			return redirect()->route("shop.show", ['id' => $input['shop_id']])->with($input);
		}
        
		if(!$input){
			return redirect()->route("shop.show", ['id' => $input['shop_id']]);
		}
        $reserve = Reservation::create($input);
		$request->session()->forget("reserveData");

        return redirect()->route('reserve.thanks', ['id' => $reserve->id ]);
    }

    public function thanks($id){
        $reserve = Reservation::find($id);
        return view('reserve.thanks', ['id' => $reserve->id ]);
    }

    public function destroy($id)
    {
        $reserve = Reservation::find($id);
        $reserve->delete();
        return redirect()->route('reserve.index');
    }
}
