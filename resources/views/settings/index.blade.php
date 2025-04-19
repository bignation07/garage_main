@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Company Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        ➕ Add New Setting
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Company Name</th>
                <th>Company URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
            <tr>
              <td>
                    @if($setting->logo_path)
                        <img src="{{ asset($setting->logo_path) }}" alt="Logo" height="40" style="width:70px;">
                    @else
                        <span>No logo available</span>
                    @endif
                </td>

                <td>{{ $setting->company_name }}</td>
                <td>{{ $setting->company_url }}</td>
                <td>
                    <!--<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $setting->id }}">Edit</button>-->

                    <!--<form method="POST" action="{{ route('settings.destroy', $setting->id) }}" class="d-inline">-->
                    <!--    @csrf-->
                    <!--    @method('DELETE')-->
                    <!--    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>-->
                    <!--</form>-->
                </td>
            </tr>

            <!-- Edit Modal -->
          <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $setting->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('settings.update', $setting->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Setting</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Company URL</label>
                                    <input type="url" name="company_url" class="form-control" value="{{ $setting->company_url }}">
                                </div>
                                <div class="mb-3">
                                    <label>Logo</label>
                                    <input type="file" name="logo_path" class="form-control">
                                    @if($setting->logo_path)
                                        <img src="{{ asset($setting->logo_path) }}" height="40" class="mt-2">
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Company Name</label>
                        <input type="text" name="company_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Company URL</label>
                        <input type="url" name="company_url" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Logo</label>
                        <input type="file" name="logo_path" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
