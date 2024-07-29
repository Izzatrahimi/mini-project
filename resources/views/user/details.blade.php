<!-- resources/views/user/details.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Details</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Name:</strong>
                            </div>
                            <div class="col-md-8">
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Email:</strong>
                            </div>
                            <div class="col-md-8">
                                {{ $user->email }}
                            </div>
                        </div>
                        <!-- Add more user details as needed -->

                        <!-- Edit and Delete Buttons -->
                        <div class="mt-3">
                            <a href="{{ route('user.edit') }}" class="btn btn-primary">Edit Details</a>
                            <button class="btn btn-danger" onclick="confirmDelete()">Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete your account?")) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>

    <!-- Delete Form -->
    <form id="deleteForm" action="{{ route('user.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection
