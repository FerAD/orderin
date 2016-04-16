<?php
/**
 * Created by PhpStorm.
 * User: FAD
 * Date: 16/04/16
 * Time: 9:33 AM
 */
    namespace App;

    use Illuminate\Database\Eloquent\Model;
    class Menu extends Model{
        protected $table = 'menus';

        protected $fillable = ['idMenu','idBranch'];
    }

?>