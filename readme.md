#Samsui [![Build Status](https://travis-ci.org/mauris/samsui.png?branch=master)](https://travis-ci.org/mauris/samsui)

Samsui is a factory library for building PHP objects useful for setting up test data in your applications. It is mainly inspired by [Rosie](https://github.com/bkeepers/rosie) for JavaScript and [factory_girl](https://github.com/thoughtbot/factory_girl) for Ruby.

> [Samsui women](https://en.wikipedia.org/wiki/Samsui_women) refers to a group of Chinese immigrants who came to Singapore to work in construction and industries. Their hardwork contributed to Singapore's development as a colony and young nation.

With Samsui, you can quickly build prototype application and generate as many data as you need for testing your prototype.

##Installation

Samsui is a PHP library that manages its dependencies using [Composer](http://getcomposer.org). You can directly use [Samsui](https://packagist.org/packages/mauris/samsui/) in your application through Composer as well:

    {
        "require": {
			"mauris/samsui": "1.0.*"
        }
    }

Then just run Composer:

    $ php composer.phar install

##Usage

You can provide definition of your objects to Samsui:

	use Samsui\Factory;

	$factory = new Factory();

	// define an object quickly
	$factory->define('person')
		->sequence('personId')
		->attr('firstName', 'James')
        ->attr('lastName', 'Clark')
        ->attr('email', function ($i, $o) {
            return strtolower($o->firstName . '.' . $o->lastName . '@example.com');
        })
		->attr('createdTime', function () {
			return time();
		});

You can build one at a time, or hundreds of them on the go!

	// build them on the go!
	$person = $factory->build('person');

	// or build many!~
	$people = $factory->build('person', 500);

The output of a person object would be (well, after JSON encoding):

    {
        personId: 1,
        firstName: 'James',
        lastName: 'Clark',
        email: 'james.clark@example.com',
        createdTime: 1383465074
    }

You can also use Samsui's fake data generator to fill your objects with real variety and randomity:

    use Samsui\Factory;
    use Samsui\Generator\Generator;

    $factory = new Factory();

    // define an object quickly
    $factory->define('person')
        ->sequence('personId')
        ->attr('firstName', Generator::person()->firstName)
        ->attr('lastName', Generator::person()->lastName)
        ->attr('email', function ($i, $o) {
            return Generator::email()->emailAddress(
                array(
                    'firstName' => $o->firstName,
                    'lastName' => $o->lastName,
                    'domains' => array(
                        'hotmail.com',
                        'gmail.com',
                        'example.com'
                    )
                )
            );
        })
        ->attr('createdTime', function () {
            return time();
        });

##Upcoming

- Implementation of Data Generators for use with attributes
  - Names (different locale)
  - Email addresses
  - Addresses (from different countries) and Postal Codes
  - <del>Age (based on age groups defined)</del>
  - <del>Gender (with Natural Birth Ratio)</del>
  - <del>Ip Address v4 and v6</del>
  - HTTP/HTTPS URL
  - <del>Lorem Ipsum text</del>
  - DateTimes (based on range or sequence)
  - Serial numbers (barcode standards)
  - Hash functions output (SHA-1, SHA-256 etc.)
  - <del>GPS latitude / longitude</del> and paths
  - Handphone numbers (based on country formats)
  - Random amount of money, colors
  - Images (Avatar, Sized)
- Improved JSON reader
- Generation of Factory definitions to PHP classes directly
