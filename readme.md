# Pepo Campaign Library

There a simple Pepo Campaign library in PHP

### Prerequisites

This library user cUrl

### How to use it
```
require ("pepocampaign.php");
$pepo = new pepocampaign();
```

### Create conact list
```
require ("pepocampaign.php");
$pepo = new pepocampaign();
$atributes = array('name' => 'The new list name', 'source' => 'Loremp ipsum');
$pepo->create_list($atributes);
```

### Add conact to list
```
require ("pepocampaign.php");
$pepo = new pepocampaign();
$atributes = array('email' => 'user@email.com', 'first_name' => 'Loremp', 'last_name' => 'Ipsum');
$pepo->add_contact_to_list($atributes);
```

### Remove contact from list
```
require ("pepocampaign.php");
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