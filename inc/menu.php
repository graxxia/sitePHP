<?php


class Menu{
    //members
    public $id; //main-menu
    private $items =[];
    private $sortDesc = true;

    function __construct($id){
        $this->id = $id;
    }

    public function setDesc($yes){
        if($yes == $this->sortDesc){
            return;
        }
        $this->sortDesc= $yes;
        $this->sortMenu();
    }

    private function sortMenu(){
        //usort compares a and b
        uasort($this->items, function($a, $b){
            if($a['order']===$b['order']){
                return 0;
            }
            if($this->sortDesc){
               return $a['order']< $b['order'] ? -1: 1; 
            }else{
                return $a['order']< $b['order'] ? -1: 1;
            }
        });
    }

//default needs to go at the end "$order=0 "
    public function addItem($text, $page, $order=0){
        //cleanup page (key) // replace espaces for no espace
        $page = strtolower(str_replace(' ','', trim($page)));
        //add array to list of item
        //the $ symbol we only use it once o we called the items with no $s
        $this->items[$page]= ["text"=>$text, 'order'=>$order,'active'=>false];  
        $this->sortMenu(); 
    }

//page, text, order (of menu items), active (what page we are on)
    public function render(){
        $strOut ="<ul id=\"{$this->id}\">";
        foreach ($this->items as $k => $v) {
            $strOut .="<li><a href=\"?p=$k\">{$v['text']}</a></li>";
        }
        $strOut .= "</ul>";
        return $strOut;
    }
}

?>