<?php
namespace Charity;

class Base
{

    private $position;
    private $amountOptions;
    private $title;


    public function __construct(){
        $this->position = "aside";
        $this->amountOptions = null;
        $this->title = "Donate";

    }

    public function display() :string{
        $output = "
            <div id='charity-widget'>
        ";

        //TODO write code to prepare HTML template for our widget

        if($this->position == "aside"){
            $output .= " 
                <div id='charity-aside'>
                    <h1>$this->title</h1>
                </div>
            ";
        }else{ //footer
            $output .= " 
                <div id='charity-footer'>
                    <h1>$this->title</h1>
                </div>
            ";
        }

        $output .= " </div>";

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

    /**
     * @return string
     */
    public function getTitle(): string{
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title){
        $this->title = $title;
    }



}