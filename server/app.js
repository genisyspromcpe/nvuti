const app   = require('express')();
const http  = require('http').Server(app);
const io    = require('socket.io')(http);

let online = 0;

io.on('connection', (socket) => {

    io.sockets.emit('updateOnline', online++);

    socket.on('disconnect', () => {
        io.sockets.emit('updateOnline', online--);
    });
});

http.listen(8443, () => {
    console.log('Прослушивается через порт *:8443');
});
