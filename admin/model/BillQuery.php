<?php
        class BillQuery{

            public $pdo;

            public function __construct(){
                $this->pdo = connectDB();
            }
            
            public function __destruct(){
                $this->pdo = null;
            }

            public function all_bill(){
                try {
                    $sql = "SELECT * FROM bill";

                    $data = $this->pdo->query($sql)->fetchAll();

                    $danh_sach_bill = [];
                    foreach( $data as $row){
                        $bill = new Bill();
                        $bill->id = $row['id'];
                        $bill->account_id = $row['account_id'];
                        
                        $danh_sach_bill[] = $bill;
                    }
                    return $danh_sach_bill;
                    
                } catch (Exception $e) {
                    //throw $th;
                }
            }
        }
?>