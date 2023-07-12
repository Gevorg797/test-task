<?php

namespace App\Http\Controllers;

use App\Interfaces\ReserveRepositoryInterface;
use App\Http\Requests\StoreReserveRequest;

class ReserveController extends Controller
{
    private ReserveRepositoryInterface $reserveRepository;

    public function __construct(ReserveRepositoryInterface $reserveRepository)
    {
        $this->reserveRepository = $reserveRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = $this->reserveRepository->getAllUnReserves();
        return view('reserve.list',['rooms'=>$rooms]);
    }

    public function reservePage($roomId){

        return view('reserve.add-reserve',['roomId'=>$roomId]);
    }


    public function addReserve($roomId,StoreReserveRequest $request)
    {
        $dates = explode(',',$request->date);

        if(!isset($dates[1])){
            $dates[1] = $dates[0];
        }
        $reserve = [
            'user_id'=>auth()->user()->id,
            'room_id'=>$roomId,
            'date_to'=>$dates[0],
            'date_from'=>$dates[1]
        ];
        $this->reserveRepository->createReserve($reserve);

        return redirect()->route('reserves.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy($reserveId)
    {
        $this->reserveRepository->deleteReserve($reserveId);

        return  redirect()->back();

    }
}
