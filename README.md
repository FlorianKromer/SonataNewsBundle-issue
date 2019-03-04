# SonataNewsBundle-issue
Bug :
No metadata found for property `Applcation\Sonata\NewsBundle\Entity\Post::$tags`. Please make sure your Doctrine mapping is properly configured.

#### Symfony packages
```
sonata-project/admin-bundle              3.35.2 = 3.35.2 The missing Symfony Admin Generator
sonata-project/block-bundle              3.12.1 = 3.12.1 Symfony SonataBlockBundle
sonata-project/cache                     2.0.1  = 2.0.1  Cache library
sonata-project/classification-bundle     3.7.0  = 3.7.0  Symfony SonataClassificationBundle
sonata-project/core-bundle               3.9.1  = 3.9.1  Symfony SonataCoreBundle
sonata-project/datagrid-bundle           2.3.1  = 2.3.1  Symfony SonataDatagridBundle
sonata-project/doctrine-extensions       1.0.2  = 1.0.2  Doctrine2 behavioral extensions
sonata-project/doctrine-orm-admin-bundle 3.6.0  = 3.6.0  Symfony Sonata / Integrate Doctrine ORM into the SonataAdminBundle
sonata-project/easy-extends-bundle       2.5.0  = 2.5.0  Symfony SonataEasyExtendsBundle
sonata-project/exporter                  1.9.0  = 1.9.0  Lightweight Exporter library
sonata-project/formatter-bundle          3.5.0  = 3.5.0  Symfony SonataFormatterBundle
sonata-project/intl-bundle               2.4.1  = 2.4.1  Symfony SonataIntlBundle
sonata-project/media-bundle              3.13.1 = 3.13.1 Symfony SonataMediaBundle
sonata-project/news-bundle               3.4.0  = 3.4.0  Symfony SonataNewsBundle
sonata-project/user-bundle               4.2.1  = 4.2.1  Symfony SonataUserBundle
```
#### PHP version
PHP 7.1.14 

## Subject
The links between NewsBundle and Classification seems broken. Or I missed something in the bundle installation.

I have extended classification bundle (and others) with "--namespace_prefix=App"
I haven't declared all bundles in doctrine 's mapping? _It's still required?_
```
doctrine:
    orm:
        entity_managers:
             auto_mapping: true
```
 
## Steps to reproduce

- clone my repo: https://github.com/FlorianKromer/SonataNewsBundle-issue
- create a user: php bin/console fos:user:create testuser test@example.com p@ssword --super-admin
- login on the website
- go the news post list or try to create a new one



## Expected results

- access to the post list / create post

## Actual results
 this error: **No metadata found for property `App\Application\Sonata\NewsBundle\Entity\Post::$tags`. Please make sure your Doctrine mapping is properly configured.**

Hope its help 
