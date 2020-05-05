const app = require('./config/server');
require('./app/routers/news');
//startinf the server
app.listen(app.get('port'), () => {
    console.log('server on port ', app.get('port'));
});