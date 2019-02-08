<?php

namespace App\Repositories\Eloquent;

use App\BankTransaction;
use App\BankTransactionPart;
use App\Repositories\Contracts\BankTransactionPartRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentBankTransactionPartRepository extends AbstractRepository implements BankTransactionPartRepository
{
    public function entity()
    {
        return BankTransactionPart::class;
    }

    public function insert($parts, $transaction)
    {
        return $transaction->bankTransactionParts()->createMany($parts);
    }
}
