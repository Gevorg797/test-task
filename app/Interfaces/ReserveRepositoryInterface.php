<?php

namespace App\Interfaces;

interface ReserveRepositoryInterface
{
    public function getAllUnReserves();
    public function deleteReserve($roomId);
    public function createReserve(array $newDetails);
}
