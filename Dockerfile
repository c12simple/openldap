FROM osixia/openldap:1.1.9
MAINTAINER Simple <c12simple@gmail.com>

ADD bootstrap /container/service/slapd/assets/config/bootstrap
ADD certs /container/service/slapd/assets/certs
ADD environment /container/environment/01-custom
