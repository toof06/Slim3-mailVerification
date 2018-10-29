for run application : 

composer install 

npm install -g maildev @1.0.0-rc2 (because the last version have a problem) 

than run the maildev application at the server with : 
maildev -o 

run chmod and run a php server with : 
php -S localhost:8080 -t public\    you must choose the port who isn't used





if you have a problem with maildev server you schould try : maildev --ip with your ip adresse 
or you can ask me a question 



this is a simple MIT application with which you could verify your mailing setting in localhost. 