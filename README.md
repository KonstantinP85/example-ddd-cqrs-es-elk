# Simple symfony project with DDD, CQRS, ES and ELK-stack

This is my example of implementation  CQRS, DDD with event sourcing.  
As the main database is used PostgreSQL.
Events are recorded in elasticsearch with used rabbitMQ.

## Stack
* PHP 7.4
* PostgreSQL 12.9
* Elastic, Kibana, Logstash 7.15
* RabbitMQ 3.9.7
* Symfony components

## Project init

#### Db is connected locally, not in docker.
#### Run ELK and RabbitMQ:
`docker-compose up -d`
 ##### Wait 1 minutes.
#### Start (if you need) RabbitMQ management UI (login: guest; password: guest):
`symfony open:local:rabbitmq`

#### Consume messege:

`symfony console messenger:consume -vv`

#### Go to [http://localhost:5601/]() for open:

![112233](https://user-images.githubusercontent.com/74908254/149647340-8d50ec1b-dd6a-4a7a-969d-ad696fc90a12.png)
