[![Latest Stable Version](https://poser.okvpn.org/julio101290/boilerplatevehicles/v/stable)](https://packagist.org/packages/julio101290/boilerplatevehicles) [![Total Downloads](https://poser.okvpn.org/julio101290/boilerplatevehicles/downloads)](https://packagist.org/packages/julio101290/boilerplatevehicles) [![Latest Unstable Version](https://poser.okvpn.org/julio101290/boilerplatevehicles/v/unstable)](https://packagist.org/packages/julio101290/boilerplatevehicles) [![License](https://poser.okvpn.org/julio101290/boilerplatevehicles/license)](https://packagist.org/packages/julio101290/boilerplatevehicles)

## CodeIgniter 4 Boilerplate Drivers
CodeIgniter4 Boilerplatedrivers CRUD MVC capture drivers for invoices and Mexican Carta Porte and workshop module


## Requirements
* PhpCfdi\SatCatalogos
* julio101290/boilerplatelog
* hermawan/codeigniter4-datatables

## Installation

### Run commands
	
 	composer require phpcfdi/sat-catalogos

   	composer require hermawan/codeigniter4-datatables

    composer require julio101290/boilerplatelog

	composer require julio101290/boilerplatecompanies

  	composer require julio101290/boilerplatestorages

	composer require julio101290/boilerplatetypesmovement

 	composer require julio101290/boilerplatedrivers

  	

### Run command for migration and seeder

	php spark boilerplatecompanies:installcompaniescrud

 	php spark boilerplatelog:installlog

  	php spark boilerplatestorages:installstorages

	php spark boilerplatetypesmovement:installtypesmovement

 	php spark boilerplatevehicles:installvehicles

  	php spark boilerplatedrivers:installdrivers
	

# Make the Menu Drivers, Example
![image](https://github.com/user-attachments/assets/1deb185e-82cf-475b-bf93-4845bceb927c)


# Ready
![image](https://github.com/user-attachments/assets/fa0c4c32-0310-423d-9981-c8364978d146)


Usage
-----
You can find how it works with the read code routes, controller and views etc. Finnally... Happy Coding!

Changelog
--------
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

Contributing
------------
Contributions are very welcome.

License
-------

This package is free software distributed under the terms of the [MIT license](LICENSE.md).
