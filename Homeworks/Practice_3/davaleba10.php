<?php
function hasNumbers($url) {
    return preg_match('/\d/', $url);
}

// ტესტი
$url = "https://test123.com";

if (hasNumbers($url)) {
    echo "URL შეიცავს რიცხვებს";
} else {
    echo "არ შეიცავს რიცხვებს";
}
?>