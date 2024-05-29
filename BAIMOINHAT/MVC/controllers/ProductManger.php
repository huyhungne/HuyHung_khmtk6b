<?php
    require_once './MVC/processing/controller.php';
    class ProductController extends controller{
        public $ProductModel;

        public function __construct()
        {
            $this -> ProductModel = $this->model("ProductModel");
        }
        public function displayIntroduction()
        {
            $this->view("master", [
                "Page"=> "home"
            ]);
        }

        function getProductsbyBand()
        {
            $this->view("master",["Page"=>"getProductsbyBand"]);
        }
    
        public function displayProductsByBand(){
            if(isset($_POST["btSearch"])){
                $band = $_POST["selectBand"];
                $tblname = 'tblproduct';
                $field = 'band';
                $products = $this->ProductModel->getRecordsbyField($tblname, $field, $band);
                $this->view("master",["Page"=>"getProductsbyBand","Products"=>$products]);
            }
        }
        
        function getProductsbyYear()
        {
            $this->view("master",["Page"=>"getProductsbyYear"]);
        }
    
        public function displayProductsByYear(){
            if(isset($_POST["btSearch"])){  
                $year = $_POST["selectYear"];
                $tblname = 'tblproduct';
                $field = 'year';
                $products = $this->ProductModel->getRecordsbyField($tblname, $field, $year);
                $this->view("master",["Page"=>"getProductsbyYear","Products"=>$products]);
            }
        }
        // doan code sai
        function getProductsOrderdetail()
        {
            $this->view("master",["Page"=>"getProductsOrderdetail"]);
        }
        // doan code sai
        public function displayProductsOrderdetail(){
            if(isset($_POST["btSearch"])){  
                $Orderdetail = $_POST["selectOrderdetail"];
                $tblname = 'tlbcustomer';
                $field = 'cid';
                $products = $this->ProductModel->getRecordsbyField($tblname, $field, $Orderdetail);
                $this->view("master",["Page"=>"getProductsOrderdetail","Products"=>$products]);
            }
        }
        // them moi san pham
        function impinsertProducts()
        {
            $this->view("master",["Page"=>"insertProduct"]);
        }

        public function insertProduct(){
            if(isset($_POST["btInsert"])){  
                $id = $_POST["id"];
                $pname = $_POST['pname'];
                $company = $_POST['company'];
                $year = $_POST["year"];
                $band = $_POST['band'];
                if(isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK){ //mã hóa
                    // lay anh
                    $pimage = 'data:image/png;base64,' . base64_encode(file_get_contents($_FILES['imageFile']['tmp_name']));

                }                             
            }
            $result = $this->ProductModel-> insertProduct($id, $pname, $company, $year, $band, $pimage);
            $this->view("master",["Page"=>"insertProduct","result"=> $result]);
        }
        

    }
?>