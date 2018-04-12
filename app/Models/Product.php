<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $primaryKey = 'code';
    protected $fillable = [ 'code', 'name', 'description', 'stock', 'price', 'discontinued'];

    public static $mappings = ['code', 'name', 'description', 'stock', 'price', 'discontinued'];
    public static $types = ['string', 'string', 'string', 'int', 'float', 'bool'];
}
