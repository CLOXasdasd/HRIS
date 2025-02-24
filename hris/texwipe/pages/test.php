<?php
 

// LDAP variables
$ldapuri = "ldap://tpi.texwipe.local";  // your ldap-uri

// Connecting to LDAP
$ldapconn = ldap_connect($ldapuri)
          or die("That LDAP-URI was not parseable");
?>