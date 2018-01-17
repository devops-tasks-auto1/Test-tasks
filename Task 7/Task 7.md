**7. Setup basic docker container on port 9999 that simply redirects to application on port 7777 and adds additional HTTP header: X-Proxied-By with any value. You can use any server software you want. Attach Dockerfile to email with test results.**

See Dockerfile and nginx.conf
Run the image with

     docker run -d -p 9999:80 <image ID>
