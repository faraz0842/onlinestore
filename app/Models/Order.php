<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'first_name',
     'last_name',
     'address',
     'email',
     'zip',
     'city',
     'phone',
     'quantity',
     'price',
     'sub_total',
     'grand_total',];

    protected $cast = [

        'price' => 'array',

    ];
}
