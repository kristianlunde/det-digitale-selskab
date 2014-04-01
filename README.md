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
git clone git@github.com:<your username>/det-digitale-selskab.git
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

### Branch the cloned repository

As you want to start developing the site, the suggested method is to create a 
feature branch in git. This tutorial was developed that way, and it'll allow you
to keep the changes in a separate state, away from the master version of the
project. It'll also allow you to easily request your updates ported into the 
original repository by issuing a pull request on github.

I've used "add-installation-instructions" as the branch name when actually
running these commands. Replace <branch-name> with your own branch name.

```
git checkout -b <branch-name>
```

Make the changes and show the world how stuff should look in 2014, before
committing the changes. To see which files have been modified, run `git commit`
without any arguments.

You can then either commit each file by itself, or do `git commit -a` to commit 
all files. Warning: The last command WILL commit the Meetup API key if you've
changed index.php, so be CAREFUL.

After committing, you'll need to push the feature branch to your github account.

```
git push -u origin <branch-name>
``` 

#### Example

```
git push -u origin add-installation-instructions
Counting objects: 5, done.
Delta compression using up to 2 threads.
Compressing objects: 100% (3/3), done.
Writing objects: 100% (3/3), 1.66 KiB | 0 bytes/s, done.
Total 3 (delta 1), reused 0 (delta 0)
To git@github.com:<your username>/det-digitale-selskab.git
 * [new branch]      add-installation-instructions -> add-installation-instructions
Branch add-installation-instructions set up to track remote branch add-installation-instructions from origin.
```

