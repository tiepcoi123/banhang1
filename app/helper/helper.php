<?php
use App\Models\{Chef,Dish,Category};

if (!function_exists('get_name_chef_by_id')) {
    function get_name_chef_by_id($id_chef)
    {
       $data = Chef::where('id', $id_chef)->first();

       return $data['name'];
    }

}

if (!function_exists('get_name_dish_by_id')) {
   function get_name_dish_by_id($id_dish)
   {
      $data = Dish::where('id', $id_dish)->first();

      if($data){
         return $data['name_dish'];
      }

      return null;
   }
}

if (!function_exists('get_category_by_dish_id')) {
   function get_category_by_dish_id($id_category)
   {
      $data = Category::where('id', $id_category)->first();

      return $data['name'];
   }
}

