Configuration options
=====================

Configuration options
---------------------

This module offers no configuration options.


Configuration example
---------------------

The recommended way to use this module is to have it loaded at the general
configuration level and to disable it only for specific networks.

..  parsed-code:: xml

    <?xml version="1.0" ?>
    <configuration
      xmlns="http://localhost/Erebot/"
      version="..."
      language="fr-FR"
      timezone="Europe/Paris"
      commands-prefix="!">

        <modules>
            <!-- Other modules ignored for clarity. -->
            <module name="|project|" />
        </modules>

        <networks>
            <!-- The bot WILL NOT auto-connect to this network upon startup. -->
            <network name="localhost">
                <modules>
                    <!--
                        Disable auto-connection for the local IRC server,
                        which is used only for debugging purposes.
                    -->
                    <module name="|project|" active="false" />
                </modules>

                <servers>
                    <server url="irc://localhost:6667/" />
                </servers>
            </network>

            <!-- The bot WILL auto-connect to this network upon startup. -->
            <network name="IIEns">
                <servers>
                    <server url="irc://irc.iiens.net:6667/" />
                </servers>
            </network>
        </networks>
    </configuration>
