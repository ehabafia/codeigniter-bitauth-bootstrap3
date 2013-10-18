#BitAuth

##Requirements
* PHP 5.4.12, 5.4+ recommended
* CodeIgniter 2.1.4+
* MySQL
* ~~php-gmp~~

##Features
* Phpass Integration: BitAuth uses [phpass](http://www.openwall.com/phpass/) to handle password hashing
* Password complexity rules: Along with minimum and maximum length, specify the required number of:
	* Uppercase Characters
	* Numbers
	* Special Characters
	* Spaces
	* ... Or, add your own
* Password aging: Require your users to change their passwords at a set interval
* Completely custom userdata: Easily customize BitAuth to include any custom you want. Full name, Nickname, Phone number, Favorite color... You name it!
* Groups and Roles: Create groups, and assign users to your groups. Your roles are set on a group, not a user, so changing roles, whether the scale is large or small, is fast and painless.
* Text-based roles: Simply list your roles in the configuration file, then check against them in your code. BitAuth handles everything in between.

##Download
[https://github.com/danmontgomery/codeigniter-bitauth/tarball/v0.2.1](https://github.com/danmontgomery/codeigniter-bitauth/tarball/v0.2.1)

##Installation
Copy the included files to their appropriate locations in the application/ folder. Import bitauth.sql into your database. **If you would like to change the names of the tables BitAuth uses, you can change them in this .sql file, and must also change them in config/bitauth.php**.

The default login is **admin**/**admin**.

I **highly** recommend you not use the default cookie session... [Try my driver replacement](http://getsparks.org/packages/session-driver/show) for CI's session library (end of shameless self promotion).

Currently, only MySQL is supported. This may change in the future. Or not. We'll see.

**I also added Bootstrap3 and some AJAX function to Active or Disable the User from Admin.
Also delete the user is through AJAX.

There is some modification to CodeIgniter to make it more DRYS.

CAUTION: 
Using this repo is totally under your responsiblity and you will take it at your own risk.**

Thank you,