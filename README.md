# Vurtify

Vurtify is a Laravel 8 boilerplate project that gives you what you need to start up a web application with Fortify,  Vue 3, and Bootstrap 5.

## Basic Features

- Built on top of Fortify, Vue 3, and Bootstrap 5
- Using Vuex and Axios for state management and Make XMLHttpRequests
- Register system
- Reset forgotten password
- Update password
- Update user info
- Update profile photo
- Logout other browser sessions
- Delete account option
- Email verification
- Nice bootstrap 5 design with animations
- Configurable sass design
- Separate design for the guest section and the app section
- Jetstream, tailwind, and livewire got removed completely from the project for simplicity
- Clean and easy to understand code
- Optional ready to use Docker environment to help with the development
- Helpful Makefile commands
- And more...

## Preview

<p align="center">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20welcome.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20login.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20register.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20dashboard.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20profile-3.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20modal.png" width="80%" height="auto">
    <img src="https://raw.githubusercontent.com/m-elewa/images/main/Laravel%20-%20toast-3.png" width="80%" height="auto">
</p>

## Installation

Via Composer Create-Project
```
composer create-project --prefer-dist m-elewa/vurtify blog
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
* [Vue](https://github.com/vuejs/vue)
* [Vuex](https://github.com/vuejs/vuex)
* [Axios](https://github.com/axios/axios)
* [Fortify](https://github.com/laravel/fortify)
* [Bootstrap](https://github.com/twbs/bootstrap)
* [Vue Toastification](https://github.com/Maronato/vue-toastification)
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
