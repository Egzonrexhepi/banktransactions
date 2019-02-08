<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bank_transaction_id
 * @property float $ammount
 * @property string $reason
 * @property string $created_at
 * @property string $updated_at
 * @property BankTransaction $bankTransaction
 */
class BankTransactionPart extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bank_transaction_part';

    /**
     * @var array
     */
    protected $fillable = ['bank_transaction_id', 'ammount', 'reason', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bankTransaction()
    {
        return $this->belongsTo('App\BankTransaction');
    }
}
