<?php
//TODO  - working in progress - build usage example here

require_once $_SERVER['DOCUMENT_ROOT'].'/charity-package/vendor/autoload.php';

use Charity\Base;

?>

<style>
    section{ margin-bottom: 100px; }
</style>

<section>
<h2> ASIDE VIEW</h2>

<?php

    $charity = new Base();

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



