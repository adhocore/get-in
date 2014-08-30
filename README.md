## about

this prevents php error "Call to a member function on a non-object" and provides elegant syntax to access the methods of chained object in a fluent way and also has default value for if it should fail at any point


## rationale and usage

for something like:

```php
echo $user->getGroup()->getPermission()->getName();
```

this scenario is not uncommon in any ORM. now, in case `$user` is `null` or `$user->getGroup()` is `null` or etc, it can be hell of a checks like: 

```php
$default = 'some name';
if ($user) {
    $group = $user->getGroup();
    if ($group) {
        $permission = $group->getPermission();
        if ($permission){
            echo $permission->getName();
        } else {
            echo $default;
        }
    } else {
        echo $default;
    }
} else {
    echo $default;
}
```

or it can be quite shorter in another smart way like:

```php
$default = 'some name';
if ($user and 
    $group = $user->getGroup() and 
    $permission = $group->getPermission()
) {
    echo $permission->getName();
} else {
    echo $default;
}
```

still not perfect. `adhocore/get-in` saves one from this PITA by providing handy wrapper like:

```php
echo \Ahc\Get::in($user, 'getGroup.getPermission.getName', 'some name');
```


## advantage

- prevents multi layer check
- prevents errors like "Call to a member function on a non-object"
- saves from temporary variable creation during the checks
- provides a way to have default value should it fail at any point


# the name

the name get-in is based on `igorw/get-in` which is similar thing for array manipulation, `adhocore/get-in` being for chained objects
