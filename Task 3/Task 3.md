**3. Create an extra EBS volume of 1G and attach it to the instance via the aws client. Use it to grow the filesystem in /var/lib/mysql**

https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-metadata.html

    curl http://169.254.169.254/latest/meta-data/iam/security-credentials
Use that key for AWS client configuration and connect to AWS CLI
