<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBankTransaction;
use App\Repositories\Contracts\BankTransactionPartRepository;
use App\Repositories\Contracts\BankTransactionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankTransactionController extends Controller
{
    private $bankTransactionRepository;
    private $bankTransactionPartRepository;

    public function __construct(
        BankTransactionRepository $bankTransactionRepository,
        BankTransactionPartRepository $bankTransactionPartRepository
    )
    {
        $this->bankTransactionRepository = $bankTransactionRepository;
        $this->bankTransactionPartRepository = $bankTransactionPartRepository;
    }

    public function create(CreateBankTransaction $createBankTransactionRequest) {
        DB::beginTransaction();

        $transaction = [
            'uuid' => $createBankTransactionRequest->get('uuid'),
            'amount' => $createBankTransactionRequest->get('amount'),
            'booking_date' => $createBankTransactionRequest->get('booking_date'),
        ];

        $insertedTransaction = $this->bankTransactionRepository->insert($transaction);

        if(!$insertedTransaction) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to insert transaction'
            ], 500);
        }

        if(!$this->bankTransactionPartRepository->insert($createBankTransactionRequest->get('parts'), $insertedTransaction)){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to insert transaction parts'
            ], 500);
        }

        DB::commit();
        return response()->json([
            'success' => true
        ],200);
    }

    public function getTransactionData($uuid) {
        $transaction = $this->bankTransactionRepository->getByUuid($uuid);
        $transactionParts = $transaction->bankTransactionParts()->get()->map(function ($part){
            return [
                'reason' => $part->reason,
                'amount' => $part->amount
            ];
        });

        return response()->json([
            'amount' => $transaction->amount,
            'booking_date' => $transaction->booking_date,
            'parts' => $transactionParts
        ]);
    }
}
