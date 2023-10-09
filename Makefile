start:
	docker-compose up -d

console:
	docker exec -it ewa_lab_php_apache bash

stop:
	docker-compose down

build:
	docker-compose down -v
	docker-compose build
	docker-compose up -d --force-recreate mariadb
	docker-compose up -d

clean:
	docker rm -v --force ewa_lab_php_apache
	docker rm -v --force ewa_lab_mariadb
	docker rm -v --force ewa_lab_phpmyadmin
	docker network rm ewa_lab_net
	
cleanall:
	docker system prune -a