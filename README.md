LaraBase
========

> LaraBase is a starter app for speeding up the development of Laravel projects. Most SaaS apps require user authentication, email activation, feedback form, dashboard, user profiles, setting, blog etc. With basic knowledge of Laravel's conventions, LaraBase can be adapted and customized to your needs. The frontend is built with Bootstrap 3.3 and this codebase includes the JeffreyWay/Laravel-4-Generators package as a dev-dependency.

### [Live Demo](http://larabase.turizon.co.in/)

**Demo Admin account** - Email: `admin@gmail.com` Password: `password`

## Features
* Authentication: Login with email or username, Registration, Account Activation via email, Resend Activation code, Password Reset Logout
* Authorization: Roles & Permissions based access control
* Dashboard: Stats & Graphs for authenticated users and the admin
* Public pages: Home, About, FAQ's, Feedback Form, Privacy Policy, TOS
* Blog: Users can create and manage Posts
* Profile: 
    * Users have a Public and Private profile
    * Users can upload Profile avatar
* Settings: 
    * Users can change their password
    * Users can set their Timezone 
    * Users can delete their account and Admins can restore them
* Admin section: Users, Posts, Tags, Categories, Roles, Permissions
* Contact/Feedback form submissions are saved in DB and emailed to the Admin
* Throttle: User activity is logged to a separate DB table
    * Track last login time, IP address, failed login attempts etc.
    * Suspend an account after a specified number of failed login attempts. Suspended accounts are unlocked after a specified time period.
    * Admins can Ban the user for an indefinite amount of time
* Users Directory: List of all users with links to their public profiles
* Responsive HTML email templates
* Custom Error page
* Maintenance mode page with Countdown timer

## Installation and Setup

### Step 1 - Get LaraBase

* **Option 1**: [Download LaraBase](https://github.com/chiraggude/larabase/archive/master.zip) and unzip it (remember to rename the folder to larabase)
* **Option 2**: git clone `git clone https://github.com/chiraggude/larabase.git larabase`

### Step 2: Use Composer to install dependencies: 
```
cd larabase
composer install
```
### Step 3: Configure Settings

By default, LaraBase's environment is set to `local`, so all configurations in `/app/config/local/` will take precedence over configurations in `/app/config/`.

* Copy **app.php**, **database.php**, **mail.php** and **larabase.php** from `/app/config/` to `/app/config/local`
* Configure App settings in `/app/config/local/app.php`. Add your app encryption `key` and set `debug` to `true`
* Create a new database on your machine and change the appropriate settings in `/app/config/local/database.php`
* Configure your mail settings in `/app/config/local/mail.php`
* Configure your LaraBase specific settings in `/app/config/local/larabase.php`
* [Read this guide if your planning to deploy an app built on LaraBase to production](https://github.com/chiraggude/larabase/wiki/Deployment-on-a-VPS#env-file)

### Step 4: Database Migrations and Seeding

* Setup migrations table in DB: `php artisan migrate`
* Change details of Admin account and assigned Roles in `/app/database/seeds/UsersTableSeeder.php`
* Check in-built Roles in `/app/database/seeds/RolesTableSeeder.php`. Modify them as required.
* Check in-built Permissions in `/app/database/seeds/PermissionsTableSeeder.php`. Modify them as required.
* Check permissions assigned to the in-built Roles in `/app/database/seeds/PermissionRoleTableSeeder.php`
* Seed the database: `php artisan db:seed`

### Step 5: Setup extra Dev Tools (optional)

Add the following line to the list of Service Providers in `/app/config/local/app.php`
```
// Larabase
'Way\Generators\GeneratorsServiceProvider',
```

### Step 6: Start using LaraBase

* LaraBase: [http://localhost/larabase/public](http://localhost/larabase/public) `(Depends on your local web server config)`
* Admin Account - Email: `admin@gmail.com`   Password: `password`

## Upcoming Features

* Social Login - Login via FaceBook, Twitter, LinkedIn, Google, Microsoft, GitHub

## Pending

* Upgrade to Laravel 5
* Assets via Elixr, Bower
* Code refactoring (reduce yuckiness)
* Write tests (reduce guilt)
* Document custom helper functions in wiki

## Requirements

* PHP >= 5.4.0
* MCrypt PHP Extension
* Composer

### Extended Documentation: [LaraBase Wiki](https://github.com/chiraggude/larabase/wiki)

##### Extra Resources
* [Mailchimp Email Blueprints](https://github.com/mailchimp/Email-Blueprints)
* [Timezones List](https://github.com/tamaspap/timezones)
