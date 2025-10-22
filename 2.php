<?php
$debug = false;

if ($debug) {
    echo ("<pve>");
    print_r($_GET);
    echo ("</pve>");
}
echo ("Okej czyli wolisz: ". $_POST["stan_placka"] ."");

?>