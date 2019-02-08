<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $uuid
 * @property float $amount
 * @property string $booking_date
 * @property string $created_at
 * @property string $updated_at
 * @property BankTransactionPart[] $bankTransactionParts
 */
class BankTransaction extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bank_transaction';

    /**
     * @var array
     */
    protected $fillable = ['uuid', 'amount', 'booking_date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bankTransactionParts()
    {
        return $this->hasMany('App\BankTransactionPart');
    }
}
