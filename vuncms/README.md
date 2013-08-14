install notes:
--
Create database user and update the **config\config.xml**
create vhost eg: 
`

    ServerName vulncms
    DocumentRoot "{FULLPATH}"
    <Directory "{FULLPATH}">
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
`

NOTE:
--
This small project was developed for training purposes
it gathers cheesy scripts found around on the web,
and some custom code (designed to fail).
Should NEVER be used in "production\dev".
