<?php

namespace Charity;


class Cause
{
    private $name;
    private $description;
    private $url;
    private $logoFilename;
    private $donateURL;
    private $showLogo;
    private $showCauseWebsiteURL;


    public function __construct(string $name, string $description,string $url, string $logoFilename, string $donateURL = "",bool $showLogo=true,bool $showCauseWebsiteURL=true){
        $this->name = $name;
        $this->description = $description;
        $this->url = $url;
        $this->logoFilename = $logoFilename;
        $this->donateURL = $donateURL;
        $this->showLogo = $showLogo;
        $this->showCauseWebsiteURL = $showCauseWebsiteURL;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getLogoFilename(): string
    {
        return $this->logoFilename;
    }

    /**
     * @return string
     */
    public function getDonateURL(): string
    {
        return $this->donateURL;
    }

    /**
     * @param string $donateURL
     */
    public function setDonateURL(string $donateURL): void
    {
        $this->donateURL = $donateURL;
    }

    /**
     * @return bool
     */
    public function isShowLogo(): bool
    {
        return $this->showLogo;
    }

    /**
     * @param bool $showLogo
     */
    public function setShowLogo(bool $showLogo): void
    {
        $this->showLogo = $showLogo;
    }

    /**
     * @return bool
     */
    public function isShowCauseWebsiteURL(): bool
    {
        return $this->showCauseWebsiteURL;
    }

    /**
     * @param bool $showCauseWebsiteURL
     */
    public function setShowCauseWebsiteURL(bool $showCauseWebsiteURL): void
    {
        $this->showCauseWebsiteURL = $showCauseWebsiteURL;
    }


}