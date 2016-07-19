# League\Flysystem for Legacy PHP

Slowly upgrading a legacy site? This is a fork which I refactored to use PHP5.3. Upgrade your site though!
Instructions are the same but use array() and not []

Flysystem is a filesystem abstraction which allows you to easily swap out a local filesystem for a remote one.

# Goals

* Have a generic API for handling common tasks across multiple file storage engines.
* Have consistent output which you can rely on.
* Integrate well with other packages/frameworks.
* Be cacheable.
* Emulate directories in systems that support none, like AwsS3.
* Support third party plugins.
* Make it easy to test your filesystem interactions.
* Support streams for big file handling.

# Installation

Through Composer, obviously:

```
composer require delboy1978uk/flysystem
```

You can also use Flysystem without using Composer by registering an autoloader function:

```php
spl_autoload_register(function($class) {
    $prefix = 'League\\Flysystem\\';

    if ( ! substr($class, 0, 17) === $prefix) {
        return;
    }

    $class = substr($class, strlen($prefix));
    $location = __DIR__ . 'path/to/flysystem/src/' . str_replace('\\', '/', $class) . '.php';

    if (is_file($location)) {
        require_once($location);
    }
});
```

## Integrations

Want to get started quickly? Check out some of these integrations:

* Laravel integration: https://github.com/GrahamCampbell/Laravel-Flysystem
* Symfony integration: https://github.com/1up-lab/OneupFlysystemBundle
* Zend Framework integration: https://github.com/bushbaby/BsbFlysystem
* CakePHP integration: https://github.com/WyriHaximus/FlyPie
* Silex integration: https://github.com/WyriHaximus/SliFly
* Cilex integration: https://github.com/WyriHaximus/cli-fly
* Yii 2 integration: https://github.com/creocoder/yii2-flysystem
* Backup manager: https://github.com/heybigname/backup-manager
* Drupal: https://www.drupal.org/project/flysystem
* elFinder: https://github.com/barryvdh/elfinder-flysystem-driver

## Adapters

* Local
* Amazon Web Services - S3 V2: https://github.com/thephpleague/flysystem-aws-s3-v2
* Amazon Web Services - S3 V3: https://github.com/thephpleague/flysystem-aws-s3-v3
* Rackspace Cloud Files: https://github.com/thephpleague/flysystem-rackspace
* Dropbox: https://github.com/thephpleague/flysystem-dropbox
* OneDrive: https://github.com/jacekbarecki/flysystem-onedrive
* Ftp
* Sftp (through phpseclib): https://github.com/thephpleague/flysystem-sftp
* Zip (through ZipArchive): https://github.com/thephpleague/flysystem-ziparchive
* WebDAV (through SabreDAV): https://github.com/thephpleague/flysystem-webdav
* PHPCR: https://github.com/thephpleague/flysystem-phpcr
* Azure Blob Storage
* NullAdapter
* Redis (through Predis): https://github.com/danhunsaker/flysystem-redis
* Fallback: https://github.com/Litipk/flysystem-fallback-adapter
* Memory: https://github.com/thephpleague/flysystem-memory
* Google Cloud Storage: https://github.com/Superbalist/flysystem-google-storage
* SinaAppEngine Storage: https://github.com/litp/flysystem-sae-storage
* Gaufrette: https://github.com/jenkoian/flysystem-gaufrette

## Caching

* Memory (array caching)
* Redis (through Predis)
* Memcached
* Adapter
* Stash

## Documentation

[Check out the documentation](http://flysystem.thephpleague.com/)

## Security

If you discover any security related issues, please email frenky@frenky.net instead of using the issue tracker.


# Enjoy

Oh and if you've come down this far, you might as well follow me on [twitter](http://twitter.com/frankdejonge).
