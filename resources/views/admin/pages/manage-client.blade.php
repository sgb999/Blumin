@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
<div class="content">
    <h1>Manage Client {{$client->user()->first()->name}}</h1>
    {{ Form::open(array('url' => '/manage-client/' . $client->id, 'method' => 'PUT')) }}
    <label>Name</label>
    <input type="text" name="name" placeholder="{{$client->user()->first()->name}}" maxlength="255">
    <div class="alert-danger">{{ $errors->first('name')}}</div>
    <label>E-mail</label>
    <input type="email" name="email" placeholder="{{$client->user()->first()->email}}" minlength="8" maxlength="255">
    <div class="alert-danger">{{ $errors->first('email')}}</div>
    <label>Password</label>
    <input type="password" name="password" placeholder="minimum 8 characters" minlength="8" maxlength="255">
    <div class="alert-danger">{{ $errors->first('password')}}</div>
    <label>Address</label>
    <input type="text" name="address" placeholder="{{$client->address}}">
    <div class="alert-danger">{{ $errors->first('address')}}</div>
    <label>Post Code</label>
    <input type="text" name="post_code" placeholder="{{$client->post_code}}" minlength="4" maxlength="12">
    <div class="alert-danger">{{ $errors->first('post_code')}}</div>
    <label>Contact Number</label>
    <input type="text" name="contact_number" placeholder="{{$client->contact_number}}" maxlength="14">
    <div class="alert-danger">{{ $errors->first('contact-number')}}</div>
    <button name="submit">Submit</button>
    <button name="delete">Delete</button>
</div>
</body>
@include('admin.layout.footer')
