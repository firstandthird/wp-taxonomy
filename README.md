wp-taxonomy
===========

Wordpress Plugin for custom taxonomies

## Usage

Install to plugin directory.

Create a new directory under `wp-content` called `taxonomy`. This will store all the yaml files.

## Creating a taxonomy

Copy one of the example yaml files from the `example-conf` directory and place it into the `taxonomy` directory you created.

For available parameters, see this [wordpress wiki article](http://codex.wordpress.org/Function_Reference/register_taxonomy).

## Configuring config path

In your plugin or functions.php

```php
add_action('init', 'test_taxonomy');
function test_taxonomy() {
  do_action('ft_taxonomy_path', '/your/path/here/');
}
```