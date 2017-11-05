<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Category_Model
 */
class Category_Model extends Eloquent {

    protected $table = "np_categories"; // table name
    public $timestamps = false;
}

