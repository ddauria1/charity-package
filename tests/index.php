<?php
//TODO  - working in progress - build usage example here

require_once $_SERVER['DOCUMENT_ROOT'].'/charity-package/vendor/autoload.php';

use Charity\Base;

$charity = new Base();
?>

<style>
    section{ margin-bottom: 100px; }
</style>

<section>
<h2> ASIDE VIEW</h2>

<?php
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



