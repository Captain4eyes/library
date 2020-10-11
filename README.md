# Library
Test project, implementation of MVC pattern. 

## Requirements
- php (7 or higher)
- MySQL (5.7 or higher)

## Installation
1. Clone project into the directory of your web server.
2. Configure database connection in `/config/DbConfig.php`
3. Make sure your web server configuration is correct!\
All requests must be redirected to entrypoint - `index.php`.
4. Import test dump - `library.sql` into your database.\
For example, use the terminal command below:
```bash
mysql -u %user% -p %database% < library.sql 
```
5. Done! Test application in the browser.