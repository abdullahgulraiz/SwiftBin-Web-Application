# SwiftBin

## About

SwiftBin is a project that promotes efficient garbage collection operations by usage of smart garbage bins. The amount of garbage in bins in a certain locality are monitored in real time, and relevant personnel notified when garbage bins are full.

## How does it work?

Each garbage bin has sensors to detect the level of garbage they contain. These levels are sent on timely basis through GSM to a web-application that shows the trend of garbage levels with respect to time. Certain thresholds determine whether garbage collection in a certain locality should begin.
The trends can be viewed by users of different roles. An Administrator can see all garbage bins, Local Authorities can see bins of their vicinity, and a User bin outside his/her home.

## Files

Uploaded is the web application for the project. It has been coded in PHP Laravel Framework (v5.4), and can be downloaded and checked for educational purposes. The website is just a working demo of what the final application will look like.

### System Requirements
The website was built and tested on a PC running Windows 10 (x64) with 8GB RAM. Additional requirements include:
- [WAMP Server](http://www.wampserver.com/en/) for PHP/MySQL requirements
- [Composer](https://getcomposer.org/download/) (for Laravel)

For a full list of requirements, check [Laravel Installation](https://laravel.com/docs/5.4/installation)

## Usage
The website comes without any warranty as is. Serve the project through PHP Artisan ([deploying Laravel application]()). Head over to _index.php_ to see a list of available bins at different locations. Clicking on a bin shows its trends. Data can be fed manually or through GSM by sending required variables to:

```
localhost/bins/input/[GSM Number]-[Weight]-[IR]
```

## People

- * **[Dr. Khurram Kamal](mailto:k.kamal@ceme.nust.edu.pk)** - *Project Supervisor*
- * **[Abdullah Gulraiz](mailto:abdullahgulraiz@outlook.com)** - *Web Developer*