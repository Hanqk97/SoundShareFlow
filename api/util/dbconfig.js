const mysql = require('mysql');

module.exports = {
    // data config
    config: {
        host: 'localhost',
        port: '3306',
        user: 'Hanqk97',
        password: 'Chq@970713',
        database: 'Music'
    },

    //conncet database through connect pool
    //connect obbject
    sqlConnect: function (sql, sqlArr, callBack) {
        var pool = mysql.createPool(this.config);
        pool.getConnection((err, conn) => {
            console.log('pool start');
            if (err) {
                console.log("pool err");
                console.log(err);
                return;
            }

            //event call back
            conn.query(sql, sqlArr, callBack);

            //release link
            conn.release();

        })

    }
}