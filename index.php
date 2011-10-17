<?php

// 
//  index.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-11.
//  Copyright 2011 Dave Waller. All rights reserved.
// 

require_once 'lib/config.inc.php';
require_once 'lib/route.inc.php';
require_once 'lib/helper.inc.php';

//Require header
require('template/'.TEMPLATE.'/header.php');

//Require url-processor and page loader
require_once 'lib/loader.inc.php';

//Require footer
require('template/'.TEMPLATE.'/footer.php');

?>