<?php

namespace App\Repositories;


use App\Interfaces\ReserveRepositoryInterface;
use App\Models\Reserve;
use App\Models\Room;

class ReserveRepository implements ReserveRepositoryInterface
{
    public function getAllUnReserves()
    {
        $user_id = auth()->user()->id;

        return Room::query()->where(function ($q)  {
            $q->whereDoesntHave('reserve');
        })->orWhere(function ($q) use ($user_id) {
            $q->whereHas('reserve',function ($q) use($user_id){
                $q->where('user_id', $user_id);
            });
        })->paginate(5);

    }


    public function deleteReserve($reserveId)
    {
        Reserve::destroy($reserveId);
    }

    public function createReserve(array $orderDetails)
    {
        return Reserve::create($orderDetails);
    }


}
