<div class="z-depth-1 card-panel">
    <h4 class="text-center" style="margin-top:0px;">Login</h4>
    <?= $this->Form->create($user) ?>
        <div class="row">
            <div class="input-field col s12">
                <i class="mdi-social-person-outline prefix"></i>
                <input type="text" id="email" name="email">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="mdi-action-lock-outline prefix"></i>
                <input type="password" id="password" name="password">
                <label for="password" class="">Password</label>
            </div>
        </div>
        <!-- <div class="row">
            <div class="input-field col s6 login-text">
                <input type="checkbox" id="remember-me" value="1" name="data[Admin][remember_me]">
                <label for="remember-me">Remember me</label>
            </div>
            <div class="input-field col s6">
                <p class="right-align"><a class="forgetPass modal-trigger" href="#modal-forgetPass" >Forgot password ?</a></p>
            </div>
        </div> -->
        <div class="row">
            <div class="input-field col s12">
                <button type="submit" class="btn waves-effect waves-light light-blue darken-2 col s12">Login</button>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
