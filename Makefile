all: vendor
	./vendor/bin/phpunit -c phpunit.xml phpunit
	./vendor/bin/atoum -d atoum

vendor: composer
	./composer.phar install

composer:
	@curl -sS https://getcomposer.org/installer | php > /dev/null 2>&1;

