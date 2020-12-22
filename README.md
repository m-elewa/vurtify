# Vurtify

Vurtify is a Laravel 8 boilerplate project that gives you the features that Jetstream and Fortify came with, without dealing with the complexity of Jetstream and Tailwind. Instead, we are using Bootstrap 5 and Vue 3.

## Basic Features

- built on top of Fortify
- register system
- reset forgotten password
- update password
- update user info
- profile photo
- logout other browser sessions
- delete account
- email verification
- nice bootstrap 5 design
- configurable sass design
- separate design for the guest section and app section
- ready to work with Vue 3
- Jetstream, tailwind, and livewire got removed completely from the project
- Clean and easy to understand code
- Optional ready to use Docker environment to help with the development
- helpful Makefile commands
- And more...

## Preview

<p align="center">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20welcome.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20login.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20register.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20dashboard.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20profile-3.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20modal.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20toast-2.png" width="80%" height="auto">
</p>

## Installation

Via Composer Create-Project
```
composer create-project --prefer-dist m-elewa/vurtify:dev-master blog
```

Or clone this repository
```bash
$ git clone https://github.com/m-elewa/vurtify.git
```

Then install the required dependency.

```bash
# copy the .env.example file to .env
$ cp .env.example .env

# Generate the application key
$ php artisan key:generate

# Install the PHP dependencies
$ composer install

# Install node modules
$ npm install --legacy-peer-deps

# Compile the js and sass code
$ npm run dev

# Migrate the application
$ php artisan migrate

# Create the symbolic link
$ php artisan storage:link
```

Once everything is done, start a development server

```bash
php artisan serve
```

If using Docker run `make up` to run all Docker containers

## Great open-source projects used to help build Vurtify
* [Laravel](https://github.com/laravel/laravel)
* [Fortify](https://github.com/laravel/fortify)
* [Bootstrap](https://github.com/twbs/bootstrap)
* [NGINX](https://www.nginx.com/)
* [MySQL](https://www.mysql.com/)
* [PhpMyAdmin](https://www.phpmyadmin.net/)
* [Mailhog](https://github.com/mailhog/MailHog)
* [Portainer](https://www.portainer.io/)

## To Do
- Use Typescript
- Add more Vue components
- Add Two Factor Authentication
- Add API support
- Add Teams system

## Issues
If you come across any issues please [report them here](https://github.com/m-elewa/vurtify/issues).

## Contributing
Contributing to the Vurtify project are welcome, please feel free to make any pull requests, or email me a feature request you would like to see in the future at [mahmoud.elewa.999@gmail.com](mailto:mahmoud.elewa.999@gmail.com).

## Security Vulnerabilities
If you discover a security vulnerability within Vurtify, please send an email to [mahmoud.elewa.999@gmail.com](mailto:mahmoud.elewa.999@gmail.com), or create a pull request if possible.

## License
Vurtify is open-sourced software licensed under the [MIT license](https://github.com/m-elewa/vurtify/blob/master/LICENSE).
