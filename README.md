<p align="center"><a href="https://parabol.truncgil.com" target="_blank"><img src="https://app.parabol.truncgil.com/public/img/parabol.svg" width="400"></a></p>

<p align="center">
  <a href="https://editor.truncgil.com">Online Demo</a>
</p>


Parabol is a free, open source and online accounting software designed for small businesses and freelancers. It is built with modern technologies such as Laravel, VueJS, Bootstrap 4, RESTful API etc. Thanks to its modular structure, Parabol provides an awesome App Store for users and developers.

* [Home](https://parabol.truncgil.com) - The house of Parabol
* [Forum](https://parabol.truncgil.com/forum) - Ask for support
* [Documentation](https://parabol.truncgil.com/docs) - Learn how to use
* [Developer Portal](https://developer.parabol.com) - Generate passive income
* [App Store](https://parabol.truncgil.com/apps) - Extend your Parabol
* [Translations](https://crowdin.com/project/parabol) - Help us translate Parabol

## Requirements

* PHP 7.3 or higher
* Database (eg: MySQL, PostgreSQL, SQLite)
* Web Server (eg: Apache, Nginx, IIS)

## Framework

Parabol uses [Laravel](http://laravel.com), the best existing PHP framework, as the foundation framework and

## Installation

* Install [Composer](https://getcomposer.org/download) and [Npm](https://nodejs.org/en/download)
* Clone the repository: `git clone https://github.com/truncgil/parabol.git`
* Install dependencies: `composer install ; npm install ; npm run dev`
* Install Parabol:

```bash
php artisan install --db-name="parabol" --db-username="root" --db-password="pass" --admin-email="admin@company.com" --admin-password="123456"
```

* Create sample data (optional): `php artisan sample-data:seed`

## Contributing

Please, be very clear on your commit messages and pull requests, empty pull request messages may be rejected without reason.

When contributing code to Parabol, you must follow the PSR coding standards. The golden rule is: Imitate the existing Parabol code.

Please note that this project is released with a [Contributor Code of Conduct](https://parabol.truncgil.com/conduct). By participating in this project you agree to abide by its terms.

## Translation

If you'd like to contribute translations, please check out our [Crowdin](https://crowdin.com/project/parabol) project.

## Changelog

Please see [Releases](../../releases) for more information what has changed recently.

## Security

If you discover any security related issues, please email security@parabol.com instead of using the issue tracker.

## Credits

* [Denis Duliçi](https://github.com/denisdulici)
* [Cüneyt Şentürk](https://github.com/cuneytsenturk)
* [All Contributors](../../contributors)

## Partners

Each of our partners can help you craft a beautiful, well-architected project. Feel free to get in [contact](https://parabol.truncgil.com/contact) with us to become a partner.

* [Creative Tim](https://www.creative-tim.com) is our design partner since Parabol 2.0 version. They create beautiful UI Kits, Templates, and Dashboards built on top of Bootstrap, Vue.js, React, Angular, Node.js, and Laravel.

## Sponsors

Support Parabol by becoming a sponsor on [Patreon](https://www.patreon.com/parabol). Your logo will show up here with a link to your website.

## License

Parabol is released under the [GPLv3 license](LICENSE.txt).
