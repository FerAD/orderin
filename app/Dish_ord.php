<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Dish_ord extends Model{
        protected $table = 'dish_ord';

        protected $fillable = ['idDish','tokenOrder','idTopping'];
    }
?>