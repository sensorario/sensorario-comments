[torna all'indice](https://github.com/sensorario/sensorario-comments/blob/master/readme.md)

## Database schema

    CREATE TABLE `sensorario_comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `thread` varchar(50) NOT NULL,
        `comment` text,
        `user` varchar(11) NOT NULL,
        PRIMARY KEY (`id`)
    );