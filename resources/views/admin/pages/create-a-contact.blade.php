@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div class="content">
        <h1>Create a Contact</h1>
        {{ Form::open() }}
        <div class="form-group">
            <label>Name</label>
            <input class="form-control col-4 d-flex justify-content-center" type="text" name="name" placeholder="John Doe" maxlength="255" required>
            <div class="alert-danger">{{ $errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input class="form-control" type="email" name="email" placeholder="example@example.com" minlength="8" maxlength="255" required>
            <div class="alert-danger">{{ $errors->first('email')}}</div>
        </div>
            <label>Password</label>
            <input class="form-control" type="password" name="password" placeholder="minimum 8 characters" minlength="8" maxlength="255" required>
            <div class="alert-danger">{{ $errors->first('password')}}</div>
        <div class="form-group">
            <label>Job Role</label>
            <input class="form-control" type="text" name="job_role" placeholder="Sale Assistant" minlength="4" maxlength="255" required>
            <div class="alert-danger">{{ $errors->first('job_role')}}</div>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" type="text" name="phone_number" placeholder="0123456789" maxlength="14" required>
            <div class="alert-danger">{{ $errors->first('phone_number')}}</div>
        </div>
        <div class="form-group">
            <label>Select a Client</label>
            <select class="form-control" name="client">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->user()->first()->name }}</option>
                @endforeach
            </select>
        </div>
        <p></p>
        <button class="btn btn-primary" name="submit">Submit</button>
    </div>
</body>
@include('admin.layout.footer')
