## About 

This application let visitors input their personal for registration and recieve welcome email after successful signup also, features like view users, view a user personal information and upload photo. 

This application sends emails to user without photo every week no mondays by 12pm to notify the for completion of their profile by uploading their various photo:


## How To Get started

FRONTEND
Run 'npm run build' for production from the frontend side then the 'dist folder' shall be deployed to visulize the UI.

BACKEND
Setting up backend for production requires some configuration in the .env file
like database setup with the config settings from your hosting provider
like this: 
DB_CONNECTION="mysql"
DB_HOST="your database host provided"
DB_PORT="your port"
DB_DATABASE="your database name"
DB_USERNAME="your username"
DB_PASSWORD="your password"

inside the public folder there is a file called 'index.php'
the register autoload file should be congigured like: 
require __DIR__.'/yourappname/vendor/autoload.php';

setup bootstrap like:
$app = require_once __DIR__.'/yourappname/bootstrap/app.php';

## Sending Emails

After the Smtp configuration in the .env file, a cron job one setup on the server should be done to make the scheduler work as programmed.
