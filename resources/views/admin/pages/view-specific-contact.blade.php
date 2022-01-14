@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
    <div class="content">
        <div class="view">
            <h1>View Contact {{$contact->user->name}}</h1>
            <p>Name: {{ $contact->user->name }}</p>
            <p>E-mail address: {{ $contact->user->name }}</p>
            <p>Job Role: {{ $contact->job_role }}</p>
            <p>Phone Number: {{ $contact->phone_number }}</p>
            <p>Last Updated: {{ $contact->updated_at }}</p>
            <a href="/manage-contact/{{ $contact->id }}"><button class="btn btn-primary">Manage Contact</button></a>
        </div>
    </div>
</body>
@include('admin.layout.footer')
