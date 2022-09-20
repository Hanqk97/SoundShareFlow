var dbconfig = require('../util/dbconfig');
var express = require('express');
var cors = express('cors');

//getMusicList
getMusicList = (req, res) => {
    var sql = "SELECT * from music";
    var sqlArr = [];
    var callBack = (err, data) => {
        if (err) {
            console.log('connect fail 01')
        } else {
            res.send({
                'list': data
            })
        }
    }

    //PASS CSOR
    res.setHeader('Access-Control-Allow-Origin', '*');

    dbconfig.sqlConnect(sql, sqlArr, callBack);
}

//getUserMusicList
getUserMusicList = (req,res) =>{
    let {userid} = req.query;
    var sql = "SELECT 'musicname', 'artist', 'cover', 'source', 'url', 'favorited' from music where userid = ?";
    var sqlArr = [userid];
    var callBack = (err, data) => {
        if (err) {
            console.log('connect fail 02')
        } else {
            res.send({
                'list': data
            })
        }
    }

    //PASS CSOR
    res.setHeader('Access-Control-Allow-Origin', '*');

    dbconfig.sqlConnect(sql, sqlArr, callBack);
}



module.exports = {
    getMusicList,
    getUserMusicList
}