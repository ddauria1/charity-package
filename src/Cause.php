<?php

namespace Charity;


class Cause
{
    private $name;
    private $description;
    private $url;
    private $logoFilename;


    public function __construct(string $name, string $description,string $url, string $logoFilename){
        $this->name = $name;
        $this->description = $description;
        $this->url = $url;
        $this->logoFilename = $logoFilename;
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


}