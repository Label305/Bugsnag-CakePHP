Bugsnag for CakePHP
=======


Quick Start
---------

Include with composer

```json
"require": {
  "label305/bugsnag-cakephp": "0.1.*"
}
```

```json
"extra": {
  "installer-paths": {
    "core/Plugin/{$name}/": ["label305/bugsnag-cakephp"]
  }
}
```

```php
//in app/Config/core.php
Configure::write('Error.handler', 'AppError::handleError');
```

```php
//in app/Config/bootstrap.php
App::uses('BugsnagError', 'Plugin/BugsnagCakephp/Lib');
```