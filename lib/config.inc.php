<?php

// 
//  config.inc.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-11.
//  Copyright 2011 Dave Waller. All rights reserved.
// 

define("BASE_PATH","http://d13design");
$path = "";

//Define site URLs
define("SITE_URL",BASE_PATH.$path);
define("ASSETS_URL",BASE_PATH.$path.'/assets');

define("SITE_NAME",'d13design');
define("SITE_AUTHOR",'Dave Waller');
define("SITE_EMAIL",'site@d13design.co.uk');

define("DB_HOST",'127.0.0.1');
define("DB_NAME",'d13design');
define("DB_USER",'root');
define("DB_PWRD",'root');

define("SALT",'vXjaNwrIpwOuqMEq');
define("ALLOW_REGISTER",true);

define("TEMPLATE",'default');

define("PAGE_COUNT", 4);

?>