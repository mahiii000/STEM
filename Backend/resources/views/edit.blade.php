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
    </style>
</head>
<body>
    <div class="app-content">
        <aside class="sidebar"> ... </aside>
        <main class="main-content">
            <div class="profile-header">
                <h1>Edit Profile</h1>
                <div class="avatar">
                    <a href="avatar.html">
                        <button class="edit-avatar-btn" aria-label="Change profile picture">
                            <!-- SVG here -->
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
                            <!-- all options here, mark selected as needed -->
                            <option value="+971" {{ old('country_code', $user->country_code ?? '') == '+971' ? 'selected' : '' }}>🇦🇪 +971</option>
                            <!-- ...other options... -->
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
                            <!-- ...other options... -->
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
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm your password">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-cancel">Cancel</button>
                    <button type="submit" class="btn btn-save">Save</button>
                </div>
            </form>
        </main>
    </div>

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
    // Password show/hide toggle (optional)
    // Add a button if you want to toggle password visibility
    </script>
</body>
</html>