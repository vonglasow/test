all:
	./vendor/bin/phpunit -c phpunit.xml phpunit
	./vendor/bin/atoum -d atoum
