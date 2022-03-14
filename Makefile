all: index.php config.php 
	php -S localhost:8000&
	# xdg-open http://localhost:8000/&

stop:
	killall php