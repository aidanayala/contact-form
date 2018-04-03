@extends('layout')

@section('content')
    <table>
        <thead>
        <tr>
            <th width="10%">ID</th>
            <th width="20%">Name</th>
            <th width="20%">E-mail Address</th>
            <th width="40%">Enquiry Text</th>
            <th width="10%">Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($enquiries as $enquiry)
            <tr>
                <td>{{ $enquiry->id }}</td>
                <td>{{ $enquiry->name }}</td>
                <td>{{ $enquiry->email }}</td>
                <td>{!! $enquiry->text !!}</td>
                <td>{{ $enquiry->created_at->format('d-m-y H:i:s') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
