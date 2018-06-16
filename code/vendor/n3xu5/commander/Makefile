APP_NAME=stock

# Execute the unit tests through a testing Docker container
.PHONY: test
test: 
	docker run --rm -w /var/www -v "$(shell pwd)":/var/www n3xu5/php72-cli-test-build ./vendor/bin/phpunit -c ./tests/unit/phpunit.xml tests/unit/

# Code Sniffer detects violations of the PSR2 standards
.PHONY: cs
cs:
	./vendor/bin/phpcs --standard=PSR2 src/ 

# Fix the PSR2 violations detected by PHP Code Sniffer
.PHONY: fix-cs
fix-cs:
	./vendor/bin/phpcbf --standard=PSR2 src/
