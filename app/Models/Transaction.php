<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'transactions_id';
    protected $fillable = [
        'user_id',
        'category_id',
        'currency_id',
        'amount',
        'type',
        'description',
        'date'
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        //return $this->belongsTo(User::class);
        return $this->belongsToMany(
            User::class,
            'transaction_user',
            'transaction_id',
            'user_id')
            ->withPivot('amount')->withTimestamps();
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
