<?php

$row = 1;
$limit = 120;

if (($handle = fopen("/home/tran/mock.csv", "r")) !== FALSE) {
    $members = "";
    $userTypeGroup
    while ((($data = fgetcsv($handle, 1000, ",")) !== FALSE) && ($row <= $limit)){
        $num = count($data);
        echo "# New entry \n";
        echo "dn: uid=".$data[2].",ou=dev,ou=staff,ou=people,dc=example,dc=org\n";
        echo "changetype: add\n";
        echo "gidNumber: 0\n";
        echo "objectClass: inetOrgPerson\n";
        echo "objectClass: organizationalPerson\n";
        echo "objectClass: person\n";
        echo "objectClass: top\n";
        echo "objectClass: posixAccount\n";
        echo "uidNumber: $row\n";
        echo "uid: ".$data[2]."\n";
        echo "homeDirectory: /home/".$data[2]."\n";
        echo "sn: ".$data[3]."\n";
        echo "cn: ".$data[3]."\n";
        echo "mail: ".$data[1]."\n";
        echo "employeeType: ".$data[4]."\n";        
        echo "displayName: Name ".$data[3]."\n";
        echo "userPassword:: UEBzc3cwcmQ=\n";
        echo "\n";  
        $row++;
    }

    fclose($handle);

    echo "dn: cn=devs02,ou=pluriel,ou=groups,dc=example,dc=org\n";
    echo "changetype: add\n";
    echo "objectClass: groupOfNames\n";
    echo "objectClass: top\n";
    echo "cn: devs\n";
    echo $members;
    echo "description: Global group\n";
}