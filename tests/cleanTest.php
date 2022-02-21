<?php

$categories = [
    81 => "CLEAN ADJACENT",
    84 => "SUB CLEAN",
    87 => "SEMI CLEAN",
    89 => "CLEAN",
    91 => "PURE CLEAN",
    93 => "TRUE CLEAN" 
];

for ($i = 75; $i < 100; $i += 0.25) {  
    
    $ratedCategory = "NOT CLEAN";

    foreach ($categories as $score => $category) {
        if ($i >= $score) {
            $ratedCategory = $category;
        }
    }

    echo "$i => " . $ratedCategory . "\n";
}