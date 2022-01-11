@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div class="content">
        <h1>Create a Contact</h1>
        {{ Form::open() }}
        <label>Name</label>
        <input type="text" name="name" placeholder="John Doe" maxlength="255" required>
        <div class="alert-danger">{{ $errors->first('name')}}</div>
        <label>E-mail</label>
        <input type="email" name="email" placeholder="example@example.com" minlength="8" maxlength="255" required>
        <div class="alert-danger">{{ $errors->first('email')}}</div>
        <label>Password</label>
        <input type="password" name="password" placeholder="minimum 8 characters" minlength="8" maxlength="255" required>
        <div class="alert-danger">{{ $errors->first('password')}}</div>
        <label>Job Role</label>
        <input type="text" name="job_role" placeholder="Sale Assistant" minlength="4" maxlength="255" required>
        <div class="alert-danger">{{ $errors->first('job_role')}}</div>
        <label>Phone Number</label>
        <input type="text" name="phone_number" placeholder="0123456789" maxlength="14" required>
        <div class="alert-danger">{{ $errors->first('phone_number')}}</div>
        <label>Select a Client</label>
        <select name="client">
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->user()->first()->name }}</option>
            @endforeach
        </select>
        <button name="submit" >Submit</button>
    </div>
</body>
@include('admin.layout.footer')
