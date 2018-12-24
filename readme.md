## Install and connect MySQL using Docker
- Run command in terminal `> docker pull mysql/mysql-server:latest` (Using `latest` version)
- `> docker run --name=mysql1 -d mysql/mysql-server:latest` (`mysql1` is name of service - container)
- `> docker logs mysql1` Check log of service
- `> docker logs mysql1 2>&1 | grep GENERATED` -> "GENERATED ROOT PASSWORD: `DEFAULT PASSWORD`"
- Login user into MySQL `> docker exec -it mysql1 mysql -uroot -p` with `DEFAULT PASSWORD`
- Reset to your password: `> ALTER USER 'root'@'localhost' IDENTIFIED BY 'password';`
- Create database: `> CREATE DATABASE mydatabase CHARACTER SET utf8 COLLATE utf8_general_ci;`
- Get IP Address of database's host: `> docker inspect mysql1`
- Fill your database information to `.env` file
- Run `> php artisan migrate` to generate database
##### If it has error:
> SQLSTATE[HY000] [1130] Host 'xxx.xxx.xxx.xxx' is not allowed to connect to this MySQL server
###### Create new user with host '%':
- `> mysql> CREATE USER 'your_root_username'@'%' IDENTIFIED BY 'password';`
- `> grant all on *.* to 'your_root_username'@'%';`
- Check user with host: `> SELECT host, user FROM mysql.user;`
- Run `> php artisan migrate` again