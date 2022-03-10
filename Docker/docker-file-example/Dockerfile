FROM centos:latest

RUN cd /etc/yum.repos.d/
RUN sed -i 's/mirrorlist/#mirrorlist/g' /etc/yum.repos.d/CentOS-*
RUN sed -i 's|#baseurl=http://mirror.centos.org|baseurl=http://vault.centos.org|g' /etc/yum.repos.d/CentOS-*
RUN yum install httpd httpd-tools vim epel-release -y
RUN yum update -y

WORKDIR /var/www/html/

EXPOSE 80

ADD ./index.html .

ENTRYPOINT [ "httpd" ]
CMD [ "-D", "FOREGROUND" ]