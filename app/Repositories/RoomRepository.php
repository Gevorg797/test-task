<?php

namespace App\Repositories;

use App\Interfaces\RoomRepositoryInterface;
use App\Models\Room;

class RoomRepository implements RoomRepositoryInterface
{
    public function getAllRooms()
    {
        return Room::paginate(5);
    }

    public function getRoomById($roomId)
    {
        return Room::findOrFail($roomId);
    }

    public function deleteRoom($roomId)
    {
        Room::destroy($roomId);
    }

    public function createRoom(array $roomDetails)
    {
        return Room::create($roomDetails);
    }

    public function updateRoom($roomId, array $newDetails)
    {
        return Room::whereId($roomId)->update($newDetails);
    }

}
