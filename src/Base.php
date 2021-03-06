<?php

namespace Charity;

class Base
{

    private $position;
    private $amountOptions;
    private $textButton;
    private $availableCauses;
    private $causeIDSelected;

    const COMMON_CSS = "
        <style>
            #charity-widget a{ text-decoration: none; }
        </style>
    ";


    const POS_ASIDE_CSS = "
        <style>
        
            #charity-aside{
                background: #F6F5F2;
                padding: 15px 10px;
                border: 1px solid #CCC;
                max-width: 50%;
                font-family: 'Arial';
                font-size: 16px;
            }
            
            #charity-aside h2{ 
                color: #9A3324;
                margin-top: 0px;
                font-family: 'Times New Roman'; 
                font-size: 30px;
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

    const POS_FOOTER_CSS = "
        <style>
        
            #charity-footer{
                padding: 15px 10px;
                max-width: 50%;
                font-family: 'Arial';
                font-size: 16px;
            }
            
            #charity-footer h2{ 
                color: #9A3324;
                margin-top: 10px; 
                float: left;
                font-family: 'Times New Roman'; 
                font-size: 22px;
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

    /**
     * Base constructor - Define the list of availabile Charity Causes from where to choose
     . @param int $causeSelected - by default is 0 - Save The Children
     * @param bool $showLogo
     * @param bool $showCauseWebsiteURL
     */
    public function __construct(int $causeSelected=0, bool $showLogo=true, bool $showCauseWebsiteURL=true){

        $this->position = "aside";
        $this->amountOptions = null;
        $this->textButton = "Donate";
        $this->donateURL = "";

        //define causes
        $this->availableCauses = [
            new Cause("Save the Children"," is an international non-governmental organisation that promotes children's rights, provides relief and helps support children in developing countries","https://www.savethechildren.org.uk/","save-the-children-logo.png","https://www.paypal.com/fundraiser/charity/10727",$showLogo,$showCauseWebsiteURL), //https://www.savethechildren.org.uk/donate/regular/donation-regular-00002
            new Cause('Crisis.co.uk - Homeless',"Crisis is the UK national charity for single homeless people.","https://www.crisis.org.uk/","","https://www.crisis.org.uk/get-involved/donate/",$showLogo,$showCauseWebsiteURL),
            new Cause("Age UK","is a registered charity in the United Kingdom,[1] formed on 25 February 2009, and launched on 1 April 2009, which combines the operations of the previously separate charities Age Concern and Help the Aged to form the UK's largest charity for older people","https://www.ageuk.org.uk/","","https://www.paypal.com/fundraiser/charity/41580",$showLogo,$showCauseWebsiteURL) //https://donate.ageuk.org.uk/public/donate2.aspx?content=general
        ];

        $this->causeIDSelected = $causeSelected;

    }

    public function getDisplay() : string{

        $output = self::COMMON_CSS;
        $output .= "<div id='charity-widget'>";

        if(isset($this->availableCauses[$this->causeIDSelected]) && !empty($this->availableCauses[$this->causeIDSelected])){
            $charity = $this->availableCauses[$this->causeIDSelected];

            if(isset($charity) && !empty($charity) && is_a($charity,"Charity\Cause")) {

                $charityURL = $charity->getUrl();

                if ($this->position == "aside") {
                    $output .= self::POS_ASIDE_CSS;
                    $output .= "<div id='charity-aside'>";

                    if($charity->isShowCauseWebsiteURL() && isset($charityURL) && !empty($charityURL)){
                        $output .= "<a href='$charityURL' target='_blank'>";
                        $output .= "<h2>".$charity->getName()."</h2>";
                        $output .= "</a>";
                    }else{ $output .= "<h2>".$charity->getName()."</h2>"; }

                    if($charity->isShowLogo()) {
                        $logo = $charity->getLogoFilename();
                        if (isset($logo) && !empty($logo)) {
                            print "<img src='../src/images/causes/logos/$logo'>";
                        }
                    }

                    $description = $charity->getDescription();
                    if (isset($description) && !empty($description)) {
                        $output .= "<p>$description</p>";
                    }
                    $donateURL = $charity->getDonateURL();
                    if (isset($donateURL) && !empty($donateURL)) {
                        $output .= "<a id='charity-button' target='_blank' href='$donateURL'>$this->textButton</a>";
                    }
                    $output .= "</div>";

                } else { //footer
                    $output .= self::POS_FOOTER_CSS;
                    $output .= "<div id='charity-footer'>";

                    if($charity->isShowCauseWebsiteURL() && isset($charityURL) && !empty($charityURL)) {
                        $output .= "<a href='$charityURL' target='_blank'>";
                        $output .= "<h2>".$charity->getName()."</h2>";
                        $output .= "</a>";
                    }else{ $output .= "<h2>" . $charity->getName() . "</h2>"; }

                    $donateURL = $charity->getDonateURL();
                    if (isset($donateURL) && !empty($donateURL)) {
                        $output .= "<a id='charity-button' target='_blank' href='$donateURL'>$this->textButton</a>";
                    }
                    $output .= "</div>";
                }

            }

        }else{ $output .= "<span style='color:red;font-weight:bold;'>Select Valid Cause</span>"; }

        $output .= " </div>";

        return $output;
    }


    /**
     * Print the Charity Widget accordingly the format/position chosen (aside, footer)
     */
    public function display() :void{
        print $this->getDisplay();
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
    public function getTextButton(): string{
        return $this->textButton;
    }

    /**
     * @param string $textButton
     */
    public function setTextButton(string $textButton): void{
        $this->textButton = $textButton;
    }

}