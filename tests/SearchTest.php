<?php 
    
    class SearchTest extends \PHPUnit\Framework\TestCase {
       
        public $hostname = "127.0.0.1";
        public $username = "sam";
        public $password = "test1234"; 
        public $database = "Creative_database1" ;
        protected $con;

        public function testByRowsReturn(){ // check that the number of rows is correct
            $search = new App\Searcher;
            $this->con = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
            $Type_query = $search->getById(1);
            $Type_query_run  = mysqli_query($this->con, $Type_query);
            $n = mysqli_num_rows($Type_query_run);

            $out = ($n == 1) ? true : false;
            $this->con->close();
            $this->assertTrue($out);   
        }    
        
        public function testByNameReturn(){ // check by name
            $search = new App\Searcher;
            $this->con = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
            $Type_query = $search->getById(1);
            $Type_query_run  = mysqli_query($this->con, $Type_query);
            $results = mysqli_fetch_assoc($Type_query_run);

            $expected = "UG industry Internship (WIL)";

            $this->con->close();
            $this->assertEquals($expected,$results["Project_Type"]);
        }
        
        public function testByGroupRowReturn(){ // check Group By Project_ID // this test should 
            $search = new App\Searcher;
            $this->con = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
            $Type_query = $search->getByGroup();

            $products_query_run  = mysqli_query($this->con, $Type_query);
            $actual_row = mysqli_num_rows($products_query_run);
            // var_dump($num);

            
            $expected_row = 7;
            $this->con->close();
            $this->assertEquals($expected_row,$actual_row);
        }

        public function testByTypeInReturn(){ // check Group By Project_ID // testing Type_ID (1,2)
            $search = new App\Searcher;
            $this->con = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
            $test = array(1,2);
            $brands = join(",",$test);

            $Type_query = $search->getTypeIn($brands);

            $products_query_run  = mysqli_query($this->con, $Type_query);
            $actual_row = mysqli_num_rows($products_query_run);

            foreach( $products_query_run as $product){
                $t[] = $product["Type_ID"];
            }

            $type = array_count_values($t); //
            // The result should be 3 (TypeID 1 one and TypeID 2 two) and have 3 rows
            if($type["1"] == 1 && $type["2"] == 2 && $actual_row == 3){
                $this->assertTrue(true);
            }
        }
    }


?>