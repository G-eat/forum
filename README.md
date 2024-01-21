# Laravel forum

## Project Setup

### Requirements

- PHP - version used 8.1
- Composer -version used 2.6.6

### Tech Used: 

- Laravel - version used 10
- MYSQL
- Livewire
- TailwindCSS

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/G-eat/forum.git

2. Cd to project:
    ```bash
    cd forum

3. Install PHP dependencies using Composer:
    ```bash
    composer install

4. Set up your environment variables:
    Create a copy of the .env.example file and name it .env
    ```bash
    cp .env.example .env

    Configure your database and mail keys in the .env file
    For testing here are keys of new gmail account => email and appPasswordKey(mwsafynqzqzhkugd)
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=forum.cp.reddit@gmail.com
    MAIL_PASSWORD=mwsafynqzqzhkugd
    MAIL_ENCRYPTION=ssl
    
5. Generate an application key:
    ```bash
    php artisan key:generate

6. Run migrations and seed
    ```bash
    php artisan migrate --seed

    It will create:
    20 users with verified email -> verified1@gmail.com to verified20@gmail.com with password "password"
    10 users with unverified email -> unverified1@gmail.com to unverified10@gmail.com with password "password"
    200 posts that belongs to random users with verified emails
    600 comments that belongs to posts and to random users with verified emails

7. Npm
    ```bash
    npm install
    npm run build

8. Start the Laravel development server:
    ```bash
    php artisan serve

9. Daily cron job 'DeleteInactivePosts' command which 'delete all posts that have not received a comment for a year'
    ```bash
    php artisan schedule:work

Access the application in your browser at http://127.0.0.1:8000.
