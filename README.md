# Simple symfony project with DDD, CQRS, ES and ELK-stack

This is my example of implementation  CQRS, DDD with event sourcing.  
As the main database is used PostgreSQL.
Events are recorded in elasticsearch with used rabbitMQ.

##Stack
* PHP 7.4
* PostgreSQL 12.9
* Elastic, Kibana, Logstash 7.15
* RabbitMQ 3.9.7
* Symfony components

##Project init

####Db is connected locally, not in docker.
####Run ELK and RabbitMQ:
`docker-compose up -d`
 #####Wait 1 minutes.
####Start (if you need) RabbitMQ management UI (login: guest; password: guest):
`symfony open:local:rabbitmq`

####Start consumer:

`symfony console messenger:consume -vv`

####Go to [http://localhost:5601/]() for open:
