@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div class="content">
        <h1>Manage Contact {{ $contact->user()->first()->name }}</h1>
        {{ Form::open(array('url' => '/manage-contact/' . $contact->id, 'method' => 'PUT')) }}
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" placeholder="{{ $contact->user()->first()->name }}" maxlength="255">
            <div class="alert-danger">{{ $errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input class="form-control" type="email" name="email" placeholder="{{ $contact->user()->first()->email }}" minlength="8" maxlength="255">
            <div class="alert-danger">{{ $errors->first('email')}}</div>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" placeholder="minimum 8 characters" minlength="8" maxlength="255">
            <div class="alert-danger">{{ $errors->first('password')}}</div>
        </div>
        <div class="form-group">
            <label>Repeat Password</label>
            <input class="form-control" type="password" name="password_confirmed" placeholder="Repeat Password" minlength="8" maxlength="255">
            <div class="alert-danger">{{ $errors->first('password')}}</div>
        </div>
        <div class="form-group">
            <label>Job Role</label>
            <input class="form-control" type="text" name="job_role" placeholder="{{ $contact->job_role }}" minlength="4" maxlength="255">
            <div class="alert-danger">{{ $errors->first('job_role')}}</div>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" type="text" name="phone_number" placeholder="{{ $contact->phone_number }}" maxlength="14">
            <div class="alert-danger">{{ $errors->first('phone_number')}}</div>
        </div>
        <div class="form-group">
            <label>Update Client</label>
            <select class="form-control" name="client">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" @if($client->id === $clientContact->client_id) selected @endif>{{ $client->user()->first()->name }}</option>
                @endforeach
            </select>
        </div>
        <p></p>
        <button class="btn btn-primary" type="submit" name="submit">Update</button>
        <p></p>
        <button class="btn btn-danger" type="submit" value="{{$contact->id}}" name="delete">Delete Contact</button>

    </div>
</body>
@include('admin.layout.footer')
