<?php
namespace Charity;

class Base
{

    private $position;
    private $amountOptions;


    public function __construct(){
        $this->position = "aside";
        $this->amountOptions = null;
    }

    public function display() :string{
        $output = "";

        //TODO write code to prepare HTML template for our widget

        return $output;
    }

    /**
     * @return string
     */
    public function getPosition(): string{
        return $this->position;
    }

    public function changeViewToAside(){
        $this->position="aside";
    }

    public function changeViewToFooter(){
        $this->position="footer";
    }

    public function isAsideView():bool {
        if($this->position=="aside"){
            return true;
        }else{ return false; }
    }

    public function iFooterView():bool {
        if($this->position=="footer"){
            return true;
        }else{ return false; }
    }


    public function getAmountOptions(){
        return $this->amountOptions;
    }

    public function isAmountOptions():bool{
        if(isset($this->amountOptions) && is_array($this->amountOptions)){
            return true;
        }else{ return false; }
    }

}