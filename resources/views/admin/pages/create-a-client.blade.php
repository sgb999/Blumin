@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
<div class="content">
    <h1>Create a Client</h1>
    {{ Form::open(array('url' => '/create-client')) }}
    <label>Name</label>
    <input type="text" name="name" placeholder="John Doe" maxlength="255" required>
    <div class="alert-danger">{{ $errors->first('name')}}</div>
    <label>E-mail</label>
    <input type="email" name="email" placeholder="example@example.com" minlength="8" maxlength="255" required>
    <div class="alert-danger">{{ $errors->first('email')}}</div>
    <label>Password</label>
    <input type="password" name="password" placeholder="minimum 8 characters" minlength="8" maxlength="255" required>
    <div class="alert-danger">{{ $errors->first('password')}}</div>
    <label>Address</label>
    <input type="text" name="address" placeholder="123 example road" required>
    <div class="alert-danger">{{ $errors->first('address')}}</div>
    <label>Post Code</label>
    <input type="text" name="post_code" placeholder="SK10 4TG" minlength="4" maxlength="12" required>
    <div class="alert-danger">{{ $errors->first('post_code')}}</div>
    <label>Contact Number</label>
    <input type="text" name="contact_number" placeholder="0123456789" maxlength="14" required>
    <div class="alert-danger">{{ $errors->first('contact-number')}}</div>
    <button name="submit" >Submit</button>
</div>
</body>
@include('admin.layout.footer')
