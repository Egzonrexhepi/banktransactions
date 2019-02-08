<?php

namespace App\Repositories\Contracts;

interface BankTransactionPartRepository
{
    public function insert($parts, $transactionId);
}
