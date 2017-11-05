<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Category_Product_Model
 */
class Category_Product_Model extends Eloquent {

    protected $table = "cat_pro_relation"; // table name
    public $timestamps = false;
}

