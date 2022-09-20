# Simple-Music-Player
This project consist of two parts: Music Player and API.

## Music Player
Before using player, users need to register their own account. This account will be used allow users add or edit music on the common music playlist. Each new music should include name(only accept letter, other languages will display messy code), artist, cover url, source url(mp3 prefer) and mv url.

After add music, users can see whole playlist on their main page, and then they can click play to enjoy music.

## API
This API is used to connect database and player. Before playing, player will send rrequest to API to get a list of music information.

Start API:
```Bash
cd api
node app.js
```

## DataBase Tables
 ```BASH
 CREATE TABLE `users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8

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

 ## Demo
 Test Account:
 Username & Password : hanqk
 Link:
 http://ec2-54-172-235-15.compute-1.amazonaws.com/~Hanqk97/Simple_Music_Player_JavaScript/index.html