### Files, parameters and DB
#
##### php files
#
```
REGION: region
BUCKET_NAME: bucket-name
USER: iam-user
ACCESS_KEY: user-access-key
SECRET: user-secret
```
#
##### S3-bucket-Policy.json
#
```
ARN user: arn:aws:iam::...:user/...-user
ARN bucket: arn:aws:s3:::...
```
#
#####  Database fields
#
```
id         [int KEY]        (AUTO_INCREMENT)
s3FilePath [varchar(250)]
accessCode [varchar(250)]
```
#
#####  This poject uses compose
#

.env is a hidden file in the project root folder

```
REGION = 'your-region'
BUCKET_NAME = 'bucket-name'
IAM_KEY = 'iam-key'
IAM_SECRET = 'iam-secret'

DB_HOST = 'endpoint-or-address'
DB_USER = 'user'
DB_PASS = 'user-password'
DB = 'db-name'
```
