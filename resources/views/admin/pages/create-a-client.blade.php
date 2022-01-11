@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
<div class="content">
    <h1>Create a Client</h1>
    {{ Form::open(array('url' => '/create-client')) }}
    <div class="form-group">
        <label>Name</label>
        <input class="form-control" type="text" name="name" placeholder="John Doe" maxlength="255" required>
        <div class="alert-danger">{{ $errors->first('name')}}</div>
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input class="form-control" type="email" name="email" placeholder="example@example.com" minlength="8" maxlength="255" required>
        <div class="alert-danger">{{ $errors->first('email')}}</div>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" placeholder="minimum 8 characters" minlength="8" maxlength="255" required>
        <div class="alert-danger">{{ $errors->first('password')}}</div>
    </div>
    <div class="form-group">
        <label>Address</label>
        <input class="form-control" type="text" name="address" placeholder="123 example road" required>
        <div class="alert-danger">{{ $errors->first('address')}}</div>
    </div>
    <div class="form-group">
        <label>Post Code</label>
        <input class="form-control" type="text" name="post_code" placeholder="SK10 4TG" minlength="4" maxlength="12" required>
        <div class="alert-danger">{{ $errors->first('post_code')}}</div>
    </div>
    <div class="form-group">
        <label>Contact Number</label>
        <input class="form-control" type="text" name="contact_number" placeholder="0123456789" maxlength="14" required>
        <div class="alert-danger">{{ $errors->first('contact-number')}}</div>
    </div>
    <p></p>
    <button class="btn btn-primary" name="submit" >Submit</button>
</div>
</body>
@include('admin.layout.footer')
