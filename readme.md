# Unterbunter Support
this was a website / school project for a bussiness idea i had with a friend of mine. it is for a company that repairs computers.
The site is made with PHP and is sadly in dutch instead of english. 

# Pages
## [index.php](https://github.com/FabianENL/UnterBunter-Support/blob/main/index.php)
Just the home page, nothing special.

## [reparaties.php](https://github.com/FabianENL/UnterBunter-Support/blob/main/reparaties.php)
The page where users can request repairs.
Every repair request has 5 stages.
If you have an admin account you can see all the requested repairs and edit the current stage of the request.

## [contact.php](https://github.com/FabianENL/UnterBunter-Support/blob/main/contact.php)
A simple chat kind of application where a user can create a new chat, send messages and the admins can respond to those messages

## [login.php](https://github.com/FabianENL/UnterBunter-Support/blob/main/login.php)
The page where users can login or register

# Database
The database i'm using is MySQL and the contents of the database can be found in [db.sql](https://github.com/FabianENL/UnterBunter-Support/blob/main/db.sql)

test accounts:
- username: `fab@fab.fab` password: `fab` type: user
- username: `admin@unterbunter.online` password: `admin` type: admin
I tried my best to prevent SQL injections and XSS attacks but if you find a vulerability please let me know  through the issues page
