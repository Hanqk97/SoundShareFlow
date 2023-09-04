# Simple-Music-Player

**[Demo](http://ec2-18-222-37-47.us-east-2.compute.amazonaws.com/~Hanqi/Simple_Music_Player_JavaScript/index.html)**

**Test Account**

**username: test**

**password: test**

My goal is to create a private web music player that can be shared with friends, allowing us to collectively build and enjoy a playlist of our favorite songs. To achieve this, I've streamlined the music player code by referencing online guides and eliminating unnecessary complexities.

To facilitate sharing with friends, I've utilized Node.js to develop an API that interacts with a MySQL database, storing essential account data (usernames and hashed passwords) and music-related information (song names, artists, covers, source URLs, MV URLs, and favorites).

I hope this project enhances your music-sharing experience with friends and brings joy to your collective playlist curation journey.


## Dependency Installation

```bash
sudo npm install -g express-generator

sudo npm install nodemon -g

sudo npm install -g pm2
```

## Music Player
Before using player, users need to register their own account. This account will be used allow users add or edit music on the common music playlist. Each new music should include name(only accept letter, other languages will display messy code), artist, cover url, source url(mp3 prefer) and mv url.

After add music, users can see whole playlist on their main page, and then they can click play to enjoy music.

## API
This API is used to connect database and player. Before playing, player will send rrequest to API to get a list of music information.

Start API:
```Bash
cd api
node app.js // or pm2 start
```

## DataBase Tables
 ```BASH
 CREATE TABLE `users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

CREATE TABLE `music` (
  `musicid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `musicname` text NOT NULL,
  `artist` text NOT NULL,
  `cover` text NOT NULL,
  `source` text NOT NULL,
  `url` text NOT NULL,
  `favorited` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`musicid`),
  KEY `userid` (`userid`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf
 ```
