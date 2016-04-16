<?php

    namespace App;
    
    use Illuminate\Database\Eloquent\Model;
    
    class Men_cat extends Model{
        protected $table = 'men_cat';
    
        protected $fillable = ['idMenu','idCategory'];
    }

?>