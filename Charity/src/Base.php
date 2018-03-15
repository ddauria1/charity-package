<?php
namespace Charity;

class Base
{

    private $position;
    private $amountOptions;
    private $title;
    private $description;
    private $textButton;
    private $donateURL;
    private $availableCauses;
    private $causeIDSelected;


    const POS_ASIDE_CSS="
        <style>
        
            #charity-aside{
                background: #F6F5F2;
                padding: 15px 10px;
                border: 1px solid #CCC;
                max-width: 50%;
            }
            
            #charity-aside h2{ 
                color: #9A3324;
                margin-top: 0px; 
            }
            
            #charity-aside #charity-button{
                background: #DA291C;
                color: #FFFFFF;
                padding: 16px 20px;
                text-transform: uppercase;
                text-decoration: none;
                display: block;
                width:  30%;
                text-align: center;
            }
            
            
            /**
                MEDIA QUERY
            
             */
            @media only screen and (max-width:480px)  {
                #charity-aside{ max-width: 100% }
            }
            
            
        </style>
    ";

    const POS_FOOTER_CSS="
        <style>
        
            #charity-footer{
                padding: 15px 10px;
                max-width: 50%;
            }
            
            #charity-footer h2{ 
                color: #9A3324;
                margin-top: 10px; 
                float: left;
                font-size: 18px;
            }
            
            #charity-footer #charity-button{
                background: #DA291C;
                color: #FFFFFF;
                padding: 16px 20px;
                margin-left: 20px;
                text-transform: uppercase;
                text-decoration: none;
                display: block;
                float: left;
                text-align: center;
                font-size: 12px;
            }
            
            
            /**
                MEDIA QUERY
            
             */
            @media only screen and (max-width:480px)  {
                #charity-aside{ max-width: 100% }
            }
            
            
        </style>
    ";

    public function __construct(){
        $this->position = "aside";
        $this->amountOptions = null;
        $this->title = "Online Donations";
        $this->description = "";
        $this->textButton = "Donate";
        $this->donateURL = "";

        //define causes
        /*$this->availableCauses = [
            new Cause("Save the Children"," is an international non-governmental organisation that promotes children's rights, provides relief and helps support children in developing countries","https://www.savethechildren.org.uk/","save-the-children-logo.png"),
            new Cause('Crisis.co.uk - Homeless',"Crisis is the UK national charity for single homeless people.","https://www.crisis.org.uk/",""),
            new Cause("Age UK","is a registered charity in the United Kingdom,[1] formed on 25 February 2009, and launched on 1 April 2009, which combines the operations of the previously separate charities Age Concern and Help the Aged to form the UK's largest charity for older people","https://www.ageuk.org.uk/","")
        ];*/

        $this->causeIDSelected = 0; // By default we will select "Save The Children" cause


    }

    public function display() :string{
        $output = "<div id='charity-widget'>";


        if($this->position == "aside"){
            $output .= self::POS_ASIDE_CSS;
            $output .= "<div id='charity-aside'>";
                $output .= "<h2>$this->title</h2>";
                if(isset($this->description) && !empty($this->description)){
                    $output .= "<p>$this->description</p>";
                }
                if(isset($this->donateURL) && !empty($this->donateURL)) {
                    $output .= "<a id='charity-button' target='_blank' href='$this->donateURL'>$this->textButton</a>";
                }else{
                    //TODO display error message
                }
            $output .= "</div>";

        }else{ //footer
            $output .= self::POS_FOOTER_CSS;
            $output .= "<div id='charity-footer'>";
                $output .= "<h2>$this->title</h2>";
                 if(isset($this->donateURL) && !empty($this->donateURL)) {
                     $output .= "<a id='charity-button' target='_blank' href='$this->donateURL'>$this->textButton</a>";
                 }else{
                     //TODO display error message
                 }
            $output .= "</div>";
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

    /**
     * @return string
     */
    public function getDescription(): string{
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void{
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTextButton(): string{
        return $this->textButton;
    }

    /**
     * @param string $textButton
     */
    public function setTextButton(string $textButton): void{
        $this->textButton = $textButton;
    }

    /**
     * @return string
     */
    public function getdonateURL(): string{
        return $this->donateURL;
    }

    /**
     * @param string $donateURL
     */
    public function setdonateURL(string $donateURL): void{
        $this->donateURL = $donateURL;
    }









}