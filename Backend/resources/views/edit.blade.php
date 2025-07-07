<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Link to your external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <style>
        .country-code {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: white;
        }
        .contact-number-group {
            display: flex;
        }
        .contact-number-group .country-code {
            border-right: none;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .contact-number-group input[type="tel"] {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            flex-grow: 1;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="app-content">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </a>
                <h3>Setting</h3>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="active">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.13,5.12L18.88,8.87M3,17.25V21H6.75L17.81,9.94L14.06,6.19L3,17.25Z"></path></svg>
                            Edit Profile
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M2,12C2,17.5 6.5,22 12,22C17.5,22 22,17.5 22,12C22,6.5 17.5,2 12,2C6.5,2 2,6.5 2,12Z"></path></svg>
                            Appearance
                        </a>
                    </li>
                    <li>
                        <a href="help.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,2C6.48,2 2,6.48 2,12C2,17.52 6.48,22 12,22C17.52,22 22,17.52 22,12C22,6.48 17.52,2 12,2M12,19C11.45,19 11,18.55 11,18V17C11,16.45 11.45,16 12,16C12.55,16 13,16.45 13,17V18C13,18.55 12.55,19 12,19M13.07,10.25L12.5,12.88C12.44,13.19 12.19,13.44 11.88,13.5C11.5,13.56 11.16,13.37 11.05,13.04L10,10.25C9.84,9.75 10.03,9.2 10.5,8.95C10.79,8.79 11.12,8.75 11.43,8.84C12.2,9.04 12.8,9.63 13.07,10.25M12,7C11.45,7 11,6.55 11,6V5C11,4.45 11.45,4 12,4C12.55,4 13,4.45 13,5V6C13,6.55 12.55,7 12,7Z"></path></svg>
                            Help
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <div class="profile-header">
                <h1>Edit Profile</h1>
                <div class="avatar">
                    <a href="avatar.html">
                        <button class="edit-avatar-btn" aria-label="Change profile picture">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </button>
                    </a>
                </div>
            </div>

            <!-- Laravel Error/Success Message Section -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="profile-form" method="POST" action="{{ route('profile.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group">
                        <label for="first-name">First Name<span style="color:red">*</span></label>
                        <input type="text" id="first-name" name="first_name" placeholder="Enter Your Name" required pattern="^[A-Za-z ]+$" value="{{ old('first_name', $user->first_name ?? '') }}">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name<span style="color:red">*</span></label>
                        <input type="text" id="last-name" name="last_name" placeholder="Enter Last name" required pattern="^[A-Za-z ]+$" value="{{ old('last_name', $user->last_name ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email<span style="color:red">*</span></label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" placeholder="Enter Your Email" required value="{{ old('email', $user->email ?? '') }}">
                        <div class="input-icons">
                            <div class="validation-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z" /></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Street" value="{{ old('address', $user->address ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="contact-number">Contact Number<span style="color:red">*</span></label>
                    <div class="contact-number-group">
                        <select class="country-code" name="country_code" required>
                            <option value="">Code</option>
                            <option value="+971" {{ old('country_code', $user->country_code ?? '') == '+971' ? 'selected' : '' }}>🇦🇪 +971</option>
                            <option value="+966" {{ old('country_code', $user->country_code ?? '') == '+966' ? 'selected' : '' }}>🇸🇦 +966</option>
                            <option value="+974" {{ old('country_code', $user->country_code ?? '') == '+974' ? 'selected' : '' }}>🇶🇦 +974</option>
                            <option value="+965" {{ old('country_code', $user->country_code ?? '') == '+965' ? 'selected' : '' }}>🇰🇼 +965</option>
                            <option value="+973" {{ old('country_code', $user->country_code ?? '') == '+973' ? 'selected' : '' }}>🇧🇭 +973</option>
                            <option value="+968" {{ old('country_code', $user->country_code ?? '') == '+968' ? 'selected' : '' }}>🇴🇲 +968</option>
                            <option value="+20" {{ old('country_code', $user->country_code ?? '') == '+20' ? 'selected' : '' }}>🇪🇬 +20</option>
                            <option value="+962" {{ old('country_code', $user->country_code ?? '') == '+962' ? 'selected' : '' }}>🇯🇴 +962</option>
                            <option value="+961" {{ old('country_code', $user->country_code ?? '') == '+961' ? 'selected' : '' }}>🇱🇧 +961</option>
                            <option value="+213" {{ old('country_code', $user->country_code ?? '') == '+213' ? 'selected' : '' }}>🇩🇿 +213</option>
                            <option value="+212" {{ old('country_code', $user->country_code ?? '') == '+212' ? 'selected' : '' }}>🇲🇦 +212</option>
                            <option value="+216" {{ old('country_code', $user->country_code ?? '') == '+216' ? 'selected' : '' }}>🇹🇳 +216</option>
                            <option value="+218" {{ old('country_code', $user->country_code ?? '') == '+218' ? 'selected' : '' }}>🇱🇾 +218</option>
                            <option value="+249" {{ old('country_code', $user->country_code ?? '') == '+249' ? 'selected' : '' }}>🇸🇩 +249</option>
                            <option value="+964" {{ old('country_code', $user->country_code ?? '') == '+964' ? 'selected' : '' }}>🇮🇶 +964</option>
                            <option value="+963" {{ old('country_code', $user->country_code ?? '') == '+963' ? 'selected' : '' }}>🇸🇾 +963</option>
                            <option value="+967" {{ old('country_code', $user->country_code ?? '') == '+967' ? 'selected' : '' }}>🇾🇪 +967</option>
                            <option value="+970" {{ old('country_code', $user->country_code ?? '') == '+970' ? 'selected' : '' }}>🇵🇸 +970</option>
                            <option value="+252" {{ old('country_code', $user->country_code ?? '') == '+252' ? 'selected' : '' }}>🇸🇴 +252</option>
                            <option value="+253" {{ old('country_code', $user->country_code ?? '') == '+253' ? 'selected' : '' }}>🇩🇯 +253</option>
                            <option value="+269" {{ old('country_code', $user->country_code ?? '') == '+269' ? 'selected' : '' }}>🇰🇲 +269</option>
                            <option value="+222" {{ old('country_code', $user->country_code ?? '') == '+222' ? 'selected' : '' }}>🇲🇷 +222</option>
                            <option value="+1" {{ old('country_code', $user->country_code ?? '') == '+1' ? 'selected' : '' }}>🇺🇸 +1</option>
                            <option value="+44" {{ old('country_code', $user->country_code ?? '') == '+44' ? 'selected' : '' }}>🇬🇧 +44</option>
                        </select>
                        <input type="tel" id="contact-number" name="contact_number" placeholder="Enter your number" required value="{{ old('contact_number', $user->contact_number ?? '') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="emirate">Emirate</label>
                        <select id="emirate" name="emirate">
                            <option value="">-Select Emirate</option>
                            <option value="AUH" {{ old('emirate', $user->emirate ?? '') == 'AUH' ? 'selected' : '' }}>Abu Dhabi</option>
                            <option value="DXB" {{ old('emirate', $user->emirate ?? '') == 'DXB' ? 'selected' : '' }}>Dubai</option>
                            <option value="SHJ" {{ old('emirate', $user->emirate ?? '') == 'SHJ' ? 'selected' : '' }}>Sharjah</option>
                            <option value="AJM" {{ old('emirate', $user->emirate ?? '') == 'AJM' ? 'selected' : '' }}>Ajman</option>
                            <option value="UAQ" {{ old('emirate', $user->emirate ?? '') == 'UAQ' ? 'selected' : '' }}>Umm Al Quwain</option>
                            <option value="RAK" {{ old('emirate', $user->emirate ?? '') == 'RAK' ? 'selected' : '' }}>Ras Al Khaimah</option>
                            <option value="FUJ" {{ old('emirate', $user->emirate ?? '') == 'FUJ' ? 'selected' : '' }}>Fujairah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="area">Area</label>
                        <input type="text" id="area" name="area" placeholder="Enter your area" value="{{ old('area', $user->area ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password (leave blank to keep current)</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" placeholder="At least 8 characters">
                        <div class="input-icons">
                            <div class="validation-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z" /></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm your password">
                        <div class="input-icons">
                            <div class="validation-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z" /></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-cancel">Cancel</button>
                    <button type="submit" class="btn btn-save">Save</button>
                </div>
            </form>
        </main>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/edit.js') }}"></script>
    <script>
    // Phone input: only allow numbers, max 15 chars, no letters
    document.addEventListener('DOMContentLoaded', function() {
        var phoneInput = document.getElementById('contact-number');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let cleaned = this.value.replace(/[A-Za-z]/g, '');
                if (cleaned.length > 15) {
                    cleaned = cleaned.slice(0, 15);
                }
                if (this.value !== cleaned) {
                    this.value = cleaned;
                }
            });
        }
    });
    // Phone: regex check on submit
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('.profile-form');
        var phoneInput = document.getElementById('contact-number');
        if (form && phoneInput) {
            form.addEventListener('submit', function(e) {
                var phoneVal = phoneInput.value;
                var valid = /^\+?[0-9\-()\s]{1,15}$/.test(phoneVal);
                var prev = document.getElementById('phone-error');
                if (!valid) {
                    e.preventDefault();
                    if (prev) prev.remove();
                    var error = document.createElement('div');
                    error.id = 'phone-error';
                    error.className = 'alert alert-danger';
                    error.innerText = 'Invalid format';
                    phoneInput.parentNode.insertBefore(error, phoneInput.nextSibling);
                } else {
                    if (prev) prev.remove();
                }
            });
        }
    });
    </script>
</body>
</html>