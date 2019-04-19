const app         = require('express')();
const http        = require('http').Server(app);
const io          = require('socket.io')(http);
const redis       = require('redis');
const redisClient = redis.createClient();

redisClient.subscribe('new_game');
redisClient.on("message", (channel, message) => {
    if (channel === 'new_game')
    {
        const data = JSON.parse(message);
        io.sockets.emit('new_game', data.game);
    }
});

let settings = {
    online: 0
};

io.on('connection', (socket) => {

    updateOnline();

    socket.on('disconnect', () => {
        updateOnline();
    });
});

const updateOnline = () => {
    io.sockets.emit('updateOnline', Number(Object.keys(io.sockets.adapter.rooms).length) + settings.online);
};

http.listen(8443, () => {
    console.log('Прослушивается через порт *:8443');
});
