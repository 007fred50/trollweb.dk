<?php

// if (isset($_GET["page"]) && $_GET["page"] == "home") {
//     include("pages/home.html");
// }

// elseif (isset($_GET["page"]) && $_GET["page"] == "about") {
//     include("pages/about.html");
// }

// elseif (isset($_GET["page"]) && $_GET["page"] == "contact") {
//     include("pages/contact.html");
// }

// else {
//     header("HTTP/1.0 404 Not Found");

//     include("pages/404.html");
// }

$page = (isset($_GET['page']) ? $_GET['page'] : null);

if($page == ""){
    include('pages/404.html');
}else{
	include('pages/'.$page.'.html');
}