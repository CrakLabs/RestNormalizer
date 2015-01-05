
install:
	@npm install --no-bin-links ${@:2}

test:
	@node ./node_modules/mocha/bin/mocha -R spec ./js/test/*.js

cover:
	@node ./node_modules/istanbul/lib/cli.js cover ./node_modules/mocha/bin/_mocha ./js/test/*.js
	@cp -rf ./coverage/* ./js/report; rm -rf ./coverage

.PHONY: install test cover
