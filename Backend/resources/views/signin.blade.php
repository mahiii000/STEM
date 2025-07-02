<!DOCTYPE html>  
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login/Register Toggle</title>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .container {
    background-image: url('images/for-students.jpg');
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    min-height: 100vh; 
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    padding: 60px 0; 
    }

    .container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.3);
      z-index: 0;
    }

    .tabs {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
    position: absolute;
    top: -45px;
    left: 0;
    right: 0;
    }

    .tab {
      background: transparent;
      color: #000;
      border: 1px solid #ccc;
      padding: 10px 25px;
      cursor: pointer;
      border-radius: 25px;
      font-weight: bold;
      margin: 0 5px;
      user-select: none;
    }

    .tab.active {
      background: linear-gradient(to right, #9f5de2, #6a38c9);
      color: white;
      border: none;
      opacity: 0.9;
    }

    .tab:not(.active) {
      background: white;
      color: #6a38c9;
      border: 1px solid #6a38c9;
      transition: 0.3s;
    }

    .tab:hover {
      opacity: 0.8;
    }

    .form-container {
    backdrop-filter: blur(5px);
    background-color: rgba(255, 255, 255, 0.95);
    padding: 40px 30px;
    border-radius: 10px;
    width: 320px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: relative;
    z-index: 1;
    animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    form {
      display: none;
      flex-direction: column;
    }

    form.active {
      display: flex;
    }

    .form-heading {
      text-align: center;
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      margin-bottom: 5px;
      font-size: 14px;
    }

    .required {
      color: red;
      margin-left: 3px;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"],
    input[type="tel"],
    select,
    textarea {
      padding: 10px;
      margin-bottom: 18px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    textarea {
      resize: vertical;
      min-height: 60px;
    }

    .checkbox-row {
      display: flex;
      align-items: center;
      font-size: 14px;
      margin-top: -10px;
      margin-bottom: 18px;
      gap: 6px;
    }

    .sign-in, .sign-up {
      background-color: #333;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 5px;
      font-size: 15px;
    }

    .forgot {
      display: block;
      margin-top: 14px;
      font-size: 13px;
      color: #333;
      text-decoration: underline;
      text-align: left;
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

    .alert ul {
      margin: 0;
      padding-left: 20px;
    }

    .alert li {
      margin-bottom: 5px;
    }
  </style>
</head>
<body> 
  <div class="container">
    <div class="form-container">
      
      <!-- Tabs inside form-container -->
      <div class="tabs">
        <button class="tab active" onclick="showForm('login')">Login</button>
        <button class="tab" onclick="showForm('register')">Register</button>
      </div>

      <!-- Login Form -->
      <form id="login-form" class="active">
        <div class="form-heading">Welcome Back!</div>
        @if (session('status'))
          <div class="alert alert-success" style="margin: 30px 0 15px 0;">
            {{ session('status') }}
          </div>
        @endif
        <label for="login-email">Email<span class="required">*</span></label>
        <input type="email" id="login-email" placeholder="mail@mail.com" required />

        <label for="login-password">Password<span class="required">*</span></label>
        <input type="password" id="login-password" placeholder="Password" required />

        <div class="checkbox-row">
          <input type="checkbox" onclick="togglePassword('login-password')" /> 
          <span>Show Password</span>
        </div>

        <button type="submit" class="sign-in">Sign In</button>
        <a href="#" class="forgot">Forgot password?</a>
      </form>

      <!-- Register Form -->
      <form id="register-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-heading">Create Account</div>

        @if ($errors->any())
          <div class="alert alert-danger" style="margin: 30px 0 15px 0;">
            @foreach ($errors->all() as $error)
              <div style="margin: 0 0 5px 0;">{{ $error }}</div>
            @endforeach
          </div>
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              showForm('register');
            });
          </script>
        @endif

        @if (session('success'))
          <div class="alert alert-success" style="margin: 30px 0 15px 0;">
            {{ session('success') }}
          </div>
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              showForm('register');
            });
          </script>
        @endif

        <label for="register-name">Name<span class="required">*</span></label>
        <input type="text" id="register-name" name="name" placeholder="Name" required value="{{ old('name') }}" />

        <label for="register-email">Email<span class="required">*</span></label>
        <input type="email" id="register-email" name="email" placeholder="mail@mail.com" required value="{{ old('email') }}" />

        <label for="register-phone">Phone<span class="required">*</span></label>
        <input type="tel" id="register-phone" name="phone" placeholder="+1 234 567 8900" required value="{{ old('phone') }}" />

        <label for="register-country">Country<span class="required">*</span></label>
        <select id="register-country" name="country" required>
          @if(old('country'))
            <option value="{{ old('country') }}" selected>{{ old('country') }}</option>
          @endif
        </select>

        <label for="account-type">Account Type<span class="required">*</span></label>
        <select id="account-type" name="account_type" required>
          <option value="" disabled>Select account type</option>
          <option value="student" {{ old('account_type') == 'student' ? 'selected' : '' }}>Student</option>
          <option value="teacher" {{ old('account_type') == 'teacher' ? 'selected' : '' }}>Teacher</option>
          <option value="Admin" {{ old('account_type') == 'Admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <label for="school-name">School Name</label>
        <input type="text" id="school-name" name="school_name" placeholder="School Name (optional)" value="{{ old('school_name') }}" />

        <label for="address">Address</label>
        <textarea id="address" name="address" placeholder="Address (optional)">{{ old('address') }}</textarea>

        <label for="register-password">Password<span class="required">*</span></label>
        <input type="password" id="register-password" name="password" placeholder="Password" required />

        <label for="confirm-password">Confirm Password<span class="required">*</span></label>
        <input type="password" id="confirm-password" name="password_confirmation" placeholder="Password" required />

        <div class="checkbox-row">
          <input type="checkbox" onclick="togglePassword('register-password', 'confirm-password')" />
          <span>Show Password</span>
        </div>

        <button type="submit" class="sign-up">Sign Up</button>

        
      </form>

      
    </div>
  </div>

  <script>
    function showForm(type) {
      const loginForm = document.getElementById('login-form');
      const registerForm = document.getElementById('register-form');
      const tabs = document.querySelectorAll('.tab');

      if (type === 'login') {
        loginForm.classList.add('active');
        registerForm.classList.remove('active');
        tabs[0].classList.add('active');
        tabs[1].classList.remove('active');
      } else {
        loginForm.classList.remove('active');
        registerForm.classList.add('active');
        tabs[0].classList.remove('active');
        tabs[1].classList.add('active');
      }
    }

    function togglePassword(...ids) {
      ids.forEach(id => {
        const field = document.getElementById(id);
        field.type = field.type === 'password' ? 'text' : 'password';
      });
    }
  </script>
 <script src="{{ asset('js/countries.js') }}"></script>
 <script>
   document.addEventListener('DOMContentLoaded', function() {
     var oldCountry = @json(old('country'));
     if (oldCountry) {
       // Wait for countries.js to populate the dropdown
       setTimeout(function() {
         var select = document.getElementById('register-country');
         if (select && select.options.length > 0) {
           for (var i = 0; i < select.options.length; i++) {
             if (select.options[i].value === oldCountry) {
               select.selectedIndex = i;
               break;
             }
           }
         }
       }, 100); // Adjust delay if needed
     }
   });
 </script>
<script>
  // Only allow numbers and special characters like + in phone field with a maximum of 15 characters
  document.addEventListener('DOMContentLoaded', function() {
    var phoneInput = document.getElementById('register-phone');
    if (phoneInput) {
      phoneInput.addEventListener('input', function(e) {
        // Remove all letters
        let cleaned = this.value.replace(/[A-Za-z]/g, '');
        // Limit to 15 characters
        if (cleaned.length > 15) {
          cleaned = cleaned.slice(0, 15);
        }
        if (this.value !== cleaned) {
          this.value = cleaned;
        }
      });
    }
  });
</script>
<script>
  // Show error if phone contains invalid format on submit
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('register-form');
    var phoneInput = document.getElementById('register-phone');
    if (form && phoneInput) {
      form.addEventListener('submit', function(e) {
        var phoneVal = phoneInput.value;
        // Only allow +, numbers, spaces, dashes, parentheses
        var valid = /^\+?[0-9\-()\s]{1,15}$/.test(phoneVal);
        if (!valid) {
          e.preventDefault();
          // Remove any previous error
          var prev = document.getElementById('phone-error');
          if (prev) prev.remove();
          // Insert error after phone input
          var error = document.createElement('div');
          error.id = 'phone-error';
          error.className = 'alert alert-danger';
          error.style.margin = '0 0 15px 0';
          error.innerText = 'Invalid format';
          phoneInput.parentNode.insertBefore(error, phoneInput.nextSibling);
        } else {
          var prev = document.getElementById('phone-error');
          if (prev) prev.remove();
        }
      });
    }
  });
</script>
</body>
</html>