@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div class="content">
        <h1>Manage Contact {{ $contact->user()->first()->name }}</h1>
        {{ Form::open(array('url' => '/manage-contact/' . $contact->id, 'method' => 'PUT')) }}
        <label>Name</label>
        <input type="text" name="name" placeholder="{{ $contact->user()->first()->name }}" maxlength="255">
        <div class="alert-danger">{{ $errors->first('name')}}</div>
        <label>E-mail</label>
        <input type="email" name="email" placeholder="{{ $contact->user()->first()->email }}" minlength="8" maxlength="255">
        <div class="alert-danger">{{ $errors->first('email')}}</div>
        <label>Password</label>
        <input type="password" name="password" placeholder="minimum 8 characters" minlength="8" maxlength="255">
        <div class="alert-danger">{{ $errors->first('password')}}</div>
        <label>Repeat Password</label>
        <input type="password" name="password_confirmed" placeholder="Repeat Password" minlength="8" maxlength="255">
        <div class="alert-danger">{{ $errors->first('password')}}</div>
        <label>Job Role</label>
        <input type="text" name="job_role" placeholder="{{ $contact->job_role }}" minlength="4" maxlength="255">
        <div class="alert-danger">{{ $errors->first('job_role')}}</div>
        <label>Phone Number</label>
        <input type="text" name="phone_number" placeholder="{{ $contact->phone_number }}" maxlength="14">
        <div class="alert-danger">{{ $errors->first('phone_number')}}</div>
        <label>Update Client</label>
        <select name="client">
            @foreach($clients as $client)
                <option value="{{ $client->id }}" @if($client->id === $clientContact->client_id) selected @endif>{{ $client->user()->first()->name }}</option>
            @endforeach
        </select>
        <p></p>
        <button type="submit" name="submit">Update</button>
        <button type="submit" value="{{$contact->id}}" name="delete">Delete Contact</button>
    </div>
</body>
@include('admin.layout.footer')
