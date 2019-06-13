<?php

$row = 1;
$limit = 120;

if (($handle = fopen("/home/tran/mock.csv", "r")) !== FALSE) {
    $members = "";
    $userTypeGroups = [];
    $departMent = [];

    while ((($data = fgetcsv($handle, 1000, ",")) !== FALSE) && ($row <= $limit)){
        $num = count($data);
        if (!isset($userTypeGroups[$data[4]]) && $data[4] !== "")  $userTypeGroups[$data[4]] = $data[4];
        if (!isset($departMent[$data[5]]) && $data[4] != "")  $departMent[$data[5]] = $data[5];
        $row++;
    }

// Create groups:
    foreach($userTypeGroups as $groupName){
        /*
        dn: cn=staff,ou=pluriel,ou=groups,dc=example,dc=org
            changetype: add
            objectClass: groupOfNames
            objectClass: top
            cn: staff
         */
        echo "dn: cn=".$groupName.",ou=groups,dc=example,dc=org\n";
        echo "changetype: add\n";
        echo "objectClass: groupOfNames\n";
        echo "objectClass: top\n";
        echo "cn: ".$groupName."\n";
        echo "\n"; 
    }
// Create ou:
    foreach($departMent as $dept){
        /*
            dn: ou=abc,ou=staff,ou=people,dc=example,dc=org
            changetype: add
            objectClass: organizationalUnit
            objectClass: top
            ou: abc
        */
        echo "dn: ou=".$dept.",ou=people,dc=example,dc=org\n";
        echo "changetype: add\n";
        echo "objectClass: organizationalUnit\n";
        echo "objectClass: top\n";
        echo "ou: ".$dept."\n";
        echo "\n"; 
    }        

    fclose($handle); 
}