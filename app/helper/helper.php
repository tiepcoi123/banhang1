<?php
use App\Models\{Chef,Dish,Category,Attribute};

if (!function_exists('get_name_chef_by_id')) {
    function get_name_chef_by_id($id_chef)
    {
       $data = Chef::where('id', $id_chef)->first();

       if($data){
         return $data['name'];
      }
       return null;
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

if (!function_exists('get_name_attribute_by_id')) {
   function get_name_attribute_by_id($id_attribute)
   {
      $data = Attribute::where('id', $id_attribute)->first();
      return $data['name'];
   }
}

if (!function_exists('get_name_dish_by_id')) {
   function get_name_dish_by_id($id_dish)
   {
      $data = dish::where('id', $id_dish)->first();

      return $data['name_dish'];
   }
}

/**
 * Hàm đệ quy category
 */
if (!function_exists('getCategory')) {
   function getCategory($category, $parent, $shift, $is_select = false)
   {
      foreach ($category as $row) {
         if ($row->parent_id == $parent) {
            if ($is_select) {
               echo "<option value='$row->id'>" . $shift . $row->name . "</option>";
               getCategory($category, $row->id, $shift . '---', true);
            }
            else{
               echo "<tr>
                        <td>".$row->id." </td>
                        <td >". $shift .' '. $row->name ."</td>
                        <td>". $row->created_at ."</td>
                        <td>
                           <a href=". route('edit_category', ['category' => $row]) ."
                              class='btn btn-warning btn_edit' type='Sửa' ><i style='color: #FFF' class='fas fa-edit'></i></a>

                           <button type='submit' class='btn btn-danger btn-delete-category'
                              data-id='. $row->id .' title='Xóa'><i class='fas fa-trash'></i>
                           </button>

                        </td>
                  </tr>";
                  getCategory($category, $row->id, $shift . '---');
            }
         }
      }
   }
}

function get_Combination($array)
{
    $result = array(array());
    foreach ($array as $property => $property_values) {
        $tmp = array();
        foreach ($result as $result_item) {
            foreach ($property_values as $property_value) {
                $tmp[] = array_merge($result_item, array($property => $property_value));
            }
        }
        $result = $tmp;
    }
    return $result;
}

function get_Combination2($array)
{
    $result = array(array());
    foreach ($array as $property => $property_values) {
        $tmp = array();
        foreach ($result as $result_item) {
            foreach ($property_values as $property_value) {
                $tmp[] = array_merge($result_item, array($property => $property_value));
            }
        }
        $result = $tmp;
    }
    return $result;
}

function check_variant($dish, $array)
{
    foreach ($dish->variant as $row) {
        $mang = array();
        foreach ($row->value as $val) {
            $mang[] = $val->id;
            if (array_diff($mang, $array) == NULL) {
                return false;
            }
        }
    }
    return true;
}