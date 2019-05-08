
					<form method="POST"  action="{{ route('login') }}">
                        @csrf

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ _lang('Email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           

								<input id="school_id" type="school_id" class="form-control{{ $errors->has('school_id') ? ' is-invalid' : '' }}" name="school_id" placeholder="{{ _lang('school_id') }}" required>

                                @if ($errors->has('school_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('school_id') }}</strong>
                                    </span>
                                @endif
                            
                        

								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ _lang('Password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          
							<input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
							

                        
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ _lang('Login') }}
                                </button>

			
                    </form>

