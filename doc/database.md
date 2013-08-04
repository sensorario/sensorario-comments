[torna all'indice](https://github.com/sensorario/sensorario-comments/blob/master/readme.md)

## Database schema

Up to version **2.2** comments were not tied to specifics date and time and was not possible to obtain the perception of when they were written.

    CREATE TABLE `sensorario_comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `thread` varchar(50) NOT NULL,
        `comment` text,
        `user` varchar(11) NOT NULL,
        PRIMARY KEY (`id`)
    );

----

Starting from version **2.3** this is new schema that allow users to see date and time of comments.

    CREATE TABLE `sensorario_comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `thread` varchar(50) NOT NULL,
        `comment` text,
        `user` varchar(11) NOT NULL,
        `datetime` datetime NOT NULL,
        PRIMARY KEY (`id`)
    );
