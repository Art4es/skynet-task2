Необходимо настроить веб сервер чтобы он перенаправлял все запросы на index.php  
Пример для apache2:
```SHELL
<Directory /var/www/path/to/project>
  Options Indexes FollowSymlinks
  AllowOverride All
  Require all granted
    <IfModule mod_rewrite.c>
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule . index.php [L]
  </IfModule>
</Directory>
```
