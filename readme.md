# Index

 - [Database schema](https://github.com/sensorario/sensorariocomments#database-schema)
 - [How to contribute](https://github.com/sensorario/sensorariocomments/tree/master/doc/collaborate.md)
 - [Tricks](https://github.com/sensorario/sensorariocomments/tree/master/doc/tricks.md)
 - [Install from github](https://github.com/sensorario/sensorariocomments/tree/master/doc/github.md)
 - [Usage](https://github.com/sensorario/sensorariocomments/tree/master/doc/usage.md)
 - [Config file](https://github.com/sensorario/sensorariocomments/tree/master/doc/config.md)

## Database schema

    CREATE TABLE `sensorario_comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `thread` varchar(50) NOT NULL,
        `comment` text,
        `user` varchar(11) NOT NULL,
        PRIMARY KEY (`id`)
    );
