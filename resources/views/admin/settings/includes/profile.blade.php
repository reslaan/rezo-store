
<div class="card">
    <div class="card-header pb-0"><h4>Edit Profile</h4></div>
    <div class="card-body">
        <form class="form"
              action="{{route('profile')}}"
              method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"> الإسم </label>
                            <input type="text" id="name"  class="form-control" placeholder="Enter Name" value="{{auth()->user()->name}}"  name="name">
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="email"> البريد الالكتروني </label>
                            <input type="email" disabled id="email" class="form-control"
                                   placeholder="Enter Email"
                                   value="{{auth()->user()->email}}" >
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="password"> كلمة المرور الجديدة </label>
                            <input type="password" id="password" class="form-control"
                                   name="password">
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="password_confirmation"> تأكيد كلمة المرور </label>
                            <input type="password" id="password_confirmation" class="form-control"
                                   name="password_confirmation">
                            @error("password_confirmation")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i> Update Profile
                </button>
            </div>
        </form>


    </div>
</div>

