<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $fillable = ['nome', 'url', 'icone'];
    protected $guarded = ['id'];

    public function roles(){
        return $this->belongsTo(Rol::class, 'menu_rol');
    }

    public function getHijos($padres, $line)
    {
        $children = [];
        foreach ($padres as $line1) {
            if ($line['id'] == $line1['menu_id']) {
                $children = array_merge($children, [array_merge($line1, ['submenu' => $this->getHijos($padres, $line1)])]);
            }
        }
        return $children;
    }
    public function getPadres($front)
    {
        if ($front) {
            return $this->whereHas('roles', function ($query) {
                $query->where('rol_id', session()->get('rol_id'))->orderby('menu_id');
            })->where('estado', 1)
                ->orderby('menu_id')
                ->orderby('ordem')
                ->get()
                ->toArray();
        } else {
            return $this->orderby('menu_id')
                ->orderby('ordem')
                ->get()
                ->toArray();
        }
    }
    public static function getMenu($front = false)
    {
        $menus = new Menu();
        $padres = $menus->getPadres($front);
        $menuAll = [];
        foreach ($padres as $line) {
            if ($line['menu_id'] != 0)
                break;
            $item = [array_merge($line, ['submenu' => $menus->getHijos($padres, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }


    /*
    public function MenuFilho($pai, $line){

	$children = [];
	foreach ($pai as $key) {
		if($line['id'] == $key['menu_id']){
			$children = array_marge($children, [array_marge($key, ['submenu' => $this->MenuFilho($pai, $$key)])]);
		}
		return $children;
	}
}	

public function MenuPai($front){
	if($front){
		return $this->whereHas('role', function($query){
			$query->where('rol_id', session()->get('rol_id'))->orderby('menu_id');
		})->where('estado', 1)
		->orderby('menu_id')
		->orderby('ordem')
		->get()
		->toArray();
	}else{
	return $this->orderby('menu_id')
	->orderby('ordem')
	->get()
	->toArray();
}
}

public static function getMenu($front = false){

	$menus = new Menu();
	$pai = $menus->MenuPai($front);
	$menuAll = [];

	foreach ($pai as $key) {
		if($key['menu_id'] != 0){
			break;
			$item = [array_marge($key, ['submenu' => $menus->MenuFilho($pai, $key)])];
			$menuAll = array_marge($menuAll, $item);
		}
		return $menuAll;
	}
}*/
}


