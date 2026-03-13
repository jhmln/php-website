# Project setup
1. Install XAMPP.
2. Open the Apache `httpd.conf`.
3. Set the `DocumentRoot` to `/php-website/src/public`.
4. Add the same path as a `Directory`:
   ```apache
   <Directory "/php-website/src/public">    
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
   </Directory>
   ```
