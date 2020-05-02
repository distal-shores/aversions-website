# Aversions Website

### Project Info

- Project Laravel version is 6.17.0
- Make sure when you're reading Laravel docs that you set the version to 6.x in the upper right corner of the screen

### Setup

- Download and setup [Laravel Valet](https://laravel.com/docs/6.x/valet)
- Grab an .env file from Sam
- Run `composer install` to install all composer dependencies
- Run `npm install` to install all Javascript dependencies (you'll need to have Node installed globally)
- As long as Valet is running and you've probably `park`ed your application dir, you should be able to navigate to `aversions-website.localhost` (where 'aversions-website' is the name of your app dir) in your browser and see some output. You might get Laravel errors or otherwise if you haven't installed your database yet (see below).

### Database setup

- Download MySQL for Mac. Just use the [DMG installer](https://dev.mysql.com/doc/mysql-osx-excerpt/5.7/en/osx-installation.html)
- Follow the info in the .env file to setup a database locally. The host will be 127.0.0.1 or localhost. Your username/password will be dependent on what you setup when you installed MySQL in the previous step. I named my database 'aversions' but you can name it whatever you want.
- Run the various `php artisan migrate` commands to instantiate the database
⋅⋅* `php artisan migrate --seed` on first installation
..* `php artisan migrate:refresh --seed` if you make new migration and want a fresh copy of the DB. You will lose any test data you've created, but it will re-seed with dummy data from the seed files.
..* `php artisan list migrate` will give you a list of all available migration commands

### Versioning

- Work on new features in a branch off master (`git checkout master && git checkout -b 'new_feature_name'`)
- When your work is ready to go, submit a [pull request](https://yangsu.github.io/pull-request-tutorial/) and I'll merge into master if it looks good
- Commit new code in small chunks when it's working properly. Try and keep commits atomic i.e. related to one change at a time (I haven't been great about this myself so far but will be better now that someone else is working on the project)

### Where the important bits are

- Your `app` folder contains all of your application logic.
..* Controllers: `app/Http/Controllers`
..* Models: are in the base `app` folder i.e. `Band.php`
- Your `resources` folder contains all your front-end presentation code. Views, scripts, and styles.
..* `resources/views` contains all your view files. These are roughly organized by `views/dashboard/` which contains all the admin dashboard view files, and `views/home` which contains all the public-facing view files.
- The `database` directory contains all your database stuff. You'll probably just interact with `/migrations` and `/seeds`

### Compiling assets

- Run `npm run watch` from the root directory to compile all SCSS and Javascript files. It'll auto-update on file change, so you can leave a terminal window with this command running if you're working on front-end stuff.
- The `webpack.mix.js` file in your root directory can be used to easily chain new JS files onto compilation, if you're adding a new custom script or installing a third party dependency. You can ask me about how to do this as it can be kind of finicky. See more [here](https://laravel.com/docs/6.x/mix)

### Front end stuff

- Laravel uses the Blade templating engine. It's similar to Liquid and other html extension engines. See [here](https://laravel.com/docs/6.x/blade)
- [Bootstrap](https://getbootstrap.com/) is installed so feel free to make use of its helper classes in template building. I'll probably replace this convention at some point as I find it kind of annoying but it's useful enough for now so we don't have to write a bunch of CSS.
- If you're working on admin dashboard stuff, don't worry about mobile styling for now -- the code so far is only supposed to be presentable for desktop views.

Happy coding! 