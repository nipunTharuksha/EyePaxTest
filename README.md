
# eyepax php test- Nipun Tharuksha (nipunth7@gmail.com)



## Run Locally

Clone the project

```bash
  git clone git@github.com:nipunTharuksha/EyePaxTest.git (if you need permissions please let me know)
  or download the folder from provided sharepoint
```

Go to the project directory

```bash
  cd php_NipunTharuksha
```

Checkout to branch

```bash
  git checkout master (if you are not in master)
```

Install dependencies

```bash
  composer install
  npm install
```
Create .env and update db related variabled

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eyepax_test
DB_USERNAME=root
DB_PASSWORD=
```

Initialize the project (Below command will execute all required commands as a sequence)

```bash
  php artisan initialize:project
```

Start the server

```bash
  npm run dev
  php artisan serve
```


## Demo

https://www.awesomescreenshot.com/video/12045189?key=8dd830abc5444b820fbf93cabab1ae82

