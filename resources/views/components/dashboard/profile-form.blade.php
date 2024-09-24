<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Profile Information</h6>
                <div class="form-group">
                    <label for="exampleInputUsername1">Name</label>
                    <input type="text" value="" class="form-control" id="name" autocomplete="off"
                        placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" value="" class="form-control" id="email" placeholder="Email">
                </div>

                <button type="submit" onclick="updateInfo()" class="btn btn-primary mr-2">Update</button>
            </div>
        </div>
    </div>

    {{-- <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Profile Picture</h6>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form class="forms-sample" action="" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputUsername1">Picture</label>
                        <input type="file" name="picture"
                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                            class="form-control" autocomplete="off" placeholder="Name">
                        @error('picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="my-3">
                            <img src="{{ asset('uploads/dashboard/admin/profile') }}/{{ Auth::guard('admin')->user()->picture }}"
                                id="blah" width="100" alt="Profile">

                            <img src="{{ asset('uploads/dashboard/admin/profile/' . Auth::guard('admin')->user()->picture) }}" id="blah" width="100" alt="Profile">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Change Password</h6>
                <form class="forms-sample">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Current Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1"
                            placeholder="Current Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Confirm New Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1"
                            placeholder="Confirm New Password">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update</button>

                </form>
            </div>
        </div>
    </div> --}}

</div>
