@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
<a href="{{route('admin.download_csv')}}">Download csv</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php
                    use App\Company;
                    use App\User;
                    $com=Company::get();
                    foreach($com as $comes){
                        $comes->budget=User::where('company',$comes->id)->sum('budget');
                        $comes->users=User::where('company',$comes->id)->count();
                    }
                    ?>
                    <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Compnay Name</th>
                      <th scope="col">Budget</th>
                      <th scope="col">Total Users</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($com as $comesss)
                    <tr>
                      <td>{{$comesss['company_name']}}</td>
                      <td>{{$comesss['budget']}}</td>
                      <td>{{$comesss['users']}}</td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection