var login = document.getElementById( 'login' )

login.addEventListener( 'click', () => {
    // event.preventDefault()
    const name = document.getElementById( 'username' ).value
    const password = document.getElementById( 'exampleInputPassword1' ).value
    let userInfo = {}
    userInfo.username = name
    userInfo.password = password

    let registeredUsers = localStorage.getItem( 'registeredUsers' )
    registeredUsers = JSON.parse( registeredUsers )

    if ( name == 'Ledjet' && password == 'ledjet1' ) {
        location.href = 'admin.html'
    }
    else {
        let index = 0;
        while ( index < registeredUsers.length ) {
            if ( name == registeredUsers[ index ].Username && password == registeredUsers[ index ].Password ) {
                location.href = 'rooms.html'
                break
            }
            
            index++
        }
        alert( 'Incorrect username or password' )
    }
} )
