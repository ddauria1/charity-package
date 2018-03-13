<?php
/**
 * Date: 12/03/2018
 *
 * This file is used to test the functionality of the Charity package
 */

//TODO  - working in progress - build usage example here

include $_SERVER['DOCUMENT_ROOT'].'/charity-package/Charity/src/Base.php';

?>

<style>
    section{ margin-bottom: 100px; }
</style>

<section>
<h2> ASIDE VIEW</h2>

<?php

    $charity = new \Charity\Base();

    $charity->setTitle("Save The Children");
    $charity->setDescription("Donate to Save the Children and start making a big difference today");
    $charity->setdonateURL("https://www.savethechildren.org.uk/donate/regular/donation-regular-00002");

    print $charity->display();

?>
</section>


<section>
<h2> FOOTER VIEW </h2>

<?php

    $charity->changeViewToFooter();
    print $charity->display();

?>
</section>



