FROM ubuntu:18.04 as php73-composer

COPY ./entrypoint.sh /usr/local/bin/entrypoint.sh
COPY ./provision/playbooks/locales.yml /var/provision/playbooks/locales.yml
COPY ./provision/playbooks/php73.yml /var/provision/playbooks/php73.yml
COPY ./provision/playbooks/composer.yml /var/provision/playbooks/composer.yml

RUN apt-get update -y --fix-missing && \
    perl -pi -e 's/\r\n/\n/g' /usr/local/bin/entrypoint.sh && \
    chmod 755 /usr/local/bin/entrypoint.sh && \
    ln -s usr/local/bin/entrypoint.sh /entrypoint.sh && \
    apt-get install -y ansible curl less && \
    mkdir -p /run/php && \
    ansible-playbook -i 'localhost,' -c local /var/provision/playbooks/php73.yml && \
    ansible-playbook -i 'localhost,' -c local /var/provision/playbooks/composer.yml

ENTRYPOINT ["entrypoint.sh"]

CMD ["/bin/bash", "-c", "php /var/www/html/bin/export.php"]
