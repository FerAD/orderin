<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish_topp extends Model{
    protected $table = 'dish_topp';

    protected $fillable = ['idDish','idTopping'];
}
?>