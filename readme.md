# PHP Pepo Campaign Library

There a simple Pepo Campaign library in PHP

### Prerequisites

This library use cUrl

### How to use it
```
require ("pepocampaign.php");
$pepo = new pepocampaign();
```

### Create contact list
```
require ("pepocampaign.php");
$pepo = new pepocampaign();
$atributes = array('name' => 'The new list name', 'source' => 'Loremp ipsum');
$pepo->create_list($atributes);
```

### Add contact to list
```
require ("pepocampaign.php");
$pepo = new pepocampaign();
$pepo->set_list(8);
$atributes = array('email' => 'user@email.com', 'first_name' => 'Loremp', 'last_name' => 'Ipsum');
$pepo->add_contact_to_list($atributes);
```

### Remove contact from list
```
require ("pepocampaign.php");
$pepo->set_list(8);
$pepo = new pepocampaign();
$atributes = array('email' => 'user@email.com');
$pepo->remove_contact_from_list($atributes);
```

### Change user status
```
require ("pepocampaign.php");
$pepo = new pepocampaign();
$atributes = array('email' => 'user@email.com', 'type' => 'unsubscribed');
$pepo->change_user_status($atributes);
```

### About Pepo Campaign
Pepo Campaigns builds on our team’s 6 years of experience sending >1 billion emails through campaigns, transactional, and targeted trigger emails (for large e-commerce companies like Fab.com), offering you enterprise-level features at startup speed.

Create gorgeous emails with our drag-and-drop template tool
Optimize your campaigns using insightful reports and analytics
Target your campaigns with advanced segmentation and A/B testing
Leverage powerful marketing automation to create sophisticated trigger flows
Utilize our API’s to send transactional emails
All made simple with no code required on your end, so your developers can stay focused on the technology while your marketing team can focus on the message.