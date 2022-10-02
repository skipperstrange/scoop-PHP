<?php
//checking if a get request has been set. (p or post to check POST requests, g or get to check GET requests)
if(check_post_get('g','id')){
    echo "<p>The product id in view file is set </p>";
}else{
    echo "<p>The product id in controller file is not set</p>";
    echo "Add an id to see id in url. (Check routes for id type)";
}
echo "<p>The product id in view file is ".post_get('g', 'id')."</p>";