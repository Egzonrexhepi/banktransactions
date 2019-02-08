<?php

namespace App\Repositories\Eloquent;

use App\BankTransaction;
use App\Repositories\Contracts\BankTransactionRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentBankTransactionRepository extends AbstractRepository implements BankTransactionRepository
{
    public function entity()
    {
        return BankTransaction::class;
    }

    public function insert($transaction)
    {
        return BankTransaction::create($transaction);
    }

    public function getByUuid($uuid)
    {
        return BankTransaction::where('uuid',$uuid)->first();
    }
}
