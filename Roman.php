<?php
class Roman{

    private $convertTable = array('I' => 1, 'V' => 5);

    function __construct() {
       rsort($this->convertTable); 
    }

    public function convert($input) {
        foreach($this->convertTable as $key=>$value) {
            echo $value;
        }
    }

}

