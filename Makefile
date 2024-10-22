##
# Usage: $ make install
#
NVM := n --offline exec auto
CURRENT_DIR := $(shell pwd)

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

	@echo "-------------------------------------------"
	@echo "  Make links to shared directories in s1"
	@echo "-------------------------------------------"

	[ -L s1/upload ]     || /usr/bin/env ln -s "$(CURRENT_DIR)/upload"		s1/upload
	[ -L s1/bitrix ]     || /usr/bin/env ln -s "$(CURRENT_DIR)/bitrix"		s1/bitrix
	[ -L s1/frontend ]   || /usr/bin/env ln -s "$(CURRENT_DIR)/frontend"	s1/frontend
	[ -L s1/local ]      || /usr/bin/env ln -s "$(CURRENT_DIR)/local"       s1/local

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
