# CcLog

Make your clients aware of your projects releases.

## Screenshots
<a href="#"><img src="https://cloud.githubusercontent.com/assets/5287262/21198792/d67c3cee-c227-11e6-9540-1b272c8b50a2.png" alt="c-helps"></a>
<a href="#"><img src="https://cloud.githubusercontent.com/assets/5287262/21198945/804d339a-c228-11e6-9d01-5f2cb0cefa39.png" alt="c-helps"></a>

Your clients doesn't need create a github account.
Langs (en, br).
Control logs by issue labels.
Multiple Projects.

## Setup

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