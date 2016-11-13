# CcLog

>

## Setup (Laravel 5.3)

First, create a new github app, visit [GitHub's New OAuth Application page](https://github.com/settings/applications/new), fill out the form, and grab your client ID, secret and callback URL.

```
Application name: cclog
Homepage URL: URL
Application description: cclog
Authorization callback URL: http://URL/auth/github/callback
```

Finally fill the informations in the .env file

````
GITHUB_ID=XXXXX
GITHUB_SECRET=XXXXXXXXXXXXXXXXXX
GITHUB_CALLBACK_URL=http://URL/auth/github/callback

CCLOG_LABEL_NAME=cclog
CCLOG_REPORT_LABEL_NAME=cclog_report
````