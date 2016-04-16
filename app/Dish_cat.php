<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Dish_cat extends Model{
        protected $table = 'dish_cat';

        protected $fillable = ['idCategory','idDish'];
    }

?>