# MDetection
------------------------
Redirect users to mobile-friendly site on mobile devices. Also provide a way for mobile users to go back to the original PC site from mobile site.


## Usage
On PC site, include this script in top page's `<head>` will redirect users on mobile device to a sub folder called `m` when visiting the URL http://example.com/.
`http://example.com/` will be redirected to `http://example.com/m`



## Version 2.0.1
### Features
    - Supports what version 1.0.0 does, purely in JavaScript. No PHP is required.
    - Supports hashed URL, for single page application like AngularJS, Backbone, etc. modern framework.

### Requirement
    - JavaScript

### Usage
```html
<head>
    <script type="text/javascript" src="/path/to/mdetection.js"></script>
    <script>
        new MDetection('path/to/redirect').exec();
    </script>
</head>
```



## Version 1.0.1
### Features
    - Supports no redirection with origin URL.
    - Cookie remembers user settings.
    - Redirect back and forth to mobile / PC site.
    - Single inclusion
### Requirement
    - PHP
    - JavaScript
### Usage
```html
<head>
    <script type="text/javascript" src="/path/to/mdetection.js.php?moburl=m"></script>
</head>
```


On mobile site, to allow users go back to the PC site. Create a anchor link to the page you would like to redirect on your mobile page.
The following example will redirect user back to the top page. Even when they access http://example.com/, they will not be redirected to mobile-friendly page.
```
<a href="http://example.com/?nomobile=true">Back to our regular site!</a>
```


To let users back again to the mobile version after they change the mind from going to regular site, create another anchor link on your regular site.
```
<a href="http://example.com/?nomobile=false">Back to our mobile friendly site!</a>
```


## Bug Reporting
https://github.com/awsp/mdetection/issues



## License
MIT
