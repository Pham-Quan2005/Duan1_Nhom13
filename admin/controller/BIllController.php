<?php
    class  BillController{

            public $billQuery;
            public $categoryQuery;


            public function __construct(){
                $this->billQuery = new BillQuery();
                $this->categoryQuery = new CategoryQuery();
            }
            public function __destruct(){
                
            }

    
            public function list(){
            $bill = $this->billQuery->all_bill();
            $listCategory = $this->categoryQuery->all_category();

            
                include "view/bill/list.php";
             }
    }

    