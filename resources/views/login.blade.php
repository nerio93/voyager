@extends('voyager::auth.master')

@section('content')
    <div class="login-container">

        <p>{{ __('voyager::login.signin_below') }}</p>

        <form action="{{ route('voyager.login') }}" method="POST">
            {{ csrf_field() }}

            @if (env("LIST_OPERATORS",false) && !empty($operators))
                <div class="form-group form-group-default" id="certificateGroup">
                    <label>{{ __('Operator') }}</label>
                    <div class="controls">
                        <select name="operator" id="operator"  class="form-control select2" name="{{ __('Operator') }}" @onchange="alert('sdgsd');">
                            @if(isset($operators))
                                @foreach($operators as $option)
                                    <option value="{{ $option['serial'] }}" >{{ $option['cn'] }} - {{ $option['serial'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            @endif

            <div class="form-group form-group-default" id="emailGroup">
                <label>{{ __('voyager::generic.email') }} / {{ __('voyager::profile.user_name') }}</label>
                <div class="controls">
                    <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-group-default" id="passwordGroup">
                <label>{{ __('voyager::generic.password') }}</label>
                <div class="controls">
                    <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required>
                </div>
            </div>

            <div class="form-group" id="rememberMeGroup">
                <div class="controls">
                    <input type="checkbox" name="remember" id="remember" value="1"><label for="remember" class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                </div>
            </div>

            <button type="submit" class="btn btn-block login-button">
                <span class="signingin hidden"><span class="voyager-refresh"></span> {{ __('voyager::login.loggingin') }}...</span>
                <span class="signin">{{ __('voyager::generic.login') }}</span>
            </button>

        </form>

        <div style="clear:both"></div>

        @if(!$errors->isEmpty())
            <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div> <!-- .login-container -->
    <div style="clear:both; position: absolute;right: 10px;bottom: 10px;width: 50%;text-align: right;">
        <img class="img-responsive" src="{{voyager_asset('/images/LOGO_FDER_transparente_1_0.webp')}}">
        <br>
        @php $version = Voyager::getVersion(); @endphp
        @if (!empty($version))
            {{ $version }}
        @endif
    </div>
@endsection

@section('post_js')

    <script>


        var btn = document.querySelector('button[type="submit"]');
        var operator = document.querySelector('[name="operator"]');
        var email = document.querySelector('[name="email"]');
        var password = document.querySelector('[name="password"]');
        operator.addEventListener('change', function(ev){
            email.value = operator.value;
            password.value = "";
        });
        var form = document.forms[0];
        btn.addEventListener('click', function(ev){
            if (form.checkValidity()) {
                btn.querySelector('.signingin').className = 'signingin';
                btn.querySelector('.signin').className = 'signin hidden';
            } else {
                ev.preventDefault();
            }
        });
        email.focus();
        document.getElementById('emailGroup').classList.add("focused");

        // Focus events for email and password fields
        email.addEventListener('focusin', function(e){
            document.getElementById('emailGroup').classList.add("focused");
        });
        email.addEventListener('focusout', function(e){
            document.getElementById('emailGroup').classList.remove("focused");
        });

        password.addEventListener('focusin', function(e){
            document.getElementById('passwordGroup').classList.add("focused");
        });
        password.addEventListener('focusout', function(e){
            document.getElementById('passwordGroup').classList.remove("focused");
        });

    </script>
@endsection
