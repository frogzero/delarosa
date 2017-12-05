
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Delarosa Admin</b></a>
             <small>Halaman Admin</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?=site_url() ?>/akun/Cek_LoginAdmin/">
                    <div class="msg">Silahkan Login</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row" >                      
                        <div class="col-xs-4" align="center">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
