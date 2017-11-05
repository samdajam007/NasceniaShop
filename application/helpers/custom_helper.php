<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function checkLoginStatus() {
    $ci =& get_instance();
    if (! $ci->session->userdata('isUserLoggedIn')) {
        return false;
    }
    return true;
}

function category_list(){
    $result = Category_Model::where('cate_active', '=', 1)->get();
    return $result;
}

function get_parent_categories_list(){
    $result = Category_Model::where('cate_parent', 0)->orderBy('cate_name', 'asc')->get();
    return $result;
}

function get_child_cateogries($parent_id){
    $result = Category_Model::where('cate_parent', $parent_id)->get();
    return $result;
}

function get_child_category($parent_id){
    $result = Category_Model::where('id', $parent_id)->first();
    return $result;
}

function get_category($id){
    $result = Category_Model::where('id', $id)->first();
    return $result;
}

function get_product($id){
    $result = Product_Model::where('id', $id)->first();
    return $result;
}

function product_list($limit){
    $result = Product_Model::orderBy('id', 'desc')->take($limit)->get();
    return $result;
}

function product_list_by_cat_id($cat_id){
    $pro_ids = Category_Product_Model::where('cat_id', $cat_id)->lists('pro_id')->toArray();
    $result = Product_Model::whereIn('id', $pro_ids)->get();
    return $result;
}

function get_reviews($pro_id = NULL){
    if($pro_id != null){
        $result = Review_Model::where('pro_id', $pro_id)->orderBy('id', 'desc')->get();
    }else{
        $result = Review_Model::orderBy('id', 'asc')->get();
    }

    return $result;
}


function get_ratings($pro_id){
    $result = 0;
    $ratings = Review_Model::where('pro_id', $pro_id)->lists('ratings')->toArray();
    if(count($ratings)>=1){
        $result = array_sum($ratings)/count($ratings);
    }
    return $result;
}

function get_user_data(){
    $ci =& get_instance();
    return $ci->session->userdata;
}