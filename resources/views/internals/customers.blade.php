@extends('layout')

@section('content')
    <h1>Customers</h1>

    <form action="customers" method="POST" class="pb-5">
        <div class="form-group">
            <input type="text" name="name">
            <input type="text" name="email">
        </div>

        <div>{{ $errors->first('name') }}</div>
        <div>{{ $errors->first('email') }}</div>

        <button type="submit">Add Customer</button>
        @csrf
    </form>

    <ul>
        @foreach ($customers as $customer)
        <li>{{ $customer->name }}, {{ $customer->email }} </li>
        @endforeach
    </ul>
@endsection
    



