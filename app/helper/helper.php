<?php
use App\Models\Chef;

if (!function_exists('get_name_chef_by_id')) {
    function get_name_chef_by_id($id_chef)
    {
       $data = Chef::where('id', $id_chef)->first();

       return $data['name'];
    }
}
