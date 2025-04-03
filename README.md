<p align="center">
    <img src="https://raw.githubusercontent.com/larastan/larastan/master/docs/logo.png" alt="Larastan Logo" width="300">
    <br><br>
    <img src="https://raw.githubusercontent.com/larastan/larastan/master/docs/example.png" alt="Larastan Example" height="300">
</p>

<p align="center">
  <a href="https://github.com/larastan/larastan/actions"><img src="https://github.com/larastan/larastan/actions/workflows/tests.yml/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/larastan/larastan/stats"><img src="https://poser.pugx.org/larastan/larastan/d/total.svg" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/larastan/larastan"><img src="https://poser.pugx.org/larastan/larastan/v/stable.svg" alt="Latest Version"></a>
  <a href="https://github.com/larastan/larastan/blob/master/LICENSE.md"><img src="https://poser.pugx.org/larastan/larastan/license.svg" alt="License"></a>
</p>

------

## ⚗️ About Larastan

Larastan was created by [Can Vural](https://github.com/canvural) and [Nuno Maduro](https://github.com/nunomaduro), got artwork designed by [@Caneco](http://github.com/caneco), is maintained by [Can Vural](https://github.com/canvural), [Nuno Maduro](https://github.com/nunomaduro) and [Viktor Szépe](https://github.com/szepeviktor), and is a [PHPStan](https://phpstan.org/) extension for Laravel. Larastan focuses on **finding errors in your code**. It catches whole classes of bugs even **before you write tests** for the code.

- Adds static typing to Laravel to improve developer productivity and **code quality**
- Supports most of [Laravel](https://laravel.com)'s **beautiful magic**
- Discovers bugs in your code

> While by definition, "static analysis" doesn't load any of your application's code. Larastan boots your application's container, so it can resolve types that are only possible to compute at runtime. That's why we use the term "code analysis" instead of "static analysis".

### Supported Laravel versions
| Laravel Version    | Larastan Version |
|--------------------|------------------|
| < 9                | 1.x              |
| \> 9.0 && >= 11.16 | 2.x              |
| 11.16+             | 3.0+             |

## Sponsors
<a href="https://blackfire.io/docs/introduction?utm_source=larastan&utm_medium=github_readme&utm_campaign=logo"><img src="assets/blackfire-logo.png" alt="Blackfire.io" width="254" height="64"></a>

## ✨ Getting Started In 3 Steps

> **Requires:**
- **[PHP 8.2+](https://php.net/releases/)**
- **[Laravel 11.15+](https://github.com/laravel/laravel)**

**1**: First, you may use [Composer](https://getcomposer.org) to install Larastan as a development dependency into your Laravel project:

```bash
composer require --dev "larastan/larastan:^3.0"
```

> Using Larastan for analysing Laravel packages? You may need to install `orchestra/testbench`.

**2**: Then, create a `phpstan.neon` or `phpstan.neon.dist` file in the root of your application. It might look like this:

```
includes:
    - vendor/larastan/larastan/extension.neon
    - vendor/nesbot/carbon/extension.neon

parameters:

    paths:
        - app/

    # Level 10 is the highest level
    level: 5

#    ignoreErrors:
#        - '#PHPDoc tag @var#'
#
#    excludePaths:
#        - ./*/*/FileToBeExcluded.php
```

For all available options, please take a look at the PHPStan documentation: **https://phpstan.org/config-reference**

**3**: Finally, you may start analyzing your code using the phpstan console command:

```bash
./vendor/bin/phpstan analyse
```

If you are getting the error `Allowed memory size exhausted`, then you can use the `--memory-limit` option fix the problem:

```bash
./vendor/bin/phpstan analyse --memory-limit=2G
```

## Ignoring errors

Ignoring a specific error can be done either with a php comment or in the configuration file: 

```php
// @phpstan-ignore-next-line
$test->badMethod();

$test->badMethod(); // @phpstan-ignore-line
```

When ignoring errors in PHPStan's configuration file, they are ignored by writing a regex based on error messages:

```yaml
parameters:
    ignoreErrors:
        - '#Call to an undefined method .*badMethod\(\)#'
```

### Baseline file

In older codebases it might be hard to spend the time fixing all the code to pass a high PHPStan Level. 

To get around this a baseline file can be generated. The baseline file will create a configuration file with all of the current errors, so new code can be written following a higher standard than the old code. ([PHPStan Docs](https://phpstan.org/user-guide/baseline))

```bash
./vendor/bin/phpstan analyse --generate-baseline
```

## Rules

A list of configurable rules specific to Laravel can be found [here](docs/rules.md).


## Features

A list of Larastan features can be found [here](docs/features.md).

## Custom PHPDoc types

A list of PHPDoc types specific to Larastan can be found [here](docs/custom-types.md).

## Custom PHPStan config parameters

A list of custom config parameters that you can use in your PHPStan config file can be found [here](docs/custom-config-parameters.md).

## Errors To Ignore

Some parts of Laravel are currently too magical for Larastan/PHPStan to understand.
We listed common [errors to ignore](docs/errors-to-ignore.md), add them as needed

## 👊🏻 Contributing

Thank you for considering contributing to Larastan. All the contribution guidelines are mentioned [here](CONTRIBUTING.md).

## 📖 License

Larastan is an open-sourced software licensed under the [MIT license](LICENSE.md).
