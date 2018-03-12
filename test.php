<?php
/**
 * Date: 12/03/2018
 *
 * This file is used to test the functionality of the Charity package
 */

//TODO  - working in progress - build usage example here

include $_SERVER['DOCUMENT_ROOT'].'/charity-package/Charity/src/Base.php';


$charity = new \Charity\Base();

print $charity->display();

