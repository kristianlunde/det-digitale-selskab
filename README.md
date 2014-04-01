det-digitale-selskab
====================

The raw web site of Det Digitale Selskab, a meetup group for people in the
computing industry in south east Norway.

Requirements: An httpd, PHP5 and composer.

## Setup Instructions

To make your own version of this website, hit the "fork" button up in the 
right corner.

### git clone

After Github creates your own version of the repository, git clone it:

```bash
git clone https://github.com/<your user name>/det-digitale-selskab
```
    
### composer install --no-dev -o

Install the project dependencies by running composer in the directory of the
cloned version of your own project.

```bash
composer install --no-dev -o
```

If you need to install composer, see [Installation of composer](https://getcomposer.org/doc/00-intro.md#installation-nix)

### Configure Your HTTPD

We'll use Apache 2.4 for the example, but as long as you're able to set up a 
virtualhost in your httpd of choice, you should be good to go. We also assume
that you're using Ubuntu or another debian based distribution, as the file
paths will change depending on your distribution of choice.

Add a host to serve your local content by adding a line to `/etc/hosts`:

```
127.0.0.1       dds.localhost
```

Add a file describing your new virtualhost in `/etc/apache2/sites-available`,
preferrably as a file named `dds.localhost.conf`:

```
<VirtualHost *>
        ServerName dds.localhost
        DocumentRoot /path/to/det-digitale-selskab/public

        ErrorLog /var/log/apache2/dds.localhost_error.log
        CustomLog /var/log/apache2/dds.localhost_access.log combined
</VirtualHost>
```

Enable the virtual host in the Apache2 by running `sudo a2ensite dds.localhost`,
and make apache2 read it configuration files again by running `sudo service apache2 reload`.

You should now be able to open `http://dds.localhost/` in your browser and 
hopefully see an error message from guzzle as the application has not been
configured yet.

### Retrieve a set up your Meetup API Key

Go to the [Meetup API Page](https://secure.meetup.com/meetup_api/key/) to retrieve
your very own, private API key. This key should not be shared or committed in any
code, as it will allow any user that has the key to make requests on behalf
of your own account. You can reset the key on the same page if you happen to do
just that..

Currently you'll have to edit `public/index.php` to set up your Meetup key in the
application (we'll probably change this in the future, so watch for updates on
the repository).

Find the line `define()`-ing the key, and add your own key.

```
define('MEETUP_KEY', 'xxxx...................');
```

Reload the page in your webbrowser, and if everything went according to plan,
you should see a complete rendered version of information from our Meetup page!

.. then it's time get those mockups and bleeding edge designs going!


