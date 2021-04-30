<?php

    class Produs{
        //proprietati
        public $name,$amount,$descriere,$images,$tip;

        //constructor
        function __construct($name,$amount,$descriere,$images,$tip){
            $this->name=$name;
            $this->amount=$amount;
            $this->descriere=$descriere;
            $this->images=$images;
            $this->tip=$tip;
        }
        
        //incapsulare metode
        function get_name() {
            return $this->name;
          }
        function get_amount() {
            return $this->amount;
        }
        function get_descriere() {
            return $this->descriere;
        }
        function get_image() {
            return $this->images;
        }
        function get_tag() {
            return $this->tip;
        }
        //este apelat imediat la sfarsitul codului 
    //     function __destruct() {
    //         echo "Acest produs obiect {$this->name} a fost distrus.";
    //     }
    }
?>