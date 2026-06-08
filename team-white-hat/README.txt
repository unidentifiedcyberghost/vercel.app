TEAM WHITE HAT — Deployment notes

1. Place the project on a server with PHP 7.4+ and OpenSSL enabled.
2. Move keys/secret.key.php outside the webroot if possible. If not, protect with .htaccess and server ACLs.
3. Ensure storage/ is writable by the web server user:
   chown www-data:www-data storage
   chmod 750 storage
4. Serve over HTTPS.
5. Change ADMIN_PASS in admin.php to a strong password or implement stronger auth.
6. To create a ZIP manually:
   cd ..
   zip -r team-white-hat.zip team-white-hat/
