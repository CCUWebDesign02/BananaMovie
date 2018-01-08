<div class="modal fade custom" id="login-popup-box">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content popbox">
            <div class="modal-header">
                <h1 class="col-12 text-center mt-3" id="hi">登入</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="my-auto row justify-content-center">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-12">
                                    <form>
                                        <div class="row wrapper mb-2 py-1">
                                            <div class="col-4">帳號</div>
                                            <div class="col-8 p-0">
                                                <input class="col-11 p-0" type="text" name="account" />
                                            </div>
                                        </div>
                                        <div class="row wrapper mb-2 py-1">
                                            <div class="col-4">密碼</div>
                                            <div class="col-8 p-0">
                                                <input class="col-11 p-0" type="password" name="password" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <a href="" class="col-12 text-right mb-3 p-0">忘記密碼?</a>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <button type="button" class="col-8 login-btn">登入</button>
                            </div>
                            <div class="row mb-5">
                                <a href="" data-toggle="modal" data-target="#reg-popup-box" class="col-12 text-center" onclick="$('#login-popup-box').modal('hide')">註冊</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade custom" id="reg-popup-box">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content popbox">
            <div class="modal-header">
                <h1 class="col-12 text-center mt-3" id="hi">註冊</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="my-auto row justify-content-center">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-12">
                                    <form>
                                        <div class="row wrapper mb-2 py-1">
                                            <div class="col-4">帳號</div>
                                            <div class="col-8 p-0">
                                                <input class="col-11 p-0" type="text" name="account" />
                                            </div>
                                        </div>
                                        <div class="row wrapper mb-2 py-1">
                                            <div class="col-4">密碼</div>
                                            <div class="col-8 p-0">
                                                <input class="col-11 p-0" type="password" name="password" />
                                            </div>
                                        </div>
                                        <div class="row wrapper mb-2 py-1">
                                            <div class="col-4">姓名</div>
                                            <div class="col-8 p-0">
                                                <input class="col-11 p-0" type="username" name="username" />
                                            </div>
                                        </div>
                                        <div class="row wrapper mb-2 py-1">
                                            <div class="col-4">信箱</div>
                                            <div class="col-8 p-0">
                                                <input class="col-11 p-0" type="email" name="email" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <button type="button" class="col-8 login-btn">註冊</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade custom" id="reset-popup-box">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content popbox">
            <div class="modal-header">
                <h1 class="col-12 text-center mt-3" id="hi">修改密碼</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="my-auto row justify-content-center">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-12">
                                    <form>
                                        <div class="row wrapper mb-2 py-1">
                                            <div class="col-4">舊密碼</div>
                                            <div class="col-8 p-0">
                                                <input class="col-11 p-0" type="password" name="old_password" />
                                            </div>
                                        </div>
                                        <div class="row wrapper mb-2 py-1">
                                            <div class="col-4">新密碼</div>
                                            <div class="col-8 p-0">
                                                <input class="col-11 p-0" type="password" name="new_password" />
                                            </div>
                                        </div>
                                        <div class="row wrapper mb-2 py-1">
                                            <div class="col-4">新密碼</div>
                                            <div class="col-8 p-0">
                                                <input class="col-11 p-0" placeholder = "再次確認" type="password" name="new_password_confirm" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <button type="button" class="col-8 login-btn">送出</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="container-fluid">
    <div class="row align-items-center">
        <div class="col-12 text-center">
            <div>Copyright © 2017 香蕉電影院 BANANA CINEMAS. All Rights Reserved.</div>
            <a href="#">隱私權政策</a>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/vue"></script>-->
<script type="text/javascript" src="js/main.js"></script>
</body>

</html>