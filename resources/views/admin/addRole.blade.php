@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ asset('roles/add') }}" method="post">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role Name</label>
                    @if ($errors->has('role_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('role_name') }}</strong>
                    </span>
                    @endif
                    <input type="text" name="role_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Menu Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Access Modifiers</label>
                    <?php $permissions = App\Models\Permission::get(); 
                          foreach($permissions as $permission){ ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" checked="">
                                <label class="form-check-label">{{ $permission->name }}</label>
                            </div>
                          <?php } ?>
                    <label for="exampleInputEmail1">Menu List</label>
                    @foreach($menues as $menu)
                    <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="menus[]" value="{{ $menu['id'] }}" checked="">
                          <label class="form-check-label">{{ $menu['menu_name'] }}</label>
                          <?php $submenus = App\Models\Menu::where('menu_id',$menu['id'])->orderBy('menu_name','asc')->get()->toArray(); 
                          foreach($submenus as $submenu){ ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="menus[]" value="{{ $submenu['id'] }}" checked="">
                                <label class="form-check-label">{{ $submenu['menu_name'] }}</label>
                            </div>
                          <?php }
                          ?>
                    </div>
                    @endforeach  
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        <div>
    </div>
</section>
</div>
@endsection