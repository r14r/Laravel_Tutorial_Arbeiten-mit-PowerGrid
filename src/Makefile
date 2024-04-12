default:
	cat Makefile

parse:
	./eyetv2json.py --out data.json

import:
	./import_json_to_sqlite.py  --sqlite app/database/database.sqlite  --json data.json --drop


update: parse import
	echo Database updated	

deploy:
	scp app/database/database.sqlite ubuntu:/Users/Shared/CLOUD/Products.FromMe/EyeTVSearch/app/database/database.sqlite

deploy-app:
	scp -r app ubuntu:/Users/Shared/CLOUD/Products.FromMe/EyeTVSearch

serve:
	cd app
	php artisan serve
