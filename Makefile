##
# Usage: $ make install
#
NVM := n --offline exec auto

install: links frontend.install frontend.build

links:
	@echo "-------------------------------------------"
	@echo "  Make links to shared directories"
	@echo "-------------------------------------------"

	[ -L logs ]          || /usr/bin/env ln -s /home/deploy/_shared/novikombank/main/logs        logs
	[ -L include ]       || /usr/bin/env ln -s /home/deploy/_shared/novikombank/main/include     include
	[ -L sitemap ]       || /usr/bin/env ln -s /home/deploy/_shared/novikombank/main/sitemap     sitemap
	[ -L tmp ]           || /usr/bin/env ln -s /home/deploy/_shared/novikombank/main/tmp         tmp
	[ -L upload ]        || /usr/bin/env ln -s /home/deploy/_shared/novikombank/main/upload      upload
	( [ -L bitrix ]      || /usr/bin/env ln -s /home/deploy/_shared/novikombank/main/bitrix      bitrix ) || /bin/true

frontend.install:
	@echo "-------------------------------------------"
	@echo "  Install frontend dependencies"
	@echo "-------------------------------------------"

	$(NVM) npm install --no-progress --legacy-peer-deps --prefix ./frontend

frontend.build:
	@echo "-------------------------------------------"
	@echo "  Build frontend (prod)"
	@echo "-------------------------------------------"

	$(NVM) npm run build --prefix ./frontend
