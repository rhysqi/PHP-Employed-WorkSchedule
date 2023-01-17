
// Reset Function
function ResetFunc(e) {
    let user = document.getElementById('user');
    let pin = document.getElementById('pin');

    if (user.value == "admin" && pin.value == "admin"){
        let Clear = document.getElementById('Reset');
        window.location.href = '../Admin/admin.html'
    }else{
        user.value = ''
        pin.value = ''
    };
}

let contentType = 'text/html';
  switch (extname) {
    case '.js':
      contentType = 'text/javascript';
      break;
    case '.css':
      contentType = 'text/css';
      break;
  }
