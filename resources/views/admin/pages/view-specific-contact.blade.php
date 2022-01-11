@include('admin.layout.header')
@include('admin.layout.side-navigation-bar')
<body>
<div class="content">
    <h1>Manage Contact {{$contact->user()->first()->name}}</h1>
    <p>Name: {{ $contact->user()->first()->name }}</p>
    <p>E-mail address: {{ $contact->user()->first()->name }}</p>
    <p>Job Role: {{ $contact->job_role }}</p>
    <p>Phone Number: {{ $contact->phone_number }}</p>
    <p>Last Updated: {{ $contact->updated_at }}</p>
    <a href="/manage-contact/{{ $contact->id }}"><button>Manage Contact</button></a>
</div>
</body>
@include('admin.layout.footer')
