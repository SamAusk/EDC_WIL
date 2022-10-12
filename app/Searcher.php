<?php 
namespace App;


class Searcher{

    public function getById(int $id){
        return "SELECT * FROM Project_Type Where Project_id = $id";
    }

    public function getByGroup(){
        return "SELECT * FROM Primary_Page GROUP BY Project_ID";
    }

    public function getTypeIn(string $brands){
        return "SELECT * FROM Primary_Page WHERE Type_ID IN ($brands)";
    }
}



?>