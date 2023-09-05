<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{

/******************************************************************************************************************** 
This function is used to save the value of the menu from the component menu and from the file menu.vue  file in the 
table menu in the database 
*******************************************************************************************************************/
    public function add(Request $request){
        
    }

/******************************************************************************************************************** 
This function is used to get all the  the value of the menu table along with menu_table from the databse and return 
it to the menu.vue file in the menu component
*******************************************************************************************************************/
    public function getMenu(){
        $menu = Menu::get();
        return $menu;
    }
}
