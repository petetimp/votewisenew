
{{ content() }}
<div class="message"><?php $this->flashSession->output() ?></div>
<div id="loginDiv" class="login-or-signup">
    <div class="row">

        <div>
            <div>
                <h2 class="login-text">Please enter your username or email and password combination to log in.</h2>
				<br/>
				<br/>
            </div>
            {{ form('session/start', 'class': 'form-inline') }}
                <fieldset>
                    <div>
                        <label class="login-text" for="email">Username/Email</label>
                        <div>
                            {{ text_field('email', 'size': "30", 'class': "input-xlarge") }}
                        </div>
                    </div>
					<br/>
                    <div>
                        <label class="login-text" for="password">Password</label>
                        <div>
                            {{ password_field('password', 'size': "30", 'class': "input-xlarge") }}
                        </div>
                    </div>
                    <div>
                        {{ submit_button('Log in', 'class': 'btn btn-primary btn-large log-in') }}
                    </div>
                </fieldset>
            </form>
        </div>
		<br/>
		<br/>
        <div class="login-text">
            <div>
                <h2 >Don't have an account yet?</h2>
				<br/>
            </div>

            <p>Creating an account offers the following advantages:</p>
			<br/>
            <ul id="login-ul">
                <li>Create, track and export your invoices online</li>
                <li>Gain critical insights into how your business is doing</li>
                <li>Stay informed about promotions and special packages</li>
            </ul>
		</div>
            <div>
				<input type="button" onClick="location.href='/votewise/session/register'" value="Register"  class="log-in" >
                {#{ link_to('session/register', 'Sign Up', 'class': 'btn btn-primary btn-large btn-success') }#}
            </div>
        

    </div>
</div>
