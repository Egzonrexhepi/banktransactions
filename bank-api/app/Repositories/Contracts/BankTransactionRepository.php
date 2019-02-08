<?php

namespace App\Repositories\Contracts;

interface BankTransactionRepository
{
    public function insert($transaction);
    public function getByUuid($uuid);
}
