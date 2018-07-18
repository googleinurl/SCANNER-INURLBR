FROM debian

MAINTAINER greenmind.sec@gmail.com

RUN apt-get update -y

RUN apt-get install php-curl -y

RUN apt-get install php-cli -y

RUN apt-get install curl -y

RUN apt-get install libcurl3 -y

RUN apt-get install php -y

RUN apt-get install git -y

WORKDIR /root

RUN git clone https://github.com/googleinurl/SCANNER-INURLBR

WORKDIR /root/SCANNER-INURLBR

RUN chmod +x inurlbr.php

RUN ln -s /root/SCANNER-INURLBR/inurlbr.php /bin/inurlbr

ENTRYPOINT ["/root/SCANNER-INURLBR/inurlbr.php"]

CMD ["--help"]
