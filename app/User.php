<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    protected $fillable = ['email', 'shop_name', 'card_brand', 'shop_domain'];
}

