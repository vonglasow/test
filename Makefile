all: vendor
	@./vendor/bin/phpunit -c phpunit.xml phpunit
	@./vendor/bin/atoum -d atoum

vendor: composer.phar
	@./composer.phar install

composer.phar:
	@curl -sS https://getcomposer.org/installer | php > /dev/null 2>&1;

clean:
	@rm -rf vendor composer.phar tmp
