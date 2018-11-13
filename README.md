DentSoft
=======

This is an application that allows the dentist to manage his dental office, patients and clinical reports.

This project was generated with:

| Name |  Version |
| -------- | -------- |
| 🐘 PHP | 7.2 |
| 💎Eloquent |  5.7|
| 📦 Composer |Latest |
|🐬 MySQL| 8.0.13 |
|📡Apache| 2.4.35 |

## Install

If you want to emulate this project in your computer, you need some tools and follow the next steps:

### Downloading the project and its dependencies


1) Install [Laragon](https://laragon.org/), this is a local development enviroment that you can use with web server software.
2) Search this direction `C:\laragon\www` and dowloand this repository (Remember you need to have [Git](https://git-scm.com/) in your computer), write this command in your terminal:

```shell
git clone https://github.com/alelles16/dentsoft-back.git
```
3) Jump into the folder doing `cd DentSoft` and install the dependencies doing `php composer.phar install` in the terminal. In order to do this, you will need to have [composer](https://getcomposer.org/) in your project. This will install all the dependencies and thrid party plugins that we use for this project, as eloquent and the router module.

### Importing the database

⚠ By default, Laragon have MySQL 5.7, but we need the version 8.0. To install MySQL version 8.0, we will need:
1. Download MySQL version 8.0 from [here](https://cdn.mysql.com//Downloads/MySQL-8.0/mysql-8.0.13-winx64.zip).
2. Go to the folder in `C:\laragon\bin\mysql`.
3. Paste and extract the file you just downloaded.
4. Go to `Laragon > Right Click > MySQL > Version` and choose `mysql-8.0.13-winx64`.

Now, you have to create a new database for the project, you can do this opening `Laragon > Right click > MySql > Create a new database`. For the last, import the .sql file to the database. You can do this using HeidySQL in Laragon.

### Setting database

To set the database and other settings you just have to edit the `.env` file with you database connection.

🚨 This is an enviroment file hosting all your sensible data such as database host, user and password. Wit this is easier to migrate to another computer the project, and is friendly to use.

✅ LICENSE MIT.