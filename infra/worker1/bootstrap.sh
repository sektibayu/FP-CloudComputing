#!/usr/bin/env bash
sudo apt-get update
sudo apt-get install -y apache2
sudo apt-get install -y php7.0 libapache2-mod-php7.0
systemctl restart apache2
