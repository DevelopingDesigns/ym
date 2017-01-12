ACF - Admin Flexible Content Collapse
=====================================

When you create a Flexible Content Field with many layouts and many fields, you can quickly lose overview. Similarly, if you have ever tried to sort the layouts or move fields between layouts, you know that this can be a difficult undertaking.

This is where **ACF - Admin Flexible Content Collapse** comes in place. You can collapse/expand the layouts for a better overview, sorting layouts or move fields.

In addition, I replaced the text links for sorting, adding etc. against symbols.

![ACF Admin Flexible Content Collapse](http://www.dreihochzwo.de/download/admin_flex_collapse.gif)

### Installation

This add-on can be treated as both a WP plugin and a theme include.

**Install as Plugin**

1. Copy the 'acf-flex-admin-collapse' folder into your plugins folder
2. Activate the plugin via the Plugins admin page

**Include within theme**

1.	Copy the 'acf-flex-admin-collapse' folder into your theme folder (can use sub folders). You can place the folder anywhere inside the 'wp-content' directory
2.	Edit your functions.php file and add the code below (Make sure the path is correct to include the acf-flex-admin-collapse.php file)

```php
include_once('acf-flex-admin-collapse/acf-flex-admin-collapse.php');
```

### Compatibility

This ACF field type is only compatible with ACF 5.

**This plugin needs the installation/activation of Advanced Custom Fields V5**

The plugin is tested from ACF 5.3.4 up to ACF 5.3.6.1.

### Changelog

**1.0.0**
* Initial commit
