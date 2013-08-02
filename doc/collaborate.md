[torna all'indice](https://github.com/sensorario/sensorario-comments/blob/master/readme.md)

# How to contribute for sensorario-comments

Hi all, for this project I've added squizlabs/php_codesniffer project to composer, becose I like to work with standard code syntax. So, when you download sensorario-comments, please run

    $ composer install

and squizlabs/php_codesniffer will be installed. After install, run

    $ sh coding_standard

This command will exec this command

    $ ./vendor/bin/phpcs actions/ controllers/ models/ SensorariocommentsModule.php

and check if all php code respect a specific standard. Please, if you see some output message running coding_standard command, fix them before make your pull request.
