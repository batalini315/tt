
        <div class="login col-md-4 mx-auto text-center">
            <h1><?=$title?></h1>
            <form action="<?= base_url('login/verify')?>"  method="post">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>
        </div>

        
    </body>
</html>