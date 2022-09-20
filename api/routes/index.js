var express = require('express');
var router = express.Router();
var musicController = require('../controllers/musicController');

/* GET home page. */
router.get('/', musicController.getMusicList);
router.get('/getUserMusicList', musicController.getUserMusicList);

module.exports = router;
