<?php
require ("pepocampaign.php");
$pepo = new pepocampaign();
$pepo->set_list(8);
$pepo->add_contact_to_list(array('first_name' => 'as', 'last_name' => 'no'));