<?php

//$ch = curl_init('https://api.github.com/orgs/hoaproject/repos');
//curl_setopt($ch, CURLOPT_HTTPHEADER, [
//    'Accept: application/vnd.github.v3+json',
//    'User-Agent: board',
//    ]
//);
//$res = curl_exec($ch);
//$repositories = json_decode($res);

$f = file_get_contents('repos.json');
$repositories = json_decode($f);
foreach ($repositories as $repo) {
    $name = $repo->name;
    echo sprintf("* %s ![state](http://central.hoa-project.net/State/%s)" . PHP_EOL, $name, $name);
}
