# Forum

- [FORUM](#Forum)
  - [GITHUB copy](#github-copy)
  - [Figma](#figma)
  - [Site](#site)
    - [Languages used](#languages-used)
    - [Site Details](#site-details)
      - [1. Header](#1-header)
      - [2. Home](#2-home)
      - [3. Registration page](#3-registration-page)
      - [4. Login page](#4-login-page)
      - [5. Lost password](#5-Lost-password)
      - [6. Forum page](#6-forum-page)
        - [Sub-discussion forum page](#sub-discussion-forum-page)


## GITHUB copy
If you want to clone this repository in your GITHUB account, you can do it in your GIT terminal.

Simply do a ```git clone https://github.com/NZabik/Forum.git```


## Figma
[Link to the figma](https://www.figma.com/file/rDfLqovjY21cNtzpJlEqeD/Forum-%C3%A9valuation-10%2F2023?type=design&node-id=3%3A41&mode=design&t=57OIpgu6kwzvkLuN-1)

There are 3 pages in Figma, one for each format:
- Desktop
- Tablet
- Mobile


## Site

### Languages used
- PHP
- CSS
- Bootstrap for the header


### Site Details

#### 1. Header

There are 5 buttons on the header:

- The **_Accueil_** button: Allows you to go to the corresponding home page.
- The **_Forum_** button: Only accessible if the user is connected via the login page, otherwise, the button is disabled.
- The **_S'enregistrer_** button: Allows you to create an account.
- The **_Se connecter_** button: Allows you to log in if an account has been created. The button only works if the user is logged out, otherwise, the button is disabled.
- The **_Se déconnecter_** button: Allows you to disconnect the user.
- When the user is logged, his name and profile picture appears in the upper right corner, you can click on it to view the user's informations and created subjects/messages.

#### 2. Home
Includes two buttons allowing you to either register or log in.

#### 3. Registration page
Includes the necessary checks in the registration datas, such as the name length, the mail typo verification, the password requirements...etc...

The user database is filled with the input fields uppon registration.
You can not create an account if the mail already exists in the database.

*A message is displayed upon successful registration and a mail is sent tou the user with his login password.*

#### 4. Login page
Includes the necessary checks from the data saved in the database.
you can either create an account and log in via google, it will auto fill the user database with the required informations.

*A message is displayed upon successful connection.*

#### 5. Lost password
You can recover your lost password in the login page.
It will create a random token and send it to you by mail with an unique link (including the token).
If you click on the link, you will be redirected to the password initialization which will change your old password with the new one.
If you don't have any token, you can't change the password of your account.
Upon the change of the password, the token will be destroyed to be sure it will not be reusable.

#### 6. Forum page
Only accessible if login is successful.
There are 3 discussion sub-forums.

A login status is displayed at the top of each page with the user name and login date/time.

If the user is not logged in, he will not be able to access to the forum pages and go there.

##### Sub-discussion forum page
- Topics page:

A field allows you to create the different topics you want to discuss.
It is impossible to create an empty subject.

Several topics can be created one after the other (including the name of the author and the date/time the topic created).

You can select the topic you want to discuss by clicking on the corresponding table row link, this takes you to the corresponding discussion page.

You can either delete only the subjects created by you and not the others members.

- Discussion page:

There is a dynamic title including the topic name (as well as the page name in the browser tab).
A field allows you to discuss the subject by adding comments.
It is impossible to create an empty comment.
Each new message displays the author's name and the date/time on each line of the table thus created.
You can either delete only the messages created by you and not the others members.


