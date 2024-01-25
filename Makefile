##
# Usage: $ make install
#
install: links

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
